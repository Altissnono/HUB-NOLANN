<?php
header('Content-Type: application/json');

// Paramètres de connexion à la base de données
$servername = "ac6p1m.myd.infomaniak.com";
$username = "ac6p1m_pixel";
$password = "NFjL_HR5uW1";
$dbname = "ac6p1m_pixel";

try {
    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Vérifier la connexion
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Récupérer les statistiques
    $stats = [];

    // Nombre total de pixels colorés
    $sql = "SELECT COUNT(*) as totalPixels FROM pixels";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        $stats['totalPixels'] = $row['totalPixels'];
    } else {
        $stats['totalPixels'] = 0;
    }

    // Nombre de pixels colorés par utilisateur (exemple d'utilisateur)
    $sql = "SELECT COUNT(*) as pixelsPerUser FROM pixels WHERE user_id = 'example_user'";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        $stats['pixelsPerUser'] = $row['pixelsPerUser'];
    } else {
        $stats['pixelsPerUser'] = 0;
    }

    // Dernière mise à jour (ici pour exemple, on prend l'heure actuelle)
    $stats['lastUpdate'] = date('Y-m-d H:i:s');

    // Répondre avec les statistiques en JSON
    echo json_encode($stats);

    $conn->close();
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
