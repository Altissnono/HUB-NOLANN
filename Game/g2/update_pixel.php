<?php
$servername = "ac6p1m.myd.infomaniak.com";
$username = "ac6p1m_pixel";
$password = "NFjL_HR5uW1";
$dbname = "ac6p1m_pixel";

// Crée la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

$x = intval($_POST['x']);
$y = intval($_POST['y']);
$color = $_POST['color'];

// Préparer et exécuter la requête
$sql = "REPLACE INTO pixels (x, y, color) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(["error" => "Statement preparation failed: " . $conn->error]);
    exit;
}

$stmt->bind_param("iis", $x, $y, $color);
$stmt->execute();
$stmt->close();
$conn->close();

echo json_encode(["success" => true]);
?>