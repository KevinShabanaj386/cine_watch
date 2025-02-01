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
  <title>CineWhatch | Movies</title>
  <script defer src="../dist/js/showss.js"></script>
  <link rel="stylesheet" href="../dist/css/header.css">
  <link rel="stylesheet" href="../dist/css/movie.css">
  <link rel="stylesheet" href="../dist/css/footer.css">
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
            <a href="../pages/shows.php" class="home-active">TV Series</a>
            
            <div class="dropdown">
                <a href="#" class="dropbtn">Genre</a>
                <div class="dropdown-content">
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
      <h2 class="heading-title">TV Series Page 3</h2>
    </div>
    
    <div class="movie-container">

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster33.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Dexter</h3> 
          <p class="movie-description">Mystery</p>
          <p>8 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=Dexter" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster34.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Loki</h3> 
          <p class="movie-description">Drama</p>
          <p>2 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=Loki" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster35.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Alice in Borderland</h3> 
          <p class="movie-description">Mystery</p>
          <p>2 season</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=AliceInBorderland" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster36.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Shameless</h3> 
          <p class="movie-description">Comedy</p>
          <p>11 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=Shameless" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster37.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Black Bird</h3> 
          <p class="movie-description">Crime</p>
          <p>1 season</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=BlackBird" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster38.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">You</h3> 
          <p class="movie-description">Drama</p>
          <p>4 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=You" id="watchLink">Watch Now</a> 
        </div>
      </div>

    </div>
    
    <div class="buttonat">
      <button id="prev" class="page">Prev</button>
      <button class="page page1">1</button>
      <button class="page page2">2</button>
      <button class="page page3">3</button>
      <button id="next" class="page">Next</button>
    </div>
    
    <footer class="footer">
      
      <div class="footer-top">
        <div class="menut">
          <p>Menu</p>
          <a href="../pages/home.php">Trending</a>
          <a href="../pages/movie.php">Movies</a>
          <a href="">TV Series</a>
        </div>
        <div class="informacion">
          <p>Get Help</p>
          <a href="">About Us</a>
          <a href="">Contact Us</a>
          <a href="">Support Page</a>
          <a href="">Survey</a>
        </div>
        <div class="zhandrat">
        <a href="genre.php?name=Action">Action</a>
          <a href="genre.php?name=Adventure">Adventure</a>
          <a href="genre.php?name=Crime">Crime</a>
          <a href="genre.php?name=Thriller">Thriller</a>
          <a href="genre.php?name=Comedy">Comedy</a>
          <a href="genre.php?name=Romance">Romance</a>
          <a href="genre.php?name=Drama">Drama</a>
          <a href="genre.php?name=Science Fiction">Science Fiction</a>
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
        <h3>&#169 2025 CineWatch. All rights reserved </h3>
      </div>
      

    </footer>

</body>
</html>