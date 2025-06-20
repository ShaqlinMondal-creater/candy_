<?php
header('Content-Type: application/json');

// Allow JSON input
$input = json_decode(file_get_contents('php://input'), true);

// DB setup
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

// Collect filters
$name     = isset($input['name']) ? trim($input['name']) : '';
$category = isset($input['category']) ? trim($input['category']) : '';
$sort     = isset($input['sort']) ? strtolower($input['sort']) : '';
$limit    = isset($input['limit']) ? intval($input['limit']) : 10;
$offset   = isset($input['offset']) ? intval($input['offset']) : 0;

// Build WHERE clause
$where = "WHERE 1";
$params = [];
$types = '';

if ($name !== '') {
    $where .= " AND name LIKE ?";
    $params[] = "%$name%";
    $types .= 's';
}

if ($category !== '') {
    $where .= " AND category = ?";
    $params[] = $category;
    $types .= 's';
}

// Count total
$count_sql = "SELECT COUNT(*) AS total FROM c_products $where";
$count_stmt = $conn->prepare($count_sql);
if ($types) $count_stmt->bind_param($types, ...$params);
$count_stmt->execute();
$total = $count_stmt->get_result()->fetch_assoc()['total'];
$count_stmt->close();

// Sorting
$order_by = '';
if ($sort === 'asc') {
    $order_by = "ORDER BY price ASC";
} elseif ($sort === 'desc') {
    $order_by = "ORDER BY price DESC";
}

// Data fetch
$sql = "SELECT id, name, price, image, rating, description, category, badge 
        FROM c_products 
        $where 
        $order_by 
        LIMIT ? OFFSET ?";
$params[] = $limit;
$params[] = $offset;
$types .= 'ii';

$stmt = $conn->prepare($sql);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
$stmt->close();
$conn->close();

echo json_encode([
    'status' => 'success',
    'total' => $total,
    'limit' => $limit,
    'offset' => $offset,
    'products' => $products
]);
