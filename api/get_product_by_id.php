<?php
header("Content-Type: application/json");

// Database config
$host = 'localhost';
$db   = 'project';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);
$product_id = isset($input['id']) ? intval($input['id']) : 0;

if (!$product_id) {
    echo json_encode(["status" => "error", "message" => "Product ID is required"]);
    exit;
}

// Fetch product by ID
$stmt = $conn->prepare("SELECT id, name, price, image, rating, description, category, badge FROM c_products WHERE id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["status" => "error", "message" => "Product not found"]);
} else {
    $product = $result->fetch_assoc();
    echo json_encode(["status" => "success", "product" => $product]);
}

$stmt->close();
$conn->close();
