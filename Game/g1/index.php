<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu du Dinosaure</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="game-container">
        <div id="gameWrapper">
            <canvas id="gameCanvas"></canvas>
            <div id="scoreBoard">
                <div id="scoreBoardContent">
                    <p>Score: <span id="currentScore">0</span></p>
                    <p>Meilleur Score: <span id="highScore">0</span></p>
                </div>
            </div>
            <div id="gameCard">
                <div id="gameOverMessage" class="hidden">
                    <p>Game Over!</p>
                    <button id="restartButton">Recommencer</button>
                </div>
                <!-- Nouveau bouton pour retourner au hub -->
                <button id="hubButton" class="hidden" onclick="window.location.href='https://hub.nolannthuillier.fr/Game';">Retour au Hub</button>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
