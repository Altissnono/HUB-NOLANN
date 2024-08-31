const canvas = document.getElementById('gameCanvas');
const ctx = canvas.getContext('2d');
canvas.width = 1200; // Largeur du canvas
canvas.height = 400; // Hauteur du canvas

const dinoImage = new Image();
dinoImage.src = '159846.png'; // Assure-toi que le chemin est correct

const barrierImage = new Image();
barrierImage.src = 'S0000514_Blow-up verbinding.png'; // Assure-toi que le chemin est correct

const dino = {
    x: 50,
    y: canvas.height - 80,
    width: 60,
    height: 80,
    velocityY: 0,
    gravity: 0.8, // Gravité pour un saut plus réaliste
    jumpPower: -15, // Puissance du saut
    jumping: false
};

const barriers = [];
const barrierWidth = 60;
const barrierHeight = 80;
const smallBarrierWidth = 40;
const smallBarrierHeight = 60;
const initialBarrierSpeed = 5;

// Distance entre les obstacles
let barrierMinDistance = 400; // Distance minimum entre les obstacles en pixels (1.1 secondes)
let barrierMaxDistance = 600; // Distance maximum entre les obstacles en pixels (3.1 secondes)
const minimumObstaclesInterval = 3000; // Minimum intervalle pour ajouter un obstacle en ms

let score = 0;
let highScore = parseInt(localStorage.getItem('highScore')) || 0; // Assure que le highScore est un entier
let gameInterval;
let scoreInterval;
let gameRunning = false;
let speedMultiplier = 2; // Début avec une vitesse x2
let pointsPerSecond = 10; // Points gagnés par seconde
let obstaclesAdded = 0; // Compteur d'obstacles ajoutés
let lastObstacleTime = Date.now(); // Temps du dernier obstacle ajouté

// Chargement du son
const sound = new Audio('path_to_your_sound_file.mp3'); // Assure-toi que le chemin est correct

function generateBarrier() {
    const xPosition = barriers.length === 0 
        ? canvas.width + barrierMaxDistance 
        : barriers[barriers.length - 1].x + getRandomDistance();
    
    // Déterminer la taille aléatoire de l'obstacle
    const isSmall = Math.random() < 0.3; // 30% de chance d'être plus petit
    const width = isSmall ? smallBarrierWidth : barrierWidth;
    const height = isSmall ? smallBarrierHeight : barrierHeight;
    
    barriers.push({
        x: xPosition,
        y: canvas.height - height,
        width: width,
        height: height
    });
    
    lastObstacleTime = Date.now();
}

function getRandomDistance() {
    // Retourne une distance aléatoire entre barrierMinDistance et barrierMaxDistance
    return Math.random() * (barrierMaxDistance - barrierMinDistance) + barrierMinDistance;
}

function update() {
    if (gameRunning) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Update dino position
        dino.velocityY += dino.gravity;
        dino.y += dino.velocityY;

        if (dino.y > canvas.height - dino.height) {
            dino.y = canvas.height - dino.height;
            dino.velocityY = 0;
            dino.jumping = false;
        }

        // Update barriers
        barriers.forEach(barrier => {
            barrier.x -= initialBarrierSpeed * speedMultiplier;

            if (barrier.x < -barrier.width) {
                barriers.shift(); // Retirer le premier obstacle
            }
        });

        // Ajouter des obstacles si nécessaire
        const currentTime = Date.now();
        if (currentTime - lastObstacleTime > minimumObstaclesInterval) {
            generateBarrier();
        }

        // Ajouter des obstacles tous les 100 points
        if (Math.floor(score / 100) > obstaclesAdded) {
            obstaclesAdded++;
            generateBarrier();
        }

        // Assurer un obstacle minimum toutes les 7 secondes
        if (Date.now() - lastObstacleTime > 7000) {
            generateBarrier();
        }

        // Vérifier s'il y a suffisamment d'obstacles visibles
        if (barriers.length === 0 || barriers[barriers.length - 1].x < canvas.width - barrierMaxDistance) {
            generateBarrier();
        }

        // Check collision
        barriers.forEach(barrier => {
            if (dino.x < barrier.x + barrier.width &&
                dino.x + dino.width > barrier.x &&
                dino.y < barrier.y + barrier.height &&
                dino.y + dino.height > barrier.y) {
                gameRunning = false;
                clearInterval(gameInterval);
                clearInterval(scoreInterval);
                document.getElementById('gameOverMessage').style.display = 'block';
            }
        });

        // Draw dino
        ctx.drawImage(dinoImage, dino.x, dino.y, dino.width, dino.height);

        // Draw barriers
        barriers.forEach(barrier => {
            ctx.drawImage(barrierImage, barrier.x, barrier.y, barrier.width, barrier.height);
        });

        // Draw score
        document.getElementById('currentScore').innerText = Math.floor(score); // Afficher le score sans virgule
        document.getElementById('highScore').innerText = highScore; // Afficher le meilleur score sans virgule
    }
}

