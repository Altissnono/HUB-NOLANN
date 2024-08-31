<?php
$videoDirectory = 'videos';
$thumbnailDirectory = 'thumbnails';
$processedFile = 'processed_videos.txt';

// Lire les vidéos du répertoire
$videos = array_diff(scandir($videoDirectory), array('..', '.'));

// Charger les vidéos traitées
$processedVideos = [];
if (file_exists($processedFile)) {
    $processedVideos = file($processedFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

// Traiter les vidéos non traitées
foreach ($videos as $video) {
    if (!in_array($video, $processedVideos)) {
        // Supprimer les métadonnées de la vidéo
        $inputPath = "$videoDirectory/$video";
        $outputPath = "$videoDirectory/processed_$video";

        $command = "ffmpeg -i \"$inputPath\" -map_metadata -1 -c copy \"$outputPath\"";
        exec($command);

        // Remplacer l'original par la version traitée
        rename($outputPath, $inputPath);

        // Marquer la vidéo comme traitée
        file_put_contents($processedFile, $video . PHP_EOL, FILE_APPEND);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecteur Vidéo Personnel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="gallery">
        <?php foreach ($videos as $video): ?>
            <div class="thumbnail" data-video="<?php echo htmlspecialchars($video); ?>">
                <img src="thumbnails/<?php echo htmlspecialchars(pathinfo($video, PATHINFO_FILENAME)); ?>.jpg" alt="<?php echo htmlspecialchars($video); ?>">
            </div>
        <?php endforeach; ?>
    </div>

    <div id="videoModal" class="modal">
        <span class="close">&times;</span>
        <video id="videoPlayer" class="video-player" controls></video>
    </div>

    <script src="script.js"></script>
</body>
</html>
