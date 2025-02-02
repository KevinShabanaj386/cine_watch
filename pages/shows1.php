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
  <script defer src="../dist/js/shows.js"></script>
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
            <a href="../pages/home.php">Up Comming</a>
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
      <form id="searchForm" action="search.php" method="GET">
        <input type="text" id="searchInput" name="query" class="search-input" placeholder="| Search">
      </form>
    </div>
    
    <div class="right-section">
        <a class="sign-in" href="../register.php">Register</a>
    </div>
</header>
  
    <div class="heading">
      <h2 class="heading-title">TV Series Page 2</h2>
    </div>
    
    <div class="movie-container">

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster17.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Better Call Saul</h3> 
          <p class="movie-description">Crime</p>
          <p>6 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=BetterCallSaul" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster18.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Spectacular Spider-Man</h3> 
          <p class="movie-description">Action & Adventure</p>
          <p>2 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TheSpectacularSpiderMan" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster19.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Band of Brothers</h3> 
          <p class="movie-description">Drama</p>
          <p>1 season</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=BandofBrothers" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster20.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Teen Wolf</h3> 
          <p class="movie-description">Sci-Fi & Fantasy</p>
          <p>6 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TeenWolf" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster21.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Good Doctor</h3> 
          <p class="movie-description">Drama</p>
          <p>7 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TheGoodDoctor" id="watchLink">Watch Now</a>
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster22.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Queen's Gambit</h3> 
          <p class="movie-description">Drama</p>
          <p>1 season</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TheQueensGambit" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster23.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Penguin</h3> 
          <p class="movie-description">Drama</p>
          <p>1 season</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=ThePenguin" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster24.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Lucifer</h3> 
          <p class="movie-description">Sci-Fi & Fantasy</p>
          <p>6 season</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=Lucifer" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster25.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Tulsa King</h3> 
          <p class="movie-description">Crime</p>
          <p>2 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TulsaKing" id="watchLink">Watch Now</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster26.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Peacemaker</h3> 
          <p class="movie-description">Action</p>
          <p>1 season</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=Peacemaker" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster27.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Henry Danger</h3> 
          <p class="movie-description">Comedy</p>
          <p>5 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=HenryDanger" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster28.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Hannibal</h3> 
          <p class="movie-description">Drama</p>
          <p>3 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=Hannibal" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster29.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Mr. Robot</h3> 
          <p class="movie-description">Crime</p>
          <p>4 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=MrRobot" id="watchLink">Watch Now</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster30.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Money Heist</h3> 
          <p class="movie-description">Crime</p>
          <p>3 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=MoneyHeist" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster31.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">WandaVision</h3> 
          <p class="movie-description">Sci-Fi & Fantasy</p>
          <p>1 season</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=WandaVision" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster32.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Brooklyn Nine-Nine</h3> 
          <p class="movie-description">Comedy</p>
          <p>7 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=BrooklynNineNine" id="watchLink">Watch Now</a> 
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
          <a href="../pages/home.php">Up Comming</a>
          <a href="../pages/movie.php">Movies</a>
          <a href="../pages/shows.php">TV Series</a>
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