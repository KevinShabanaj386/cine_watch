<?php
session_start();
// Check if the user is logged in, store username or null
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
} else {
  $username = null;
}

// Connect to the database
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

// Fetch all movies from the database
$sql = "SELECT * FROM movies ORDER BY id ASC";
$stmt = $conn->query($sql);
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

<!-- Static slideshow (unchanged) -->
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

<!-- Dynamic movie container -->
<div class="heading">
  <h2 class="heading-title">Movies</h2>
</div>

<div class="movie-container">
  <?php if (!empty($movies)): ?>
    <?php foreach ($movies as $movie): ?>
      <div class="movie-card">
        <!-- Here $movie['image'] should be a path like "../dist/images/movies/posterX.jpg" -->
        <img class="poster" 
             src="<?php echo htmlspecialchars($movie['image'], ENT_QUOTES); ?>" 
             alt="<?php echo htmlspecialchars($movie['title'], ENT_QUOTES); ?> poster">
        
        <div class="movie-info">
          <h3 class="movie-title">
            <?php echo htmlspecialchars($movie['title'], ENT_QUOTES); ?>
          </h3>
          <p class="movie-description">
            <!-- Using genre here as a short "description" for the card -->
            <?php echo htmlspecialchars($movie['genre'], ENT_QUOTES); ?>
          </p>
        </div>
        <div class="movie-play">
          <!-- Send the title (or id) as a GET param to open a details page -->
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

<!-- Static pagination buttons (optional) -->
<div class="buttonat">
  <button id="prev" class="page">Prev</button>
  <button class="page page1">1</button>
  <button class="page page2">2</button>
  <button class="page page3">3</button>
  <button id="next" class="page">Next</button>
</div>

<!-- Footer (unchanged) -->
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
    <h3>&#169; 2025 CineWatch. All rights reserved</h3>
  </div>
</footer>

</body>
</html>
