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
  <link rel="stylesheet" href="../dist/css/home.css">
  <link rel="stylesheet" href="../dist/css/header.css">
  <title>CineWatch | Trending</title>
  <script defer src="../dist/js/home.js"></script>
</head>

<body style="background-image: url(../dist/images/home/bck1.jpg);">

<header class="header">
    <div class="left-section">
        <img class="logo" src="../dist/images/logo.png" alt="logo">
    </div>
    <div class="middle-secion-1">
        <ul class="navbar">
            <a href="../pages/home.php" class="home-active">Trending</a>
            <a href="../pages/movie.php">Movies</a>
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

  <main id="content">
    <div class="card">
      <div class="title">
        <img class="titulli" src="../dist/images/home/avangers.png" alt="avengers">
      </div>
      <div class="movie-info">
        <p class="kategorit">2023 | PG-13 | 2h 29min | Action/Sci-fi</p>
      </div>
      <div class="description">
        <p class="pershkrimi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, optio, atque harum maiores odio cupiditate amet culpa quibusdam tenetur quam illum. Nobis dolorem aliquam laboriosam dolor ducimus necessitatibus, ullam minima!</p>
      </div>
      <div class="buttonat">
        <div class="watch-now">
        <a href="movie-page-open.php?movie=<?= urlencode('Avengers: Infinity War'); ?>" class="watch-now-btn watch-now-red">Watch Now</a>
        </div>
        <div class="watch-now">
          <a href="https://www.youtube.com/watch?v=6ZfuNTqbHE8" class="watch-now-btn watch-now-white">Trailer</a>
        </div>
      </div>
    </div>
  </main>

  <div class="image-container">
    <img class="poster" data-page="page1" src="../dist/images/home/img1.jpg" alt="poster">
    <img class="poster" data-page="home" src="../dist/images/home/img2.jpg" alt="poster">
    <img class="poster" data-page="page2" src="../dist/images/home/img3.jpg" alt="poster">
    <img class="poster" data-page="page3" src="../dist/images/home/img4.jpg" alt="poster">
    <img class="poster" data-page="page4" src="../dist/images/home/img5.jpg" alt="poster">
    <img class="poster" data-page="page5" src="../dist/images/home/img6.jpg" alt="poster">
  </div>

</body>

</html>