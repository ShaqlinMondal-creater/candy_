<?php
header("Content-Type: application/json");

// DB Configuration
$host = 'localhost';
$db   = 'project';
$user = 'root';
$pass = '';

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => $conn->connect_error]);
    exit();
}

// Read JSON file
$jsonFile = __DIR__ . '/product.json';
if (!file_exists($jsonFile)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "product.json not found"]);
    exit();
}

$jsonData = file_get_contents($jsonFile);
$products = json_decode($jsonData, true);

if (!is_array($products)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Invalid JSON format"]);
    exit();
}

$inserted = 0;
$updated = 0;

foreach ($products as $p) {
    if (!isset($p['id'], $p['name'], $p['price'], $p['image'], $p['rating'], $p['description'], $p['category'])) {
        continue;
    }

    $id = $p['id'];
    $name = $p['name'];
    $price = $p['price'];
    $image = $p['image'];
    $rating = $p['rating'];
    $description = $p['description'];
    $category = $p['category'];
    $badge = $p['badge'] ?? null;

    $stmt = $conn->prepare("
        INSERT INTO c_products (id, name, price, image, rating, description, category, badge)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            name=VALUES(name),
            price=VALUES(price),
            image=VALUES(image),
            rating=VALUES(rating),
            description=VALUES(description),
            category=VALUES(category),
            badge=VALUES(badge)
    ");

    $stmt->bind_param("isdsdsss", $id, $name, $price, $image, $rating, $description, $category, $badge);

    if ($stmt->execute()) {
        if ($stmt->affected_rows == 1) {
            $inserted++;
        } elseif ($stmt->affected_rows == 2) {
            $updated++;
        }
    }

    $stmt->close();
}

$conn->close();

echo json_encode([
    "status" => "success",
    "inserted" => $inserted,
    "updated" => $updated,
    "total" => count($products)
]);
?>
