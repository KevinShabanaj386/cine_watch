function playMovie() {
    let videoContainer = document.getElementById("video-container");
  
    videoContainer.style.display = "block";
  
    const moviePlayer = document.getElementById("movie-player");
    moviePlayer.play();
  }
  
  function closeMovie() {
    let videoContainer = document.getElementById("video-container");
  
    videoContainer.style.display = "none";
  
    const moviePlayer = document.getElementById("movie-player");
    moviePlayer.pause();
    moviePlayer.currentTime = 0;
  }