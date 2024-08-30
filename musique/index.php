<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecteur MP3 Moderne</title>
    <link rel="stylesheet" href="style/home.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <h2>Catégories</h2>
            <ul id="category-list">
                <li data-category="all" class="active">Afficher tout</li>
                <li data-category="instrumental">Afficher instrumental</li>
                <li data-category="vocal">Afficher les voix</li>
            </ul>
        </aside>
        <main class="main-content">
            <h1>Lecteur MP3 Moderne</h1>
            <div class="music-list" id="music-list">
                <!-- Les éléments de musique seront insérés ici par JavaScript -->
            </div>
        </main>
    </div>
    <div class="audio-player">
        <div class="player-info">
            <img id="album-art" src="" alt="Album Art">
            <div class="info">
                <h2 id="track-title">Titre</h2>
                <p id="track-artist">Artiste</p>
            </div>
        </div>
        <audio id="audio" controls style="display: none;">
            <!-- La source sera modifiée dynamiquement -->
        </audio>
        <div class="player-controls">
            <button id="play-pause" class="control-button">▶️</button>
            <button id="stop" class="control-button">⏹️</button>
            <button id="loop" class="control-button">🔁</button>
            <button id="mute" class="control-button">🔊</button>
        </div>
        <div class="progress-bar">
            <input type="range" id="progress" value="0" max="100">
            <span id="current-time">0:00</span>
            <span id="duration">0:00</span>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
