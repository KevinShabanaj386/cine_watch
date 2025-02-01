<?php
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$password = "";
$dbname = "cinewhatch";  

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}
if (!isset($_GET['movie'])) {
    die("<p style='color:red;'>❌ Movie title not provided in URL.</p>");
}

$movieTitle = urldecode($_GET['movie']); 

echo "<p>🔎 Searching for: " . htmlspecialchars($movieTitle) . "</p>";

$movieTitle = trim($movieTitle);
$sql = "SELECT * FROM movies WHERE title LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$movieTitle%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("<p style='color:red;'>❌ No results found for: " . htmlspecialchars($movieTitle) . "</p>");
} else {
    $movie = $result->fetch_assoc();
    echo "<p style='color:green;'>✅ Movie found: " . htmlspecialchars($movie['title']) . "</p>";
}
?>

