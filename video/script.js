document.addEventListener('DOMContentLoaded', () => {
    const videoElement = document.getElementById('video');
    const playPauseButton = document.getElementById('play-pause');
    const seekBar = document.getElementById('seek-bar');
    const volumeSlider = document.getElementById('volume');
    const fullscreenButton = document.getElementById('fullscreen');
    const progressBar = document.getElementById('progress-bar');
    const videoPlayer = document.getElementById('video-player');
    const videoItems = document.querySelectorAll('.video-item');
    const controls = document.getElementById('controls');
    const speedButtons = document.querySelectorAll('#speed-selector .control-btn');
    
    let isMouseOverControls = false;
    let hideControlsTimeout;

    // Fonction pour lire ou mettre en pause la vidéo
    const togglePlayPause = () => {
        if (videoElement.paused) {
            videoElement.play();
            playPauseButton.innerHTML = '⏸️';
        } else {
            videoElement.pause();
            playPauseButton.innerHTML = '▶️';
        }
    };

    // Fonction pour ouvrir le lecteur vidéo
    const openVideoPlayer = (url) => {
        videoElement.src = url;
        videoElement.play();
        playPauseButton.innerHTML = '⏸️';
        videoPlayer.style.display = 'block';
        document.body.style.backgroundColor = '#000';
        videoElement.controls = false; // Masquer les contrôles natifs
    };

    // Fonction pour fermer le lecteur vidéo
    const closeVideoPlayer = () => {
        videoPlayer.style.display = 'none';
        document.body.style.backgroundColor = '#111';
        videoElement.pause();
        videoElement.src = '';
    };

    // Ajouter les événements aux éléments vidéo
    videoItems.forEach(item => {
        const videoUrl = item.getAttribute('data-video-url');
        item.addEventListener('click', () => openVideoPlayer(videoUrl));
    });

    // Événements des contrôles de lecture/pause
    playPauseButton.addEventListener('click', togglePlayPause);

    // Mise à jour de la barre de progression
    videoElement.addEventListener('timeupdate', () => {
        const percent = (videoElement.currentTime / videoElement.duration) * 100;
        progressBar.style.width = `${percent}%`;
        seekBar.value = percent;
    });

    // Contrôle de la barre de recherche
    seekBar.addEventListener('input', () => {
        videoElement.currentTime = (seekBar.value / 100) * videoElement.duration;
    });

    // Contrôle du volume
    volumeSlider.addEventListener('input', () => {
        videoElement.volume = volumeSlider.value / 100;
    });

    // Plein écran
    fullscreenButton.addEventListener('click', () => {
        if (videoPlayer.requestFullscreen) {
            videoPlayer.requestFullscreen();
        } else if (videoPlayer.mozRequestFullScreen) { // Firefox
            videoPlayer.mozRequestFullScreen();
        } else if (videoPlayer.webkitRequestFullscreen) { // Chrome, Safari, Opera
            videoPlayer.webkitRequestFullscreen();
        } else if (videoPlayer.msRequestFullscreen) { // IE/Edge
            videoPlayer.msRequestFullscreen();
        }
    });

    // Changer la vitesse de lecture
    speedButtons.forEach(button => {
        button.addEventListener('click', () => {
            const rate = parseFloat(button.getAttribute('data-rate'));
            videoElement.playbackRate = rate;

            // Mettre à jour l'état des boutons
            speedButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        });
    });

    // Fermer le lecteur vidéo en cliquant à l'extérieur
    document.addEventListener('click', (e) => {
        if (!videoPlayer.contains(e.target) && !e.target.closest('.video-item')) {
            closeVideoPlayer();
        }
    });

    // Empêcher la fermeture en cliquant sur la vidéo
    videoPlayer.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    // Gestion de l'affichage des contrôles
    videoPlayer.addEventListener('mousemove', () => {
        controls.style.opacity = '1';
        clearTimeout(hideControlsTimeout);
        hideControlsTimeout = setTimeout(() => {
            if (!isMouseOverControls) {
                controls.style.opacity = '0';
            }
        }, 3000);
    });

    controls.addEventListener('mouseover', () => {
        isMouseOverControls = true;
        controls.style.opacity = '1';
        clearTimeout(hideControlsTimeout);
    });

    controls.addEventListener('mouseout', () => {
        isMouseOverControls = false;
        hideControlsTimeout = setTimeout(() => {
            controls.style.opacity = '0';
        }, 3000);
    });

    // Gestion des gestes tactiles pour fermer la vidéo
    let touchstartX = 0;
    let touchendX = 0;
    let touchstartY = 0;
    let touchendY = 0;

    const handleSwipe = () => {
        if (Math.abs(touchendX - touchstartX) > 50 || Math.abs(touchendY - touchstartY) > 50) {
            closeVideoPlayer();
        }
    };

    document.addEventListener('touchstart', (e) => {
        touchstartX = e.changedTouches[0].screenX;
        touchstartY = e.changedTouches[0].screenY;
    });

    document.addEventListener('touchend', (e) => {
        touchendX = e.changedTouches[0].screenX;
        touchendY = e.changedTouches[0].screenY;
        handleSwipe();
    });

    // Afficher les contrôles natifs sur mobile et gérer la fin de la vidéo
    if (window.innerWidth <= 768) {
        videoPlayer.style.display = 'block'; // Afficher le lecteur vidéo
        videoElement.controls = true; // Afficher les contrôles natifs
        videoElement.addEventListener('ended', closeVideoPlayer);
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const backToHubButton = document.getElementById('back-to-hub');
    
    if (backToHubButton) {
        backToHubButton.addEventListener('click', () => {
            window.location.href = 'https://hub.nolannthuillier.fr/';
        });
    }
});