function jump() {
    if (!dino.jumping) {
        dino.velocityY = dino.jumpPower;
        dino.jumping = true;
    }
}

function handleInput(e) {
    if (e.code === 'Space' || e.type === 'click') {
        jump();
    }
}

document.addEventListener('keydown', handleInput);
document.addEventListener('click', handleInput);

function startGame() {
    if (!gameRunning) {
        gameRunning = true;
        barriers.length = 0; // Réinitialiser les obstacles
        obstaclesAdded = 0; // Réinitialiser le compteur d'obstacles ajoutés
        score = 0;
        dino.y = canvas.height - dino.height;
        dino.velocityY = 0;
        speedMultiplier = 2; // Commencer avec une vitesse x2
        pointsPerSecond = 10; // Points gagnés par seconde
        lastObstacleTime = Date.now(); // Réinitialiser le temps du dernier obstacle ajouté

        // Générer quelques premiers obstacles espacés largement
        for (let i = 0; i < 2; i++) {
            generateBarrier();
        }

        gameInterval = setInterval(update, 1000 / 60); // 60 FPS

        // Ajout de points toutes les 0.1 secondes
        scoreInterval = setInterval(() => {
            score += pointsPerSecond / 10; // Points gagnés toutes les 0.1 secondes
            const roundedScore = Math.floor(score); // Arrondir le score à l'entier inférieur
            
            if (Math.floor(roundedScore / 50) * 50 === roundedScore) { // Vérifier les multiples de 50
                speedMultiplier += speedMultiplier * 0.003; // Accélérer le jeu de 0.3%
                pointsPerSecond += pointsPerSecond * 0.003; // Accélérer le gain de points proportionnellement
                barrierMinDistance = Math.max(300, barrierMinDistance - barrierMinDistance * 0.001); // Réduire la distance minimum entre les obstacles
                barrierMaxDistance = Math.max(barrierMinDistance + 100, barrierMaxDistance - barrierMaxDistance * 0.001); // Réduire la distance maximum entre les obstacles
            }
            if (roundedScore % 100 === 0 && roundedScore !== 0) {
                sound.play(); // Jouer le son tous les 100 points
                animateCard(); // Ajouter une animation tous les 100 points
            }
            if (roundedScore > highScore) {
                highScore = roundedScore;
                localStorage.setItem('highScore', highScore);
            }
        }, 100); // Ajouter des points toutes les 0.1 secondes
        
        document.getElementById('gameOverMessage').style.display = 'none'; // Cacher le message Game Over
    }
}

function restartGame() {
    if (!gameRunning) {
        startGame();
    }
}

document.getElementById('restartButton').addEventListener('click', restartGame);

// Fonction d'animation de la carte
function animateCard() {
    const card = document.getElementById('card');
    
    // Ajouter une classe pour l'animation
    card.classList.add('animate');
    
    // Retirer la classe après l'animation
    setTimeout(() => {
        card.classList.remove('animate');
    }, 2000); // La durée de l'animation en ms
}

// Démarrer le jeu au chargement de la page
startGame();
