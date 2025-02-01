<?php

session_start();
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
}else{
  $username = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineWatch | ShowPage</title>
  <script defer src="../dist/js/show-page.js"></script>
  <link rel="stylesheet" href="../dist/css/header.css">
  <link rel="stylesheet" href="../dist/css/footer.css">
  <link rel="stylesheet" href="../dist/css/show-page.css">
</head>
<body>
<header class="header">
    <div class="left-section">
        <img class="logo" src="../dist/images/logo.png" alt="logo">
    </div>
    <div class="middle-secion-1">
        <ul class="navbar">
            <a href="../pages/home.php">Trending</a>
            <a href="../pages/movie.php">Movies</a>
            <a href="../pages/shows.php">TV Series</a>
            
            <div class="dropdownn">
                <a href="#" class="dropbtnn">Genre</a>
                <div class="dropdownn-content">
                <a href="genre.php?name=Action">Action</a>
                <a href="genre.php?name=Adventure">Adventure</a>
                <a href="genre.php?name=Crime">Crime</a>
                <a href="genre.php?name=Thriller">Thriller</a>
                <a href="genre.php?name=Comedy">Comedy</a>
                <a href="genre.php?name=Romance">Romance</a>
                <a href="genre.php?name=Drama">Drama</a>
                <a href="genre.php?name=Science Fiction">Science Fiction</a>
                </div>
            </div>
        </ul>
    </div>
    
    <div class="middle-secion-2">
        <input type="text" class="search-input" placeholder="| Search">
    </div>
    
    <div class="right-section">
        <a class="sign-in" href="../register.php">Register</a>
    </div>
</header>

  <div class="heading">
    <h2 class="heading-title" id="show-title">Movie/Show Title</h2>
  </div>

  <div class="image-container">
    <img src="../dist/images/shows-play/img1.jpg" alt="show-preview" id="show-image">
  </div>

  <div class="container">
    <div class="description-cast">
      <div class="season-selector">
        <label for="season">Select Season:</label>
        <select id="season" class="dropdown" onchange="showEpisodes(this.value)">
          
        </select>
        <div id="episode-container" class="episode-container"></div>
      </div>

      <div class="movie-description">
        <p>Description</p>
        <p class="movie-text" id="show-description"></p>
      </div>

      <div class="movie-cast">
        <p>Cast</p>
        <div class="movie-cast-container" id="cast-container">
          
        </div>
      </div>
    </div>

    <div class="movie-info">
      <div class="info-item">
        <p class="info-title">Release Date</p>
        <p class="info-content" id="release-date"></p>
      </div>
      <div class="info-item">
        <p class="info-title">Available Languages</p>
        <p class="info-content" id="languages"></p>
      </div>      
      <div class="info-item">
        <p class="info-title">Ratings</p>
        <p class="info-content" id="ratings"></p>
      </div>
      <div class="info-item">
        <p class="info-title">Genre</p>
        <p class="info-content" id="genre"></p>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="footer-top">
      <div class="menut">
        <p>Menu</p>
        <a href="/pages/home.php">Trending</a>
        <a href="/pages/movie.php">Movies</a>
        <a href="">TV Series</a>
        <a href="">Genre</a>
      </div>
      <div class="informacion">
        <p>Get Help</p>
        <a href="">About Us</a>
        <a href="">Contact Us</a>
        <a href="">Support Page</a>
        <a href="">Survey</a>
      </div>
      <div class="zhandrat">
        <p>Genre</p>
        <a href="">Action</a>
        <a href="">Adventure</a>
        <a href="">Crime</a>
        <a href="">Thriller</a>
        <a href="">Comedy</a>
        <a href="">Romance</a>
        <a href="">Science Fiction</a>
      </div>
      <div class="follow-us">
        <p>Follow Us</p>
        <a href="https://www.instagram.com/">Instagram</a>
        <a href="https://www.facebook.com/">Facebook</a>
        <a href="https://x.com/?lang=en&mx=2">Twitter</a>
        <a href="https://www.tiktok.com/explore">TikTok</a>
      </div>
    </div>
    
    <div class="footer-bottom">
      <h3>&#169; 2025 CineWatch. All rights reserved</h3>
    </div>
  </footer>
</body>
</html>
