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

if (!isset($_GET['show'])) {
    die("<p style='color:red;'>❌ TV Show title not provided in URL.</p>");
}

$showTitle = urldecode($_GET['show']); 

echo "<p>🔎 Searching for: " . htmlspecialchars($showTitle) . "</p>";

$showTitle = trim($showTitle);
$sql = "SELECT * FROM tv_shows WHERE title LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$showTitle%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("<p style='color:red;'>❌ No results found for: " . htmlspecialchars($showTitle) . "</p>");
} else {
    $show = $result->fetch_assoc();
    echo "<p style='color:green;'>✅ Show found: " . htmlspecialchars($show['title']) . "</p>";
}
?>
