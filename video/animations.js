// animations.js

document.addEventListener('DOMContentLoaded', () => {
    const controls = document.getElementById('controls');

    // Ajouter ou retirer la classe 'show' pour les contrôles en fonction de l'interaction
    const showControls = () => {
        controls.classList.add('show');
        clearTimeout(hideControlsTimeout);
        hideControlsTimeout = setTimeout(() => {
            controls.classList.remove('show');
        }, 3000);
    };

    videoPlayer.addEventListener('mousemove', showControls);

    controls.addEventListener('mouseover', () => {
        controls.classList.add('show');
        clearTimeout(hideControlsTimeout);
    });

    controls.addEventListener('mouseout', () => {
        hideControlsTimeout = setTimeout(() => {
            controls.classList.remove('show');
        }, 3000);
    });

    // Ajouter une animation de fondu pour l'apparition du lecteur vidéo
    const videoPlayer = document.getElementById('video-player');
    const fadeIn = () => {
        videoPlayer.style.opacity = 0;
        videoPlayer.style.display = 'block';
        let opacity = 0;
        const interval = setInterval(() => {
            opacity += 0.05;
            videoPlayer.style.opacity = opacity;
            if (opacity >= 1) {
                clearInterval(interval);
            }
        }, 30);
    };

    const openVideoPlayer = (url) => {
        videoElement.src = url;
        videoElement.play();
        playPauseButton.innerHTML = '⏸️';
        fadeIn();
        document.body.style.backgroundColor = '#000';
        videoElement.controls = false;
    };

    // Autres codes d'animation ou d'interaction
});
