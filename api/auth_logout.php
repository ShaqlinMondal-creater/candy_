<?php
header("Content-Type: application/json");

// DB Config
$host = 'localhost';
$db   = 'project';
$user = 'root';
$pass = '';

// Connect to DB
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

// Read token from request body
$data = json_decode(file_get_contents("php://input"), true);
$token = $data['token'] ?? '';

if (empty($token)) {
    echo json_encode(["status" => "error", "message" => "Token required"]);
    exit;
}

// Find user with this token
$stmt = $conn->prepare("SELECT id FROM users WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["status" => "error", "message" => "Invalid token"]);
    exit;
}

$user = $result->fetch_assoc();

// Clear token and deactivate status
$update = $conn->prepare("UPDATE users SET token = NULL, status = 'inactive' WHERE id = ?");
$update->bind_param("i", $user['id']);
$update->execute();
$update->close();

echo json_encode(["status" => "success", "message" => "Logout successful"]);

$stmt->close();
$conn->close();
