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
  <title>CineWatch | MoviePage</title>
  <script defer src="../dist/js/movie-page.js"></script>
  <link rel="stylesheet" href="../dist/css/header.css">
  <link rel="stylesheet" href="../dist/css/footer.css">
  <link rel="stylesheet" href="../dist/css/movie-page.css">
</head>
<body>
  <header class="header">
    <div class="left-section">
        <img class="logo" src="../dist/images/logo.png" alt="log">
    </div>
    <div class="middle-section-1">
        <ul class="navbar">
            <a href="../pages/home.php">Trending</a>
            <a href="../pages/movie.php">Movies</a>
            <a href="../pages/shows.php">TV Series</a>
            <a href="">Genre</a>
        </ul>
    </div>
    <div class="middle-section-2">
        <input type="text" class="search-input" placeholder="| Search">
    </div>
    <div class="right-section">
      <a class="sign-in" href="../register.php">Register</a>
    </div>
  </header>

  <div class="heading">
    <h2 class="heading-title" id="movie-title">Movies</h2>
  </div>

  <div class="image-container">
    <img id="movie-image" src="../dist/images/movies/slidesho1.jpg" alt="preview">
  </div>
  

  <div class="container">
    <div class="description-cast">
     
      <div class="movie-description">
        <p>Description</p>
        <p class="movie-text" id="movie-description">Movie Description</p>
      </div>
  
      
      <div class="movie-cast">
        <p>Cast</p>
        <div class="movie-cast-container">
          <div class="cast-item">
            <img class="cast-photo" id="cast-photo-1" src="../dist/images/movies/poster1.jpg" alt="cast">
            <div class="emrat">
              <p id="cast-name-1">Name Surname</p>
              <p id="cast-role-1">(Role Name)</p>
            </div>
          </div>
  
          <div class="cast-item">
            <img class="cast-photo" id="cast-photo-2" src="../dist/images/movies/poster1.jpg" alt="cast">
            <div class="emrat">
              <p id="cast-name-2">Name Surname</p>
              <p id="cast-role-2">(Role Name)</p>
            </div>
          </div>
  
          <div class="cast-item">
            <img class="cast-photo" id="cast-photo-3" src="../dist/images/movies/poster1.jpg" alt="cast">
            <div class="emrat">
              <p id="cast-name-3">Name Surname</p>
              <p id="cast-role-3">(Role Name)</p>
            </div>
          </div>
  
          <div class="cast-item">
            <img class="cast-photo" id="cast-photo-4" src="../dist/images/movies/poster1.jpg" alt="cast">
            <div class="emrat">
              <p id="cast-name-4">Name Surname</p>
              <p id="cast-role-4">(Role Name)</p>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  
   
    <div class="movie-info">
      <div class="info-item">
        <p class="info-title">Release Date</p>
        <p class="info-content" id="release-date">2022</p>
      </div>
      <div class="info-item">
        <p class="info-title">Available Languages</p>
        <p class="info-content" id="available-languages">English, Albanian, Russian</p>
      </div>
      <div class="info-item">
        <p class="info-title">Ratings</p>
        <p class="info-content" id="ratings">3/5</p>
      </div>
      <div class="info-item">
        <p class="info-title">Genre</p>
        <p class="info-content" id="genre">Action, Adventure</p>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="footer-top">
      <div class="menut">
        <p>Menu</p>
        <a href="/pages/home.php">Trending</a>
        <a href="/pages/movie.ph">Movies</a>
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
