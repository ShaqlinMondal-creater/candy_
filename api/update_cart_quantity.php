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
$quantity = $data['quantity'] ?? null;

if (!$cart_id || !$quantity || $quantity < 1) {
    echo json_encode(["status" => "error", "message" => "Valid cart_id and quantity are required"]);
    exit;
}

// Update quantity
$stmt = $conn->prepare("UPDATE carts SET quantity = ?, updated_at = NOW() WHERE id = ?");
$stmt->bind_param("ii", $quantity, $cart_id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Cart quantity updated"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to update cart"]);
}

$stmt->close();
$conn->close();
