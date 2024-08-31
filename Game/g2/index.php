<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel War</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        #canvas-container {
            position: relative;
        }
        #canvas {
            border: 1px solid black;
            background-color: #ffffff;
            image-rendering: pixelated;
        }
        #color-picker-container {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            background: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 10;
        }
        #color-picker {
            width: 40px;
            height: 40px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        #color-label {
            margin-left: 10px;
            font-size: 16px;
        }
        #controls-container {
            position: absolute;
            bottom: 10px;
            left: 10px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            z-index: 10;
        }
        #controls-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0;
        }
        #stats-button {
            background-color: #2196F3;
        }
        #clear-button {
            background-color: #ff4d4d;
        }
        /* Styles pour la popup des statistiques */
        #stats-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 100;
        }
        #stats-modal .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            text-align: center;
            width: 80%;
            max-width: 500px;
        }
        #stats-modal button {
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            background-color: #f44336;
            color: #fff;
        }
        /* Styles pour la popup du mot de passe */
        #password-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 100;
        }
        #password-modal .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            text-align: center;
            width: 80%;
            max-width: 400px;
        }
        #password-modal button {
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            background-color: #f44336;
            color: #fff;
        }
    </style>
</head>
<body>
    <div id="color-picker-container">
        <input type="color" id="color-picker" value="#ff0000">
        <span id="color-label">Choisir une couleur</span>
    </div>
    <div id="controls-container">
        <button id="zoom-in-button">Zoom +</button>
        <button id="zoom-out-button">Zoom -</button>
        <button id="redirect-button">Retour Hub Game</button>
        <button id="stats-button">Statistiques</button>
        <button id="clear-button">Vider le canevas</button>
    </div>
    <div id="canvas-container">
        <canvas id="canvas"></canvas>
    </div>

    <!-- Popup pour les statistiques -->
    <div id="stats-modal">
        <div class="modal-content">
            <h2>Statistiques du Canevas</h2>
            <div id="stats-content">Chargement...</div>
            <button id="close-stats">Fermer</button>
        </div>
    </div>

    <!-- Popup pour le mot de passe -->
    <div id="password-modal">
        <div class="modal-content">
            <h2>Entrer le mot de passe</h2>
            <input type="password" id="password-input" placeholder="Mot de passe">
            <button id="submit-password">Valider</button>
            <button id="cancel-password">Annuler</button>
        </div>
    </div>

    <script>
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        const colorPicker = document.getElementById('color-picker');
        const zoomInButton = document.getElementById('zoom-in-button');
        const zoomOutButton = document.getElementById('zoom-out-button');
        const statsButton = document.getElementById('stats-button');
        const clearButton = document.getElementById('clear-button');
        const canvasContainer = document.getElementById('canvas-container');
        const pixelSizeBase = 10; // Taille de base du pixel
        let pixelSize = pixelSizeBase; // Taille actuelle du pixel
        let scale = 1; // Échelle actuelle
        let drawing = false;
        let lastPixel = null;

        // Mot de passe
        const correctPassword = 'nono'; // Change ceci par le mot de passe souhaité

        // Redimensionner le canevas pour occuper toute la page
        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            drawGrid(); // Re-dessiner la grille après redimensionnement
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        function drawGrid() {
            const cols = Math.ceil(canvas.width / pixelSize);
            const rows = Math.ceil(canvas.height / pixelSize);

            ctx.clearRect(0, 0, canvas.width, canvas.height); // Effacer le canevas
            ctx.strokeStyle = '#ddd';
            ctx.lineWidth = 1;

            for (let x = 0; x < cols; x++) {
                for (let y = 0; y < rows; y++) {
                    ctx.strokeRect(x * pixelSize, y * pixelSize, pixelSize, pixelSize);
                }
            }
        }

        // Dessiner le canevas avec les pixels
        function drawCanvas(pixels) {
            drawGrid(); // Redessiner la grille
            pixels.forEach(pixel => {
                ctx.fillStyle = pixel.color;
                ctx.fillRect(pixel.x * pixelSize * scale, pixel.y * pixelSize * scale, pixelSize * scale, pixelSize * scale);
            });
        }

        // Envoyer la mise à jour d'un pixel
        function updatePixel(x, y, color) {
            fetch('update_pixel.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `x=${x}&y=${y}&color=${color}`
            })
            .catch(error => console.error('Erreur:', error));
        }

        // Récupérer les pixels
        function getPixels() {
            fetch('get_pixels.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    drawCanvas(data);
                })
                .catch(error => console.error('Erreur:', error));
        }

        // Mettre à jour le canevas toutes les secondes
        setInterval(getPixels, 1000);

        // Gérer les événements de dessin
        function startDrawing(event) {
            drawing = true;
            draw(event);
        }

        function stopDrawing() {
            drawing = false;
            lastPixel = null;
        }

        function draw(event) {
            if (!drawing) return;

            const rect = canvas.getBoundingClientRect();
            let x, y;

            if (event.touches) {
                // Événement tactile
                x = (event.touches[0].clientX - rect.left) / (pixelSize * scale);
                y = (event.touches[0].clientY - rect.top) / (pixelSize * scale);
            } else {
                // Événement souris
                x = (event.clientX - rect.left) / (pixelSize * scale);
                y = (event.clientY - rect.top) / (pixelSize * scale);
            }

            x = Math.floor(x);
            y = Math.floor(y);

            const color = colorPicker.value;
            updatePixel(x, y, color);

            lastPixel = { x, y };

            // Dessiner sur le canevas
            ctx.fillStyle = color;
            ctx.fillRect(x * pixelSize * scale, y * pixelSize * scale, pixelSize * scale, pixelSize * scale);
        }

        canvas.addEventListener('mousedown', startDrawing);
        canvas.addEventListener('mouseup', stopDrawing);
        canvas.addEventListener('mousemove', draw);
        canvas.addEventListener('touchstart', startDrawing, { passive: false });
        canvas.addEventListener('touchend', stopDrawing, { passive: false });
        canvas.addEventListener('touchmove', draw, { passive: false });

        function zoomIn() {
            scale += 0.1; // Augmente l'échelle
            canvas.style.transform = `scale(${scale})`;
            canvas.style.transformOrigin = '0 0'; // Origine du zoom en haut à gauche
        }

        function zoomOut() {
            if (scale > 0.1) {
                scale -= 0.1; // Diminue l'échelle
                canvas.style.transform = `scale(${scale})`;
                canvas.style.transformOrigin = '0 0'; // Origine du zoom en haut à gauche
            }
        }

        // Événements pour les boutons de zoom
        zoomInButton.addEventListener('click', zoomIn);
        zoomOutButton.addEventListener('click', zoomOut);

        // Gestion du zoom avec le geste de pince
        canvasContainer.addEventListener('touchstart', handleTouchStart, false);
        canvasContainer.addEventListener('touchmove', handleTouchMove, false);

        let initialDistance = null;
        let initialScale = 1;

        function handleTouchStart(event) {
            if (event.touches.length === 2) {
                initialDistance = getDistance(event.touches[0], event.touches[1]);
                initialScale = scale;
            }
        }

        function handleTouchMove(event) {
            if (event.touches.length === 2) {
                const currentDistance = getDistance(event.touches[0], event.touches[1]);
                const scaleChange = currentDistance / initialDistance;
                scale = initialScale * scaleChange;
                canvas.style.transform = `scale(${scale})`;
                canvas.style.transformOrigin = '0 0'; // Origine du zoom en haut à gauche
                event.preventDefault(); // Empêche le défilement par défaut
            }
        }

        function getDistance(touch1, touch2) {
            const dx = touch1.pageX - touch2.pageX;
            const dy = touch1.pageY - touch2.pageY;
            return Math.sqrt(dx * dx + dy * dy);
        }

        // Fonction pour vider le canevas
        function clearCanvas() {
            // Afficher la popup pour entrer le mot de passe
            document.getElementById('password-modal').style.display = 'flex';
        }

        function checkPassword() {
            const password = document.getElementById('password-input').value;
            if (password === correctPassword) {
                fetch('clear_pixels.php', {
                    method: 'POST',
                })
                .then(response => {
                    if (response.ok) {
                        drawCanvas([]); // Effacer le canevas localement
                        document.getElementById('password-modal').style.display = 'none';
                    } else {
                        console.error('Erreur:', response.statusText);
                    }
                })
                .catch(error => console.error('Erreur:', error));
            } else {
                alert('Mot de passe incorrect');
            }
        }

        // Événements pour la popup du mot de passe
        clearButton.addEventListener('click', clearCanvas);
        document.getElementById('submit-password').addEventListener('click', checkPassword);
        document.getElementById('cancel-password').addEventListener('click', () => {
            document.getElementById('password-modal').style.display = 'none';
        });

        // Fonction pour ouvrir la popup des statistiques
        function showStats() {
            fetch('get_stats.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    // Afficher les statistiques dans la popup
                    const statsContent = document.getElementById('stats-content');
                    statsContent.innerHTML = `
                        <p>Nombre total de pixels dessinés: ${data.totalPixels}</p>
                        <p>Nombre de pixels modifiés: ${data.modifiedPixels}</p>
                        <p>Nombre de fois que le tableau a été vidé: ${data.clearCount}</p>
                    `;
                    document.getElementById('stats-modal').style.display = 'flex';
                })
                .catch(error => console.error('Erreur:', error));
        }

        // Événements pour la popup des statistiques
        statsButton.addEventListener('click', showStats);
        document.getElementById('close-stats').addEventListener('click', () => {
            document.getElementById('stats-modal').style.display = 'none';
        });

        // Redirection
        document.getElementById('redirect-button').addEventListener('click', function() {
            window.location.href = 'https://hub.nolannthuillier.fr/Game/'; // Remplacez par votre lien
        });

        // Initialisation
        getPixels();
    </script>
</body>
</html>
