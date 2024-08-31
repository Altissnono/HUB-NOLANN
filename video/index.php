<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site de Vidéo</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="background-animations.css">
    <!-- Particles.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <!-- Three.js CDN -->
</head>
<body>
    <header>
        <h1>Ma Galerie de Vidéos</h1>
        <button id="back-to-hub" class="control-btn">Retour Hub</button>
    </header>
    <main>
        <div class="gallery">
            <div class="video-item" data-video-url="vd1/Vidéo sans titre.mp4">
                <img src="vd1/zefzefzefzefzefzefezfzef.png" alt="Thumbnail 1" class="thumbnail">
                <div class="video-info">
                    <p class="video-title">Drone Nuage</p>
                </div>
            </div>
            <div class="video-item" data-video-url="vd2/Vidéo sans titre (1).mp4">
                <img src="vd2/rthrthrthrthrthrth.png" alt="Thumbnail 2" class="thumbnail">
                <div class="video-info">
                    <p class="video-title">Drone Ville</p> 
                </div>
            </div>
            <!-- Ajoutez d'autres éléments vidéo ici -->
        </div>
    </main>
    <div id="particles-js"></div> <!-- Pour particles.js -->
    <div id="background"></div> <!-- Pour three.js -->

    <div id="video-player" class="video-player">
        <div id="video-container">
            <video id="video">
                <source src="" type="video/mp4">
                Votre navigateur ne supporte pas la balise vidéo.
            </video>
        </div>
        <div id="controls">
            <button id="play-pause" class="control-btn">▶️</button>
            <button id="mute" class="control-btn">🔇</button>
            <div id="volume-container">
                <input id="volume" class="control-slider" type="range" min="0" max="100" value="100">
            </div>
            <div id="speed-selector">
                <button data-rate="1" class="control-btn active">1x</button>
                <button data-rate="1.5" class="control-btn">1.5x</button>
                <button data-rate="2" class="control-btn">2x</button>
            </div>
            <div id="progress-bar-container">
                <input id="seek-bar" type="range" min="0" max="100" value="0">
                <div id="progress-bar"></div>
            </div>
            <button id="fullscreen" class="control-btn">🔲</button>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="particles-config.js"></script> <!-- Pour particles.js -->
    <script src="three-config.js"></script> <!-- Pour three.js -->
</body>
</html>
