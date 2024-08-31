<?php
// Inclure le fichier de configuration
$config = require('config.php');

// Dossier contenant les photos
$photoDir = 'photos/';

// Récupérer tous les fichiers du dossier
$files = array_diff(scandir($photoDir, SCANDIR_SORT_DESCENDING), array('.', '..'));

// Filtrer les fichiers pour ne garder que les images (extensions JPEG, PNG, GIF)
$images = array_filter($files, function($file) use ($photoDir) {
    $extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, $extensions);
});

// Récupérer les paramètres GET pour paginer les images
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$imagesPerLoad = isset($_GET['imagesPerLoad']) ? (int)$_GET['imagesPerLoad'] : 9;
$offset = ($page - 1) * $imagesPerLoad;

// Récupérer le sous-ensemble des images pour cette page
$imagesToLoad = array_slice($images, $offset, $imagesPerLoad);

// Générer le HTML pour les images
foreach ($imagesToLoad as $image) {
    echo '<img src="' . htmlspecialchars($photoDir . $image) . '" alt="' . htmlspecialchars($image) . '" loading="lazy">';
}
?>
