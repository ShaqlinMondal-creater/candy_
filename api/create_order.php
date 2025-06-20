<?php
header("Content-Type: application/json");

// DB Config
$host = 'localhost';
$db   = 'project';
$user = 'root';
$pass = '';

// DB Connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);
$token = $data['token'] ?? '';
$cart_ids = $data['cart_id'] ?? '';
$shipping_address = $data['shipping_address'] ?? '';
$shipping_charge = (float)($data['shipping_charge'] ?? 0);
$payment_method = $data['payment_method'] ?? 'COD';

if (!$token || !$cart_ids || !$shipping_address) {
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
    exit;
}

// Get user by token
$stmt = $conn->prepare("SELECT id, name, email, mobile FROM users WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    echo json_encode(["status" => "error", "message" => "Invalid token"]);
    exit;
}

$user_id = $user['id'];

// Sanitize cart IDs
$cart_ids_array = array_map('intval', explode(",", $cart_ids));
$cart_ids_sql = implode(",", $cart_ids_array);

// Get cart + product info
$query = "SELECT c.id as cart_id, c.product_id, c.quantity, p.price, p.name 
          FROM carts c 
          JOIN c_products p ON c.product_id = p.id 
          WHERE c.user_id = ? AND c.id IN ($cart_ids_sql)";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["status" => "error", "message" => "No valid cart items found"]);
    exit;
}

// Process cart items
$items = [];
$total = 0;

while ($row = $result->fetch_assoc()) {
    $item_total = $row['price'] * $row['quantity'];
    $items[] = [
        "product_id" => (int)$row['product_id'],
        "name" => $row['name'],
        "price" => (float)$row['price'],
        "quantity" => (int)$row['quantity'],
        "total" => $item_total
    ];
    $total += $item_total;
}

$grand_total = $total + $shipping_charge;

// Insert order
$stmt = $conn->prepare("INSERT INTO orders (user_id, shipping_address, shipping_charge, payment_method, payment_status, order_status, total, created_at)
                        VALUES (?, ?, ?, ?, 'pending', 'pending', ?, NOW())");
$stmt->bind_param("isdsd", $user_id, $shipping_address, $shipping_charge, $payment_method, $grand_total);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// Insert order items
$itemStmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
foreach ($items as $item) {
    $itemStmt->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
    $itemStmt->execute();
}
$itemStmt->close();

// Clear selected carts
$conn->query("DELETE FROM carts WHERE user_id = $user_id AND id IN ($cart_ids_sql)");

// Return response
echo json_encode([
    "status" => "success",
    "message" => "Order placed successfully",
    "order" => [
        "order_id" => $order_id,
        "user" => $user,
        "shipping" => [
            "address" => $shipping_address,
            "charge" => $shipping_charge
        ],
        "payment" => [
            "method" => $payment_method,
            "status" => "pending"
        ],
        "status" => "pending",
        "items" => $items,
        "total" => round($grand_total, 2)
    ]
]);

$conn->close();
