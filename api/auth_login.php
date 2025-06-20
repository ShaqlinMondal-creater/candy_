<?php
header("Content-Type: application/json");

// DB Config
$host = 'localhost';
$db   = 'project';
$user = 'root';
$pass = '';

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (empty($email) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "Email and password required"]);
    exit;
}

// Fetch user by email
$stmt = $conn->prepare("SELECT id, name, email, mobile, role, password, status FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["status" => "error", "message" => "User not found"]);
    exit;
}

$user = $result->fetch_assoc();

// Verify password hash
if (!password_verify($password, $user['password'])) {
    echo json_encode(["status" => "error", "message" => "Incorrect password"]);
    exit;
}

// Generate 10-character random token
function generateToken($length = 10) {
    return substr(bin2hex(random_bytes(10)), 0, $length);
}
$token = generateToken();

// Update status and token
$update = $conn->prepare("UPDATE users SET status = 'active', token = ? WHERE id = ?");
$update->bind_param("si", $token, $user['id']);
$update->execute();
$update->close();

// Return user info with token
echo json_encode([
    "status" => "success",
    "user" => [
        "name" => $user['name'],
        "email" => $user['email'],
        "mobile" => $user['mobile'],
        "role" => $user['role'],
        "status" => "activate",
        "token" => $token
    ]
]);

$stmt->close();
$conn->close();
