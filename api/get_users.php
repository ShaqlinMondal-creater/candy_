<?php
header('Content-Type: application/json');

// DB credentials
$host = 'localhost';
$db   = 'project';
$user = 'root';
$pass = '';

// Create DB connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents("php://input"), true);

// Filters
$name = isset($input['name']) ? trim($input['name']) : '';
$role = isset($input['role']) ? trim($input['role']) : '';

// Build query
$where = "WHERE 1";
$params = [];
$types = "";

if ($name !== "") {
    $where .= " AND name LIKE ?";
    $params[] = "%$name%";
    $types .= "s";
}
if ($role !== "") {
    $where .= " AND role = ?";
    $params[] = $role;
    $types .= "s";
}

$sql = "SELECT id, name, email, mobile, status, role FROM users $where ORDER BY id ASC";
$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode([
    'status' => 'success',
    'total' => count($users),
    'users' => $users
]);
