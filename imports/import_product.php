<?php
// DB Config
$host = 'localhost';
$db = 'project';       
$user = 'root';        
$pass = '';            
$sheetUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vSH_m6l2dtD6zSXsMgtS_XcomhSWGxcpAieen4DXoidFrxJ3uFlfjcOWntcecu3SvwZhcdwPrTuqvZt/pub?gid=0&single=true&output=csv';

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => $conn->connect_error]));
}

// Fetch CSV data
$csv = file_get_contents($sheetUrl);
if (!$csv) {
    die(json_encode(["status" => "error", "message" => "Failed to fetch CSV from Google Sheet."]));
}

// Convert CSV to array
$rows = array_map("str_getcsv", explode("\n", $csv));
$header = array_shift($rows); // remove header row

$inserted = 0;

foreach ($rows as $row) {
    if (count($row) < 7) continue;

    list($id, $product, $image_link, $price, $description, $category, $review) = $row;

    // Clean and convert price to float/decimal
    $price = str_replace(['₹', '$', ',', ' '], '', $price); // remove currency symbols, commas, spaces
    $price = is_numeric($price) ? floatval($price) : 0.00;   // fallback to 0.00 if invalid

    // Prepare and insert into DB
    $stmt = $conn->prepare("INSERT INTO products (id, product, image_link, price, description, category, review)
                            VALUES (?, ?, ?, ?, ?, ?, ?)
                            ON DUPLICATE KEY UPDATE
                                product=VALUES(product),
                                image_link=VALUES(image_link),
                                price=VALUES(price),
                                description=VALUES(description),
                                category=VALUES(category),
                                review=VALUES(review)");

    $stmt->bind_param("issdsss", $id, $product, $image_link, $price, $description, $category, $review);

    if ($stmt->execute()) {
        $inserted++;
    }

    $stmt->close();
}

$conn->close();

echo json_encode(["status" => "success", "inserted" => $inserted]);
?>
