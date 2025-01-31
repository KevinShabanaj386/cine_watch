<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinewhatch";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get and sanitize movie ID from the request (ensure it's an integer)
$movie_id = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;

// If no valid movie ID, return an error message
if ($movie_id === 0) {
    echo json_encode(['error' => 'Invalid movie ID']);
    exit;
}

// Query the database to fetch the movie details
$sql_movie = "SELECT * FROM movies WHERE id = $movie_id";
$result_movie = mysqli_query($conn, $sql_movie);

// Check if movie is found
if (mysqli_num_rows($result_movie) > 0) {
    $movie = mysqli_fetch_assoc($result_movie);

    // Fetch cast information for this movie
    $sql_cast = "SELECT * FROM cast WHERE movie_id = $movie_id";
    $result_cast = mysqli_query($conn, $sql_cast);

    $cast = [];
    while ($row = mysqli_fetch_assoc($result_cast)) {
        $cast[] = $row;
    }

    // Prepare movie data to return as JSON
    $movie_data = [
        'title' => $movie['title'],
        'image' => $movie['image'],
        'description' => $movie['description'],
        'releaseDate' => $movie['releaseDate'],
        'languages' => $movie['languages'],
        'ratings' => $movie['ratings'],
        'genre' => $movie['genre'],
        'cast' => $cast
    ];

    // Return movie data as JSON
    echo json_encode($movie_data);
} else {
    // Return error message if movie not found
    echo json_encode(['error' => 'Movie not found']);
}

// Close connection
mysqli_close($conn);
?>
