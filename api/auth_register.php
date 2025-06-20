<?php
header("Content-Type: application/json");

// DB config
$host = 'localhost';
$db = 'project';
$user = 'root';
$pass = '';

// Connect to DB
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "DB connection failed"]);
    exit;
}

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);
$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');
$mobile = trim($data['mobile'] ?? '');
$password = $data['password'] ?? '';

if (!$name || !$email || !$mobile || !$password) {
    echo json_encode(["status" => "error", "message" => "All fields are required"]);
    exit;
}

// Check if email exists
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Email already registered"]);
    exit;
}
$stmt->close();

// Hash password (recommended for security)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert new user with default status and role
$stmt = $conn->prepare("INSERT INTO users (name, email, mobile, password, status, role) VALUES (?, ?, ?, ?, 'inactive', 'user')");
$stmt->bind_param("ssss", $name, $email, $mobile, $hashedPassword);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "User registered successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Registration failed"]);
}

$stmt->close();
$conn->close();
