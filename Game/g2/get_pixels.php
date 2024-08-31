<?php
header('Content-Type: application/json');

$servername = "ac6p1m.myd.infomaniak.com";
$username = "ac6p1m_pixel"; // Change en fonction de ta configuration
$password = "NFjL_HR5uW1"; // Change en fonction de ta configuration
$dbname = "ac6p1m_pixel";

// Crée la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

$sql = "SELECT * FROM pixels";
$result = $conn->query($sql);

if (!$result) {
    http_response_code(500);
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit;
}

$pixels = array();
while ($row = $result->fetch_assoc()) {
    $pixels[] = $row;
}

$conn->close();
echo json_encode($pixels);
?>