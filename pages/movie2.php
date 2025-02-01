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
  <script defer src="../dist/js/moviess.js"></script>
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
            <a href="../pages/movie.php" class="home-active">Movies</a>
            <a href="../pages/shows.php">TV Series</a>
            
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
      <form id="searchForm" action="search.php" method="GET">
        <input type="text" id="searchInput" name="query" class="search-input" placeholder="| Search">
      </form>
    </div>
    
    <div class="right-section">
        <a class="sign-in" href="../register.php">Register</a>
    </div>
</header>
 
    <div class="heading">
      <h2 class="heading-title">Movies Page 3</h2>
    </div>
    
    <div class="movie-container">

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster33.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">John Wick</h3> 
          <p class="movie-description">Action</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=JohnWick" class="watch-btn">Watch</a>
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster34.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Blind Side</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheBlindSide" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster35.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Terminator</h3> 
          <p class="movie-description">Thriller</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheTerminator" class="watch-btn">Watch</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster36.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Venom: The Last Dance</h3> 
          <p class="movie-description">Action</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=VenomTheLastDance" class="watch-btn">Watch</a>   
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster37.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Fast X</h3> 
          <p class="movie-description">Action</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=FastX" class="watch-btn">Watch</a>   
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster38.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Lembayung</h3> 
          <p class="movie-description">Horror</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=Lembayung" class="watch-btn">Watch</a>   
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster39.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Hangover</h3> 
          <p class="movie-description">Comedy</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheHangover" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster40.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Spectre</h3> 
          <p class="movie-description">Action</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=Spectre" class="watch-btn">Watch</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster41.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Break-Up</h3> 
          <p class="movie-description">Romance</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheBreakUp" class="watch-btn">Watch</a>   
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster42.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Irishman</h3> 
          <p class="movie-description">Crime</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheIrishman" class="watch-btn">Watch</a>  
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
          <p>Gandre</p>
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
    <script src="search.js"></script>
</body>
</html>