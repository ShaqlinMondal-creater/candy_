<?php
header("Content-Type: application/json");

// DB config
$host = 'localhost';
$db   = 'project';
$user = 'root';
$pass = '';

// DB connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

// Get input
$data = json_decode(file_get_contents("php://input"), true);
$token = $data['token'] ?? '';

if (empty($token)) {
    echo json_encode(["status" => "error", "message" => "Token is required"]);
    exit;
}

// Find user by token
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
$stmt->close();

// Get cart items for user
$sql = "
    SELECT 
        c.id AS cart_id,
        p.id AS product_id,
        p.name AS product_name,
        p.price,
        p.image,
        c.quantity,
        c.created_at,
        c.updated_at
    FROM carts c
    JOIN c_products p ON c.product_id = p.id
    WHERE c.user_id = ?
    ORDER BY c.created_at DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cartItems = [];
$totalAmount = 0;

while ($row = $result->fetch_assoc()) {
    $row['total_price'] = round($row['price'] * $row['quantity'], 2);
    $totalAmount += $row['total_price'];
    $cartItems[] = $row;
}

echo json_encode([
    "status" => "success",
    "user_id" => $user_id,
    "total_items" => count($cartItems),
    "total_amount" => round($totalAmount, 2),
    "cart" => $cartItems
]);

$stmt->close();
$conn->close();
