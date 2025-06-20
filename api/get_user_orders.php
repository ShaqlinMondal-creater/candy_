<?php
header("Content-Type: application/json");

// DB Config
$host = 'localhost';
$db   = 'project';
$user = 'root';
$pass = '';

// Connect DB
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);
$token = $data['token'] ?? '';

if (empty($token)) {
    echo json_encode(["status" => "error", "message" => "Token is required"]);
    exit;
}

// Get user by token
$stmt = $conn->prepare("SELECT id, name, email FROM users WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$userResult = $stmt->get_result();
$user = $userResult->fetch_assoc();
$stmt->close();

if (!$user) {
    echo json_encode(["status" => "error", "message" => "Invalid token"]);
    exit;
}

$user_id = $user['id'];

// Get orders
$orderQuery = $conn->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY id DESC");
$orderQuery->bind_param("i", $user_id);
$orderQuery->execute();
$orderResult = $orderQuery->get_result();

$orders = [];

while ($order = $orderResult->fetch_assoc()) {
    $order_id = $order['id'];

    // Get items for each order
    $itemsQuery = $conn->prepare("
        SELECT oi.product_id, p.name, oi.quantity, oi.price 
        FROM order_items oi 
        JOIN c_products p ON oi.product_id = p.id 
        WHERE oi.order_id = ?
    ");
    $itemsQuery->bind_param("i", $order_id);
    $itemsQuery->execute();
    $itemsResult = $itemsQuery->get_result();

    $items = [];
    while ($item = $itemsResult->fetch_assoc()) {
        $items[] = $item;
    }

    $orders[] = [
        "order_id" => $order['id'],
        "shipping_address" => $order['shipping_address'],
        "shipping_charge" => $order['shipping_charge'],
        "payment_method" => $order['payment_method'],
        "payment_status" => $order['payment_status'],
        "order_status" => $order['order_status'],
        "total" => $order['total'],
        "created_at" => $order['created_at'],
        "items" => $items
    ];
    $itemsQuery->close();
}

echo json_encode([
    "status" => "success",
    "user" => $user,
    "orders" => $orders,
    "total_orders" => count($orders)
]);

$conn->close();
