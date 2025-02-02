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

$page = isset($_GET['page']) ? $_GET['page'] : 2;
$offset = ($page - 1) * 16; 

$sql = "SELECT * FROM movies ORDER BY id ASC LIMIT 16 OFFSET :offset";  
$stmt = $conn->prepare($sql);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM movies ORDER BY RAND() LIMIT 3";
$stmt = $conn->query($sql);
$randomMovies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineWatch | Movies</title>
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
            <a href="../pages/home.php">Up Comming</a>
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
  <h2 class="heading-title">Movies Page 2</h2>
</div>

<div class="movie-container">
  <?php if (!empty($movies)): ?>
    <?php foreach ($movies as $movie): ?>
      <div class="movie-card">
        <img class="poster" 
             src="<?php echo htmlspecialchars($movie['image'], ENT_QUOTES); ?>" 
             alt="<?php echo htmlspecialchars($movie['title'], ENT_QUOTES); ?> poster">
        
        <div class="movie-info">
          <h3 class="movie-title">
            <?php echo htmlspecialchars($movie['title'], ENT_QUOTES); ?>
          </h3>
          <p class="movie-description">
            <?php echo htmlspecialchars($movie['genre'], ENT_QUOTES); ?>
          </p>
        </div>
        <div class="movie-play">
          <a href="movie-page-open.php?movie=<?php echo urlencode($movie['title']); ?>" class="watch-btn">
            Watch
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p style="text-align: center;">No movies found in the database.</p>
  <?php endif; ?>
</div>

<div class="buttonat">
  <button id="prev" class="page">Prev</button>
  <button class="page page1">1</button>
  <button class="page page2 highlighted">2</button>
  <button class="page page3">3</button>
  <button id="next" class="page">Next</button>
</div>

<footer class="footer">
  <div class="footer-top">
    <div class="menut">
      <p>Menu</p>
      <a href="../pages/home.php">Trending</a>
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
    <h3>&#169 2025 CineWatch. All rights reserved</h3>
  </div>
</footer>

<script src="search.js"></script>

</body>
</html>
