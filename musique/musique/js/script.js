document.addEventListener('DOMContentLoaded', () => {
    const musicListContainer = document.querySelector('.music-list');
    const audio = document.getElementById('audio');
    const audioSource = document.getElementById('audio-source');
    const playPauseButton = document.getElementById('play-pause');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const loopButton = document.getElementById('loop');
    const shuffleButton = document.getElementById('shuffle');
    const progressBar = document.getElementById('progress-bar');
    const volumeBar = document.getElementById('volume-bar');
    const currentTimeDisplay = document.getElementById('current-time');
    const totalTimeDisplay = document.getElementById('total-time');
    const coverImage = document.getElementById('cover-image');

    let currentTrackIndex = -1;
    let isLooping = false;
    let isShuffling = false;
    let tracks = [];

    // Load music list from JSON
    fetch('music-list.json')
        .then(response => response.json())
        .then(data => {
            tracks = data;
            updateMusicList();
            if (tracks.length > 0) {
                currentTrackIndex = 0;
                loadTrack(currentTrackIndex);
            }
        })
        .catch(error => console.error('Error loading music list:', error));

    function updateMusicList() {
        musicListContainer.innerHTML = '';
        tracks.forEach((track, index) => {
            const item = document.createElement('div');
            item.classList.add('music-item');
            item.setAttribute('data-src', track.file);
            item.setAttribute('data-cover', track.cover);
            item.innerHTML = `
                <img src="images/${track.cover}" alt="${track.title}">
                <div class="music-details">
                    <div class="title">${track.title}</div>
                    <div class="genre">${track.genre}</div>
                    <div class="style">${track.style}</div>
                    <div class="description">${track.description}</div>
                </div>
            `;
            item.addEventListener('click', () => {
                currentTrackIndex = index;
                loadTrack(currentTrackIndex);
            });
            musicListContainer.appendChild(item);
        });
    }

    function loadTrack(index) {
        const track = tracks[index];
        if (track) {
            audioSource.src = `music/${track.file}`;
            coverImage.src = `images/${track.cover}`;
            audio.load();
            audio.play();
            playPauseButton.textContent = '❙❙'; // Pause icon
        }
    }

    function playNextTrack() {
        if (isShuffling) {
            currentTrackIndex = Math.floor(Math.random() * tracks.length);
        } else {
            currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
        }
        loadTrack(currentTrackIndex);
    }

    function playPrevTrack() {
        currentTrackIndex = (currentTrackIndex - 1 + tracks.length) % tracks.length;
        loadTrack(currentTrackIndex);
    }

    playPauseButton.addEventListener('click', () => {
        if (audio.paused) {
            audio.play();
            playPauseButton.textContent = '❙❙'; // Pause icon
        } else {
            audio.pause();
            playPauseButton.textContent = '▶'; // Play icon
        }
    });

    prevButton.addEventListener('click', () => {
        playPrevTrack();
    });

    nextButton.addEventListener('click', () => {
        playNextTrack();
    });

    loopButton.addEventListener('click', () => {
        isLooping = !isLooping;
        audio.loop = isLooping;
        loopButton.style.color = isLooping ? '#ff5722' : '#e0e0e0';
    });

    shuffleButton.addEventListener('click', () => {
        isShuffling = !isShuffling;
        shuffleButton.style.color = isShuffling ? '#ff5722' : '#e0e0e0';
    });

    audio.addEventListener('timeupdate', () => {
        if (audio.duration) {
            const progress = (audio.currentTime / audio.duration) * 100;
            progressBar.value = progress;

            // Update time displays
            const currentMinutes = Math.floor(audio.currentTime / 60);
            const currentSeconds = Math.floor(audio.currentTime % 60).toString().padStart(2, '0');
            currentTimeDisplay.textContent = `${currentMinutes}:${currentSeconds}`;

            const totalMinutes = Math.floor(audio.duration / 60);
            const totalSeconds = Math.floor(audio.duration % 60).toString().padStart(2, '0');
            totalTimeDisplay.textContent = `${totalMinutes}:${totalSeconds}`;
        }
    });

    progressBar.addEventListener('input', () => {
        const newTime = (progressBar.value / 100) * audio.duration;
        audio.currentTime = newTime;
    });

    volumeBar.addEventListener('input', () => {
        const volume = volumeBar.value / 100;
        audio.volume = volume;
        localStorage.setItem('volume', volume); // Save volume to localStorage
    });

    // Restore volume level from localStorage
    const savedVolume = localStorage.getItem('volume');
    if (savedVolume) {
        audio.volume = parseFloat(savedVolume);
        volumeBar.value = savedVolume * 100;
    }
});
