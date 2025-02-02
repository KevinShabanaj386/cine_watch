<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "cinewhatch";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "❌ Database connection failed"]));
}

if (!isset($_GET['movie']) || empty(trim($_GET['movie']))) {
    die(json_encode(["error" => "❌ Movie title not provided in URL."]));
}

$movieTitle = trim(urldecode($_GET['movie']));

$sql = "SELECT * FROM movies WHERE BINARY title = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $movieTitle);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $movie = $result->fetch_assoc();
} else {
    die(json_encode(["error" => "❌ Movie not found."]));
}

$castSql = "SELECT * FROM cast WHERE movie_id = ?";
$castStmt = $conn->prepare($castSql);
$castStmt->bind_param("i", $movie['id']);
$castStmt->execute();
$castResult = $castStmt->get_result();

$castMembers = [];
while ($cast = $castResult->fetch_assoc()) {
    $castMembers[] = $cast;
}

$stmt->close();
$castStmt->close();
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineWatch | <?= htmlspecialchars($movie['title']); ?></title>
    <link rel="stylesheet" href="../dist/css/header.css">
    <link rel="stylesheet" href="../dist/css/footer.css">
    <link rel="stylesheet" href="../dist/css/movie-page.css">
</head>
<body>

<header class="header">
    <div class="left-section">
        <img class="logo" src="../dist/images/logo.png" alt="logo">
    </div>
    <div class="middle-section-1">
        <ul class="navbar">
            <a href="../pages/home.php">Up Comming</a>
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
      <a href="../register.php" class="sign-in">
      <img src="../dist/images/icons/user-solid.svg" alt="Register" class="register-icon" />
      </a>
    </div>
</header>

<div class="heading">
    <h2 class="heading-title"><?= htmlspecialchars($movie['title']); ?></h2>
</div>

<div id="image-container" class="image-container">
    <img id="movie-image" src="<?= htmlspecialchars($movie['image']); ?>" alt="<?= htmlspecialchars($movie['title']); ?>">
    <button class="play-button" onclick="playMovie()">▶</button>
</div>

<div id="video-container" class="video-container">
    <video id="movie-player" controls>
        <source src="<?= htmlspecialchars($movie['file_path']); ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <button class="close-video" onclick="closeMovie()">✖</button>
</div>



<div class="container">

    <div class="description-cast-info">
        <div class="description-cast">
            <div class="movie-description">
                <p>Description</p>
                <p class="movie-text"><?= htmlspecialchars($movie['description']); ?></p>
            </div>

            <div class="movie-cast">
                <p>Cast</p>
                <div class="movie-cast-container">
                    <?php foreach ($castMembers as $cast): ?>
                        <div class="cast-item">
                            <img class="cast-photo" src="<?= htmlspecialchars($cast['photo']); ?>" alt="<?= htmlspecialchars($cast['name']); ?>">
                            <div class="emrat">
                                <p><?= htmlspecialchars($cast['name']); ?></p>
                                <p>(<?= htmlspecialchars($cast['role']); ?>)</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="movie-info">
            <div class="info-item">
                <p class="info-title">Release Date</p>
                <p class="info-content"><?= htmlspecialchars($movie['release_date']); ?></p>
            </div>
            <div class="info-item">
                <p class="info-title">Available Languages</p>
                <p class="info-content"><?= htmlspecialchars($movie['languages']); ?></p>
            </div>
            <div class="info-item">
                <p class="info-title">Ratings</p>
                <p class="info-content"><?= htmlspecialchars($movie['ratings']); ?></p>
            </div>
            <div class="info-item">
                <p class="info-title">Genre</p>
                <p class="info-content"><?= htmlspecialchars($movie['genre']); ?></p>
            </div>
        </div>
    </div>
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
        <h3>&#169; 2025 CineWatch. All rights reserved</h3>
    </div>
</footer>
<script src="search.js"></script>
<script src="../dist/js/movie-page.js" defer></script>
</body>
</html>