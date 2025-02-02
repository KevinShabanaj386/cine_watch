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
  <script defer src="../dist/js/show.js"></script>
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

<div class="slideshow-container">
  <div class="slide">
    <img src="../dist/images/shows/slidesho1.jpg" alt="Slide 1">
    <div class="text-container">
      <h1>Squid Game</h1>
      <p>19 &#8226 2021 &#8226 Action/Adventure/Mystery/Drama</p>
      <p>2 seasons</p>
      <a class="watch-link" href="../pages/show-page.php?show=SquidGame" id="watchLink">Watch Now</a> 
    </div>
  </div>
  <div class="slide">
    <img src="../dist/images/shows/slidesho2.jpg" alt="Slide 2">
    <div class="text-container">
      <h1>Breaking Bad</h1>
      <p>TV-MA &#8226 06/07/2024 &#8226 Drana/Crime</p>
      <p>5 seasons</p>
      <a class="watch-link" href="../pages/show-page.php?show=BreakingBad" id="watchLink">Watch Now</a>
    </div>
  </div>
  <div class="slide">
    <img src="../dist/images/shows/slidesho3.jpg" alt="Slide 3">
    <div class="text-container">
      <h1>Peaky Blinders</h1>
      <p>18 &#8226 2013 &#8226 Drama/Crime</p>
      <p>6 seasons</p>
      <a class="watch-link" href="../pages/show-page.php?show=PeakyBlinders" id="watchLink">Watch Now</a>
    </div>
  </div>

  <button class="prev">&#10094;</button>
  <button class="next">&#10095;</button>
</div>
  
 
    <div class="heading">
      <h2 class="heading-title">TV Series</h2>
    </div>
    
    <div class="movie-container">

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster1.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Rick and Morty</h3> 
          <p class="movie-description">Animation</p>
          <p>7 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=RickandMorty" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster2.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Sopranos</h3> 
          <p class="movie-description">Drama</p>
          <p>6 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TheSopranos" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster3.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Last of Us </h3> 
          <p class="movie-description">Drama</p>
          <p>1 season</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TheLastofUs" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster4.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Office</h3> 
          <p class="movie-description">Comedy</p>
          <p>9 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TheOffice" id="watchLink">Watch Now</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster5.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Sherlock</h3> 
          <p class="movie-description">Mystery</p>
          <p>4 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=Sherlock" id="watchLink">Watch Now</a>   
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster6.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">House</h3> 
          <p class="movie-description">Drama</p>
          <p>8 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=House" id="watchLink">Watch Now</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster7.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">INVINCIBLE</h3> 
          <p class="movie-description">Animation</p>
          <p>2 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=INVINCIBLE" id="watchLink">Watch Now</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster8.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Toradora!</h3> 
          <p class="movie-description">Animation</p>
          <p>1 season</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=Toradora" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster9.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Rookie</h3> 
          <p class="movie-description">Crime</p>
          <p>6 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TheRookie" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster10.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Boys</h3> 
          <p class="movie-description">Sci-Fi & Fantasy</p>
          <p>3 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TheBoys" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster11.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Game of Thrones </h3> 
          <p class="movie-description">Sci-Fi & Fantasy</p>
          <p>8 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=GameofThrones" id="watchLink">Watch Now</a>
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster12.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Prison Break</h3> 
          <p class="movie-description">Action & Adventure</p>
          <p>5 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=PrisonBreak" id="watchLink">Watch Now</a>
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster13.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Snowfall</h3> 
          <p class="movie-description">Crime</p>
          <p>6 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=Snowfall" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster14.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Witcher</h3> 
          <p class="movie-description">Sci-Fi & Fantasy</p>
          <p>3 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=TheWitcher" id="watchLink">Watch Now</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster15.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Friends</h3> 
          <p class="movie-description">Comedy</p>
          <p>10 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=Friends" id="watchLink">Watch Now</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/shows/poster16.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Modern Family</h3> 
          <p class="movie-description">Comedy</p>
          <p>11 seasons</p>
        </div>
        <div class="movie-play">
          <a class="watch-link" href="../pages/show-page.php?show=ModernFamily" id="watchLink">Watch Now</a> 
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