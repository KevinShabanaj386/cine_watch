<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "cinewhatch";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}

$searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($searchQuery)) {
    die("<p>❌ Please enter a search term.</p>");
}

$searchQuery = "%{$searchQuery}%"; 

$moviesQuery = "SELECT DISTINCT title, image, genre FROM movies WHERE title LIKE ?";
$moviesStmt = $conn->prepare($moviesQuery);
$moviesStmt->bind_param("s", $searchQuery);
$moviesStmt->execute();
$moviesResult = $moviesStmt->get_result();

$tvShowsQuery = "SELECT DISTINCT title, image, genre FROM tv_shows WHERE title LIKE ?";
$tvShowsStmt = $conn->prepare($tvShowsQuery);
$tvShowsStmt->bind_param("s", $searchQuery);
$tvShowsStmt->execute();
$tvShowsResult = $tvShowsStmt->get_result();


$movies = $moviesResult->fetch_all(MYSQLI_ASSOC);
$tvShows = $tvShowsResult->fetch_all(MYSQLI_ASSOC);

$moviesStmt->close();
$tvShowsStmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results for "<?php echo htmlspecialchars($_GET['query']); ?>"</title>
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
    <h2 class="heading-title">Search Results for "<?php echo htmlspecialchars($_GET['query']); ?>"</h2>
</div>

<div class="movie-container">
    <?php if (empty($movies) && empty($tvShows)): ?>
        <p>No movies or TV shows found for "<?php echo htmlspecialchars($_GET['query']); ?>".</p>
    <?php else: ?>
        <?php foreach ($movies as $movie): ?>
            <div class="movie-card">
                <img class="poster" src="<?php echo $movie['image']; ?>" alt="poster">
                <div class="movie-info">
                    <h3 class="movie-title"><?php echo htmlspecialchars($movie['title']); ?></h3>
                    <p class="movie-description"><?php echo htmlspecialchars($movie['genre']); ?></p>
                </div>
                <div class="movie-play">
                    <a href="movie-page-open.php?movie=<?php echo urlencode($movie['title']); ?>" class="watch-btn">Watch</a>
                </div>
            </div>
        <?php endforeach; ?>

        <?php foreach ($tvShows as $show): ?>
            <div class="movie-card">
                <img class="poster" src="<?php echo $show['image']; ?>" alt="poster">
                <div class="movie-info">
                    <h3 class="movie-title"><?php echo htmlspecialchars($show['title']); ?></h3>
                    <p class="movie-description"><?php echo htmlspecialchars($show['genre']); ?></p>
                </div>
                <div class="movie-play">
                    <a href="../pages/show-page.php?show=<?php echo urlencode($show['title']); ?>" class="watch-btn">Watch</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
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
