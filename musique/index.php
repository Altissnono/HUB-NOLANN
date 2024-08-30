<?php
// Charger la liste des morceaux de musique depuis le fichier JSON
$musicListFile = 'music-list.json';
$musicList = [];

if (file_exists($musicListFile)) {
    $jsonContent = file_get_contents($musicListFile);
    $musicList = json_decode($jsonContent, true);
    
    // Vérifier les erreurs de décodage JSON
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Erreur de décodage JSON: " . json_last_error_msg();
        $musicList = [];
    }
} else {
    echo "Le fichier music-list.json est introuvable.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Music Player</title>
    <link rel="stylesheet" href="style/home.css">
</head>
<body>
    <header>
        <h1>My Music Player</h1>
    </header>

    <main>
        <section class="music-list">
            <?php if (!empty($musicList)): ?>
                <?php foreach ($musicList as $track): ?>
                <div class="music-item" data-src="music/<?php echo htmlspecialchars($track['file']); ?>" data-cover="<?php echo htmlspecialchars($track['cover']); ?>" data-title="<?php echo htmlspecialchars($track['title']); ?>">
                    <img src="images/<?php echo htmlspecialchars($track['cover']); ?>" alt="Cover Image">
                    <div class="music-details">
                        <h2 class="title"><?php echo htmlspecialchars($track['title']); ?></h2>
                        <p class="genre">Genre: <?php echo htmlspecialchars($track['genre']); ?></p>
                        <p class="style">Style: <?php echo htmlspecialchars($track['style']); ?></p>
                        <p class="description"><?php echo htmlspecialchars($track['description']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No tracks available.</p>
            <?php endif; ?>
        </section>

        <div id="player" class="player">
            <div class="cover-container">
                <img id="cover-image" src="" alt="Cover Image">
            </div>
            <div class="player-controls">
                <button id="prev" class="control-button">◄◄</button>
                <button id="play" class="control-button">▶</button>
                <button id="pause" class="control-button">⏸</button>
                <button id="stop" class="control-button">■</button>
                <button id="next" class="control-button">►►</button>
                <button id="loop" class="control-button">🔁</button>
            </div>
            <div class="player-info">
                <span id="track-title">Select a track</span>
            </div>
            <div class="progress-container">
                <input type="range" id="progress-bar" value="0" max="100" step="1">
            </div>
            <div class="volume-container">
                <input type="range" id="volume-bar" value="100" max="100" step="1">
            </div>
            <audio id="audio" preload="auto">
                <source id="audio-source" src="" type="audio/mp3">
                Votre navigateur ne supporte pas l'élément audio.
            </audio>
        </div>
    </main>

    <script src="js/script.js"></script>
</body>
</html>
