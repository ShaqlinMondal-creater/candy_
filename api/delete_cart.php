<?php
header("Content-Type: application/json");

// DB config
$host = 'localhost';
$db   = 'project';
$user = 'root';
$pass = '';

// Connect to DB
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "DB connection failed"]);
    exit;
}

// Get input data
$data = json_decode(file_get_contents("php://input"), true);
$cart_id = $data['cart_id'] ?? null;

if (!$cart_id) {
    echo json_encode(["status" => "error", "message" => "cart_id is required"]);
    exit;
}

// Prepare and delete
$stmt = $conn->prepare("DELETE FROM carts WHERE id = ?");
$stmt->bind_param("i", $cart_id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Cart item deleted successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to delete cart item"]);
}

$stmt->close();
$conn->close();
