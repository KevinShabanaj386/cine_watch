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
  <script defer src="../dist/js/movie.js"></script>
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
        <input type="text" class="search-input" placeholder="| Search">
    </div>
    
    <div class="right-section">
        <a class="sign-in" href="../register.php">Register</a>
    </div>
</header>


<div class="slideshow-container">
  <div class="slide">
    <img src="../dist/images/movies/slidesho1.jpg" alt="Slide 1">
    <div class="text-container">
      <h1>Mufasa: The Lion King</h1>
      <p>PG &#8226 12/20/24 &#8226 Adventure/Family/Animation &#8226 1h 58m </p>
      <a href="movie-page-open.php?movie=MufasaTheLionKing" class="watch-btn">Watch</a>
    </div>
  </div>
  <div class="slide">
    <img src="../dist/images/movies/slidesho2.jpg" alt="Slide 2">
    <div class="text-container">
      <h1>Bad Boys: Ride or Die</h1>
      <p>R &#8226 06/07/2024 &#8226 Action/Comedy/Crime/Thriller/Adventure &#8226 1h 55m</p>
      <a href="movie-page-open.php?movie=BadBoysRideorDie" class="watch-btn">Watch</a>
    </div>
  </div>
  <div class="slide">
    <img src="../dist/images/movies/slidesho3.jpg" alt="Slide 3">
    <div class="text-container">
      <h1>Interstellar</h1>
      <p>PG-13 &#8226 11/05/2014 &#8226 Adventure/Drama/Science Fiction &#8226 2h 49m</p>
      <a href="movie-page-open.php?movie=Interstellar" class="watch-btn">Watch</a>
    </div>
  </div>

  <button class="prev">&#10094;</button>
  <button class="next">&#10095;</button>
</div>
  
 
    <div class="heading">
      <h2 class="heading-title">Movies</h2>
    </div>
    
    <div class="movie-container">

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster1.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Kraven the Hunter</h3> 
          <p class="movie-description">Action</p>
        </div>
        <div class="movie-play">
        <a href="movie-page-open.php?movie=kraven" class="watch-btn">Watch</a>
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster2.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Red One</h3> 
          <p class="movie-description">Action</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=redone" class="watch-btn">Watch</a>
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster3.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Elevation</h3> 
          <p class="movie-description">Thriller</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=elevation" class="watch-btn">Watch</a>
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster4.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Carry-On</h3> 
          <p class="movie-description">Thriller</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=CarryOn" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster5.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Sonic the Hedgehog</h3> 
          <p class="movie-description">Comedy</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=SonictheHedgehog" class="watch-btn">Watch</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster6.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">GoodFellas</h3> 
          <p class="movie-description">Crime</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=GoodFellas" class="watch-btn">Watch</a>
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster7.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Dark Knight</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheDarkKnight" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster8.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Forrest Gump</h3> 
          <p class="movie-description">Comedy</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=ForrestGump" class="watch-btn">Watch</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster9.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Fight Club</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=FightClub" class="watch-btn">Watch</a>   
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster10.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Spider-Man: Into the Spider-Verse</h3> 
          <p class="movie-description">Animation</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=SpiderManIntotheSpiderVerse" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster11.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Inception</h3> 
          <p class="movie-description">Action</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=Inception" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster12.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Whiplash</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=Whiplash" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster13.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Avengers: Endgame</h3> 
          <p class="movie-description">Adventure</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=AvengersEndgame" class="watch-btn">Watch</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster14.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Shutter Island</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=ShutterIsland" class="watch-btn">Watch</a>   
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster15.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Matrix</h3> 
          <p class="movie-description">Action</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheMatrix" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster16.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Departed</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheDeparted" class="watch-btn">Watch</a> 
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

</body>
</html>