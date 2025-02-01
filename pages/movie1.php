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
  <script defer src="../dist/js/movies.js"></script>
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
 
    <div class="heading">
      <h2 class="heading-title">Movies Page 2</h2>
    </div>
    
    <div class="movie-container">

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster17.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Hacksaw Ridge</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=HacksawRidge" class="watch-btn">Watch</a>
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster18.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Top Gun: Maverick</h3> 
          <p class="movie-description">Action</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TopGunMaverick" class="watch-btn">Watch</a>
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster19.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Scarface</h3> 
          <p class="movie-description">Crime</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=Scarface" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster20.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Good Will Hunting</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=GoodWillHunting" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster21.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Joker</h3> 
          <p class="movie-description">Crime</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=Joker" class="watch-btn">Watch</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster22.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Truman Show</h3> 
          <p class="movie-description">Comedy</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheTrumanShow" class="watch-btn">Watch</a>   
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster23.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Togo</h3> 
          <p class="movie-description">Adventure</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=Togo" class="watch-btn">Watch</a>    
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster24.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Prisoners</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=Prisoners" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster25.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">WALL·E</h3> 
          <p class="movie-description">Animation</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=WALLE" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster26.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Oppenheimer</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=Oppenheimer" class="watch-btn">Watch</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster27.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Wolf of Wall Street</h3> 
          <p class="movie-description">Crime</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheWolfofWallStreet" class="watch-btn">Watch</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster28.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Titanic</h3> 
          <p class="movie-description">Romance</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=Titanic" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster29.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Pursuit of Happyness</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=ThePursuitofHappyness" class="watch-btn">Watch</a> 
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster30.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">How to Train Your Dragon</h3> 
          <p class="movie-description">Animation</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=HowtoTrainYourDragon" class="watch-btn">Watch</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster31.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">The Dark Knight Rises</h3> 
          <p class="movie-description">Action</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=TheDarkKnightRises" class="watch-btn">Watch</a>  
        </div>
      </div>

      <div class="movie-card">
        <img class="poster" src="../dist/images/movies/poster32.jpg" alt="poster">
        <div class="movie-info">
          <h3 class="movie-title">Rain Man</h3> 
          <p class="movie-description">Drama</p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=RainMan" class="watch-btn">Watch</a>
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
          <a href="">Gandre</a>
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
        <h3>&#169 2025 CineWatch. All rights reserved </h3>
      </div>
      

    </footer>

</body>
</html>