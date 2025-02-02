<?php
session_start();
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
} else {
  $username = null;
}

$host = 'localhost';
$dbname = 'cineWhatch';
$usernameDB = 'root';
$passwordDB = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $usernameDB, $passwordDB);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$sql = "SELECT * FROM tv_shows ORDER BY id ASC LIMIT 16";  
$stmt = $conn->query($sql);
$tvShows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM tv_shows ORDER BY RAND() LIMIT 3";
$stmt = $conn->query($sql);
$randomShows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineWatch | TV Series</title>
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
            <a href="../pages/home.php">Up Coming</a>
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
  <?php foreach ($randomShows as $show): ?>
    <div class="slide">
      <img 
        src="<?php echo htmlspecialchars($show['image'], ENT_QUOTES); ?>" 
        alt="Slide Image"
      >
      <div class="text-container">
        <h1><?php echo htmlspecialchars($show['title'], ENT_QUOTES); ?></h1>

        <p>
          <?php 
            echo htmlspecialchars($show['ratings'] ?? '', ENT_QUOTES);
            echo " &#8226; ";
            echo htmlspecialchars($show['release_date'] ?? '', ENT_QUOTES);
            echo " &#8226; ";
            echo htmlspecialchars($show['genre'] ?? '', ENT_QUOTES);
          ?>
        </p>

        <a 
          href="show-page.php?show=<?php echo urlencode($show['title']); ?>" 
          class="watch-btn"
        >
          Watch
        </a>
      </div>
    </div>
  <?php endforeach; ?>

  <button class="prev">&#10094;</button>
  <button class="next">&#10095;</button>
</div>

<div class="heading">
  <h2 class="heading-title">TV Series</h2>
</div>

<div class="movie-container">
  <?php foreach ($tvShows as $show): ?>
    <div class="movie-card">
      <img class="poster" src="<?php echo htmlspecialchars($show['image'], ENT_QUOTES); ?>" alt="poster">
      <div class="movie-info">
        <h3 class="movie-title"><?php echo htmlspecialchars($show['title'], ENT_QUOTES); ?></h3> 
        <p class="movie-description"><?php echo htmlspecialchars($show['genre'], ENT_QUOTES); ?></p>
      </div>
      <div class="movie-play">
        <a class="watch-link" href="show-page.php?show=<?php echo urlencode($show['title']); ?>" id="watchLink">Watch Now</a> 
      </div>
    </div>
  <?php endforeach; ?>
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
      <a href="../pages/home.php">Up Coming</a>
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
      <p>Genre</p>
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
