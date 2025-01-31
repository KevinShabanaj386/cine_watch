<?php
header("Content-Type: application/json");

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "cinewhatch";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

mysqli_set_charset($conn, "utf8mb4"); // Fix encoding issues

if (isset($_GET["movie"])) {
    $movieTitle = urldecode($_GET["movie"]); // Decode URL-encoded movie title

    // Fetch Movie Details
    $stmt = $conn->prepare("SELECT * FROM movies WHERE TRIM(title) = ?");
    $stmt->bind_param("s", $movieTitle);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $movie = $result->fetch_assoc();

        // Fetch Cast Details
        $stmt = $conn->prepare("SELECT name, role, photo FROM cast WHERE movie_id = ?");
        $stmt->bind_param("i", $movie["id"]);
        $stmt->execute();
        $castResult = $stmt->get_result();

        $movie["cast"] = [];
        while ($row = $castResult->fetch_assoc()) {
            $row["photo"] = "../cine_watch" . $row["photo"]; // Fix relative path issue
            $movie["cast"][] = $row;
        }

        echo json_encode($movie, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(["error" => "Movie not found"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "No movie parameter provided"]);
}

$conn->close();
?>
