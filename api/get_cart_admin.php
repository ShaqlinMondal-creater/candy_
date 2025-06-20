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

// Fetch all cart data with JOINs
$sql = "
    SELECT 
        c.id AS cart_id,
        u.id AS user_id,
        u.name AS user_name,
        u.email AS user_email,
        p.id AS product_id,
        p.name AS product_name,
        p.price,
        p.image,
        c.quantity,
        c.created_at,
        c.updated_at
    FROM carts c
    JOIN users u ON c.user_id = u.id
    JOIN c_products p ON c.product_id = p.id
    ORDER BY c.created_at DESC
";

$result = $conn->query($sql);
$carts = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $carts[] = $row;
    }

    echo json_encode([
        "status" => "success",
        "total" => count($carts),
        "carts" => $carts
    ]);
} else {
    echo json_encode(["status" => "success", "total" => 0, "carts" => []]);
}

$conn->close();
