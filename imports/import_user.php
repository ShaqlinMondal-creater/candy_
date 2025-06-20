<?php
// Database config
$host = 'localhost';
$db = 'project';
$user = 'root';
$pass = '';
$sheetUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vSH_m6l2dtD6zSXsMgtS_XcomhSWGxcpAieen4DXoidFrxJ3uFlfjcOWntcecu3SvwZhcdwPrTuqvZt/pub?gid=1937789840&single=true&output=csv';

// Connect to DB
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => $conn->connect_error]));
}

// Fetch CSV from Google Sheets
$csvData = file_get_contents($sheetUrl);
if ($csvData === false) {
    die(json_encode(["status" => "error", "message" => "Failed to fetch Google Sheet."]));
}

// Convert CSV to array
$lines = explode(PHP_EOL, $csvData);
$data = array_map("str_getcsv", $lines);
unset($data[0]); // remove header row

$inserted = 0;

foreach ($data as $row) {
    if (count($row) < 7) continue; // skip incomplete rows

    list($SLNO, $name, $email, $mobile, $password, $status, $role) = $row;

    $stmt = $conn->prepare("INSERT INTO users (id, name, email, mobile, password, status, role) 
                            VALUES (?, ?, ?, ?, ?, ?, ?) 
                            ON DUPLICATE KEY UPDATE name=VALUES(name), email=VALUES(email), mobile=VALUES(mobile), password=VALUES(password), status=VALUES(status), role=VALUES(role)");
    $stmt->bind_param("issssss", $SLNO, $name, $email, $mobile, $password, $status, $role);

    if ($stmt->execute()) {
        $inserted++;
    }
    $stmt->close();
}

$conn->close();

echo json_encode(["status" => "success", "inserted" => $inserted]);
?>
