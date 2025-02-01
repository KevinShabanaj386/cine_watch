<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cinewhatch";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

if (!isset($_GET['show'])) {
    die("TV Show title not provided in URL.");
}

$showTitle = urldecode($_GET['show']);
$showTitle = str_replace(' ', '', $showTitle);

$sql = "SELECT * FROM tv_shows WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(title, ' ', ''), ':', ''), '-', ''), '·', ''), '.', '') LIKE ?";
$stmt = $conn->prepare($sql);
$searchTitle = "%" . $showTitle . "%";
$stmt->bind_param("s", $searchTitle);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $show = $result->fetch_assoc();
} else {
    die("❌ TV Show not found.");
}

$castSql = "SELECT * FROM cast_tv_show WHERE tv_show_id = ?";
$castStmt = $conn->prepare($castSql);
$castStmt->bind_param("i", $show['id']);
$castStmt->execute();
$castResult = $castStmt->get_result();

$castMembers = [];
while ($cast = $castResult->fetch_assoc()) {
    $castMembers[] = $cast;
}

$seasonsSql = "SELECT * FROM seasons WHERE tv_show_id = ?";
$seasonsStmt = $conn->prepare($seasonsSql);
$seasonsStmt->bind_param("i", $show['id']);
$seasonsStmt->execute();
$seasonsResult = $seasonsStmt->get_result();

$seasons = [];
while ($season = $seasonsResult->fetch_assoc()) {
    $seasons[] = $season;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineWatch | <?= htmlspecialchars($show['title']); ?></title>
    <script defer src="../dist/js/show-page.js"></script>
    <link rel="stylesheet" href="../dist/css/header.css">
    <link rel="stylesheet" href="../dist/css/footer.css">
    <link rel="stylesheet" href="../dist/css/show-page.css">
</head>
<body>
<header class="header">
    <div class="left-section">
        <img class="logo" src="../dist/images/logo.png" alt="logo">
    </div>
    <div class="middle-section-1">
        <ul class="navbar">
            <a href="../pages/home.php">Trending</a>
            <a href="../pages/movie.php">Movies</a>
            <a href="../pages/shows.php">TV Series</a>
            <div class="dropdownn">
                <a href="#" class="dropbtnn">Genre</a>
                <div class="dropdownn-content">
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
    <div class="middle-section-2">
        <input type="text" class="search-input" placeholder="| Search">
    </div>
    <div class="right-section">
      <a class="sign-in" href="../register.php">Register</a>
    </div>
</header>

<div class="heading">
    <h2 class="heading-title" id="show-title"><?= htmlspecialchars($show['title']); ?></h2>
</div>

<div class="image-container">
    <img src="<?= htmlspecialchars($show['image']); ?>" alt="<?= htmlspecialchars($show['title']); ?>" id="show-image">
</div>

<div class="container">
    <div class="description-cast">
        <div class="season-selector">
            <label for="season">Select Season:</label>
            <select id="season" class="dropdown" onchange="showEpisodes(this.value)">
                <option value="">Select a Season</option>
                <?php foreach ($seasons as $season): ?>
                    <option value="<?= $season['season_number']; ?>" data-episodes="<?= $season['episode_count']; ?>">
                        Season <?= $season['season_number']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div id="episode-container" class="episode-container"></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="description-cast-info">
        <div class="description-cast">
            <div class="movie-description">
                <p>Description</p>
                <p class="movie-text"><?= !empty($show['description']) ? htmlspecialchars($show['description']) : 'No description available.'; ?></p>
            </div>

            <div class="movie-cast">
                <p>Cast</p>
                <div class="movie-cast-container">
                    <?php if (!empty($castMembers)): ?>
                        <?php foreach ($castMembers as $cast): ?>
                            <div class="cast-item">
                                <img class="cast-photo" src="<?= !empty($cast['photo']) ? htmlspecialchars($cast['photo']) : 'default_cast_image.jpg'; ?>" alt="<?= htmlspecialchars($cast['name']); ?>">
                                <div class="emrat">
                                    <p><?= htmlspecialchars($cast['name']); ?></p>
                                    <p>(<?= htmlspecialchars($cast['role']); ?>)</p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No cast information available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="movie-info">
            <div class="info-item">
                <p class="info-title">Release Date</p>
                <p class="info-content"><?= !empty($show['release_date']) && $show['release_date'] != '0000-00-00' ? htmlspecialchars($show['release_date']) : 'Release date not available.'; ?></p>
            </div>
            <div class="info-item">
                <p class="info-title">Available Languages</p>
                <p class="info-content"><?= !empty($show['languages']) ? htmlspecialchars($show['languages']) : 'Languages not specified.'; ?></p>
            </div>
            <div class="info-item">
                <p class="info-title">Ratings</p>
                <p class="info-content"><?= !empty($show['ratings']) ? htmlspecialchars($show['ratings']) : 'Ratings not available.'; ?></p>
            </div>
            <div class="info-item">
                <p class="info-title">Genre</p>
                <p class="info-content"><?= !empty($show['genre']) ? htmlspecialchars($show['genre']) : 'Genre not specified.'; ?></p>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="footer-top">
        <div class="menut">
            <p>Menu</p>
            <a href="/pages/home.php">Trending</a>
            <a href="/pages/movie.php">Movies</a>
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
</body>
</html>
