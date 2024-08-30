document.addEventListener('DOMContentLoaded', function() {
    const musicList = document.getElementById('music-list');
    const audio = document.getElementById('audio');
    const playPauseButton = document.getElementById('play-pause');
    const stopButton = document.getElementById('stop');
    const loopButton = document.getElementById('loop');
    const muteButton = document.getElementById('mute');
    const progress = document.getElementById('progress');
    const currentTimeDisplay = document.getElementById('current-time');
    const durationDisplay = document.getElementById('duration');

    const categories = {
        all: ['song1.mp3', 'song2.mp3', 'song3.mp3'],
        instrumental: ['instrumental1.mp3', 'instrumental2.mp3'],
        vocal: ['vocal1.mp3', 'vocal2.mp3']
    };

    let currentCategory = 'all';
    let currentTrackIndex = 0;

    function loadMusic(category) {
        musicList.innerHTML = '';
        categories[category].forEach((track, index) => {
            const musicItem = document.createElement('div');
            musicItem.classList.add('music-item');
            musicItem.textContent = track;
            musicItem.addEventListener('click', () => playTrack(index, category));
            musicList.appendChild(musicItem);
        });
    }

    function playTrack(index, category) {
        currentTrackIndex = index;
        audio.src = `musics/${categories[category][index]}`;
        audio.play();
        playPauseButton.textContent = '⏸️';
    }

    function updateProgress() {
        if (audio.duration) {
            const progressValue = (audio.currentTime / audio.duration) * 100;
            progress.value = progressValue;
            currentTimeDisplay.textContent = formatTime(audio.currentTime);
            durationDisplay.textContent = formatTime(audio.duration);
        }
    }

    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
    }

    playPauseButton.addEventListener('click', function() {
        if (audio.paused) {
            audio.play();
            playPauseButton.textContent = '⏸️';
        } else {
            audio.pause();
            playPauseButton.textContent = '▶️';
        }
    });

    stopButton.addEventListener('click', function() {
        audio.pause();
        audio.currentTime = 0;
        playPauseButton.textContent = '▶️';
    });

    loopButton.addEventListener('click', function() {
        audio.loop = !audio.loop;
        loopButton.textContent = audio.loop ? '🔁 (On)' : '🔁';
    });

    muteButton.addEventListener('click', function() {
        audio.muted = !audio.muted;
        muteButton.textContent = audio.muted ? '🔇' : '🔊';
    });

    progress.addEventListener('input', function() {
        const newTime = (progress.value / 100) * audio.duration;
        audio.currentTime = newTime;
    });

    audio.addEventListener('timeupdate', updateProgress);
    audio.addEventListener('ended', function() {
        if (currentTrackIndex < categories[currentCategory].length - 1) {
            playTrack(currentTrackIndex + 1, currentCategory);
        }
    });

    document.getElementById('category-list').addEventListener('click', function(e) {
        if (e.target.tagName === 'LI') {
            const category = e.target.dataset.category;
            document.querySelector('.sidebar .active').classList.remove('active');
            e.target.classList.add('active');
            currentCategory = category;
            loadMusic(category);
        }
    });

    loadMusic(currentCategory);
});
