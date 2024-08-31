<?php
$servername = "ac6p1m.myd.infomaniak.com";
$username = "ac6p1m_pixel";
$password = "NFjL_HR5uW1";
$dbname = "ac6p1m_pixel";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Supprimer tous les pixels
$sql = "DELETE FROM pixels";
if ($conn->query($sql) === TRUE) {
    // Enregistrer l'effacement dans canvas_clears
    $sql = "INSERT INTO canvas_clears (timestamp) VALUES (NOW())";
    if ($conn->query($sql) !== TRUE) {
        echo "Erreur: " . $conn->error;
    }
} else {
    echo "Erreur: " . $conn->error;
}

$conn->close();
?>