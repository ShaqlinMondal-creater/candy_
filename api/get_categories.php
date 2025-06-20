<?php
header('Content-Type: application/json');

// DB configuration
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

// Fetch unique categories
$sql = "SELECT DISTINCT category FROM c_products ORDER BY category ASC";
$result = $conn->query($sql);

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row['category'];
}

$conn->close();

// Response
echo json_encode([
    'status' => 'success',
    'categories' => $categories,
    'total' => count($categories)
]);
