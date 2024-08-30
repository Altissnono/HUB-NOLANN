<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="style/home.css">
</head>
<body>
    <header>
        <h1>My Music Player</h1>
    </header>
    <div class="music-list">
        <!-- Music items will be loaded here -->
    </div>
    <div class="player">
        <div class="cover-container">
            <img id="cover-image" src="" alt="Cover Image">
        </div>
        <div class="player-controls">
            <button id="shuffle" class="control-button">🔀</button>
            <button id="prev" class="control-button">⏮</button>
            <button id="play-pause" class="control-button">▶</button>
            <button id="next" class="control-button">⏭</button>
            <button id="loop" class="control-button">🔁</button>
        </div>
        <div class="progress-container">
            <span id="current-time">0:00</span>
            <input id="progress-bar" type="range" min="0" max="100" value="0">
            <span id="total-time">0:00</span>
        </div>
        <div class="volume-container">
            <input id="volume-bar" type="range" min="0" max="100" value="100">
        </div>
        <audio id="audio">
            <source id="audio-source" src="" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
