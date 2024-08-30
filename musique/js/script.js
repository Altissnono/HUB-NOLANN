document.addEventListener('DOMContentLoaded', () => {
    const musicItems = document.querySelectorAll('.music-item');
    const audio = document.getElementById('audio');
    const audioSource = document.getElementById('audio-source');
    const playButton = document.getElementById('play');
    const pauseButton = document.getElementById('pause');
    const stopButton = document.getElementById('stop');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const loopButton = document.getElementById('loop');
    const progressBar = document.getElementById('progress-bar');
    const volumeBar = document.getElementById('volume-bar');
    const trackTitle = document.getElementById('track-title');
    const coverImage = document.getElementById('cover-image');

    let currentTrackIndex = -1;
    let isLooping = false;
    const tracks = Array.from(musicItems);

    function loadTrack(index) {
        const track = tracks[index];
        if (track) {
            audioSource.src = track.getAttribute('data-src');
            trackTitle.textContent = track.getAttribute('data-title');
            coverImage.src = `images/${track.getAttribute('data-cover')}`;
            audio.load();
            audio.play();
        }
    }

    function playNextTrack() {
        currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
        loadTrack(currentTrackIndex);
    }

    function playPrevTrack() {
        currentTrackIndex = (currentTrackIndex - 1 + tracks.length) % tracks.length;
        loadTrack(currentTrackIndex);
    }

    musicItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentTrackIndex = index;
            loadTrack(currentTrackIndex);
        });
    });

    playButton.addEventListener('click', () => {
        audio.play();
    });

    pauseButton.addEventListener('click', () => {
        audio.pause();
    });

    stopButton.addEventListener('click', () => {
        audio.pause();
        audio.currentTime = 0;
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

    audio.addEventListener('ended', () => {
        if (!isLooping) {
            playNextTrack();
        }
    });

    audio.addEventListener('timeupdate', () => {
        const progress = (audio.currentTime / audio.duration) * 100;
        progressBar.value = progress;
    });

    progressBar.addEventListener('input', () => {
        const newTime = (progressBar.value / 100) * audio.duration;
        audio.currentTime = newTime;
    });

    volumeBar.addEventListener('input', () => {
        audio.volume = volumeBar.value / 100;
    });

    // Optionally load the first track on page load
    if (tracks.length > 0) {
        currentTrackIndex = 0;
        loadTrack(currentTrackIndex);
    }
});
