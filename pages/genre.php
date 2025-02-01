<?php
session_start();
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
}else{
  $username = null;
}

$genre = isset($_GET['name']) ? $_GET['name'] : '';

$movies = [
    ["title" => "Kraven the Hunter", "genre" => "Action", "image" => "../dist/images/movies/poster1.jpg"],
    ["title" => "Red One", "genre" => "Action", "image" => "../dist/images/movies/poster2.jpg"],
    ["title" => "Elevation", "genre" => "Thriller", "image" => "../dist/images/movies/poster3.jpg"],
    ["title" => "Carry-On", "genre" => "Thriller", "image" => "../dist/images/movies/poster4.jpg"],
    ["title" => "Sonic the Hedgehog", "genre" => "Comedy", "image" => "../dist/images/movies/poster5.jpg"],
    ["title" => "GoodFellas", "genre" => "Crime", "image" => "../dist/images/movies/poster6.jpg"],
    ["title" => "The Dark Knight", "genre" => "Drama", "image" => "../dist/images/movies/poster7.jpg"],
    ["title" => "Forrest Gump", "genre" => "Comedy", "image" => "../dist/images/movies/poster8.jpg"],
    ["title" => "Fight Club", "genre" => "Drama", "image" => "../dist/images/movies/poster9.jpg"],
    ["title" => "Inception", "genre" => "Action", "image" => "../dist/images/movies/poster11.jpg"],
    ["title" => "The Break-Up", "genre" => "Romance", "image" => "../dist/images/movies/poster41.jpg"],
];

$tvShows = [
    ["title" => "Breaking Bad", "genre" => "Drama", "image" => "../dist/images/show-play/2.jpg"],
    ["title" => "Stranger Things", "genre" => "Science Fiction", "image" => "../dist/images/show-play/img7.jpg"],
    ["title" => "The Crown", "genre" => "Drama", "image" => "../dist/images/show-play/img11.jpg"],
    ["title" => "The Witcher", "genre" => "Adventure", "image" => "../dist/images/show-play/img14.jpg"],
    ["title" => "The Mandalorian", "genre" => "Science Fiction", "image" => "../dist/images/show-play/img20.jpg"],
    ["title" => "The Office", "genre" => "Comedy", "image" => "../dist/images/show-play/img4.jpg"],
    ["title" => "Game of Thrones", "genre" => "Fantasy", "image" => "../dist/images/show-play/img11.jpg"],
    ["title" => "Friends", "genre" => "Comedy", "image" => "../dist/images/show-play/img15.jpg"],
    ["title" => "Rick and Morty", "genre" => "Comedy", "image" => "../dist/images/show-play/img1.jpg"],
];

$filteredMovies = array_filter($movies, function($movie) use ($genre) {
    return $movie["genre"] === $genre;
});

$filteredTVShows = array_filter($tvShows, function($show) use ($genre) {
    return $show["genre"] === $genre;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineWatch | <?php echo htmlspecialchars($genre); ?> Movies & TV Shows</title>
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
                <a href="#" class="home-active" class="dropbtn">Genre</a>
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
  <h2 class="heading-title"><?php echo htmlspecialchars($genre); ?> Movies & TV Shows</h2>
</div>

<div class="movie-container">
  <?php if (empty($filteredMovies) && empty($filteredTVShows)): ?>
      <p>No movies or TV shows found in this genre.</p>
  <?php else: ?>
      <?php foreach ($filteredMovies as $movie): ?>
          <div class="movie-card">
              <img class="poster" src="<?php echo $movie['image']; ?>" alt="poster">
              <div class="movie-info">
                  <h3 class="movie-title"><?php echo $movie['title']; ?></h3>
                  <p class="movie-description"><?php echo $movie['genre']; ?></p>
              </div>
              <div class="movie-play">
                  <a href="movie-page-open.php?movie=<?php echo urlencode($movie['title']); ?>" class="watch-btn">Watch</a>
              </div>
          </div>
      <?php endforeach; ?>

      <?php foreach ($filteredTVShows as $show): ?>
          <div class="movie-card">
              <img class="poster" src="<?php echo $show['image']; ?>" alt="poster">
              <div class="movie-info">
                  <h3 class="movie-title"><?php echo $show['title']; ?></h3>
                  <p class="movie-description"><?php echo $show['genre']; ?></p>
              </div>
              <div class="movie-play">
                  <a class="watch-link" href="../pages/show-page.php?show=<?php echo urlencode($show['title']); ?>" id="watchLink">Watch Now</a>
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
