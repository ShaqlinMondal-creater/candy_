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

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);
$token = $data['token'] ?? '';
$product_id = $data['product_id'] ?? 0;
$quantity = $data['quantity'] ?? 1;  // default quantity 1

if (empty($token) || !$product_id) {
    echo json_encode(["status" => "error", "message" => "Token and product_id required"]);
    exit;
}

// Validate user token and get user id
$stmt = $conn->prepare("SELECT id FROM users WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["status" => "error", "message" => "Invalid token"]);
    exit;
}

$user = $result->fetch_assoc();
$user_id = $user['id'];

// Check if product exists
$stmt = $conn->prepare("SELECT id FROM c_products WHERE id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo json_encode(["status" => "error", "message" => "Product not found"]);
    exit;
}

// Check if product already in cart, update quantity if yes
$stmt = $conn->prepare("SELECT quantity FROM carts WHERE user_id = ? AND product_id = ?");
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update quantity
    $row = $result->fetch_assoc();
    $new_quantity = $row['quantity'] + $quantity;
    $update = $conn->prepare("UPDATE carts SET quantity = ? WHERE user_id = ? AND product_id = ?");
    $update->bind_param("iii", $new_quantity, $user_id, $product_id);
    $update->execute();
    $update->close();

    echo json_encode(["status" => "success", "message" => "Cart updated", "quantity" => $new_quantity]);
} else {
    // Insert new cart record
    $insert = $conn->prepare("INSERT INTO carts (user_id, product_id, quantity) VALUES (?, ?, ?)");
    $insert->bind_param("iii", $user_id, $product_id, $quantity);
    $insert->execute();
    $insert->close();

    echo json_encode(["status" => "success", "message" => "Product added to cart", "quantity" => $quantity]);
}

$stmt->close();
$conn->close();
