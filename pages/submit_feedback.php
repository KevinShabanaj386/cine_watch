<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$experience_rating = $_POST['experience_rating'];
$improvements = $_POST['improvements'];
$helpful = $_POST['helpful'];
$recommend = $_POST['recommend'];


$stmt = $conn->prepare("INSERT INTO feedback (experience_rating, improvements, helpful, recommend) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $experience_rating, $improvements, $helpful, $recommend);


if ($stmt->execute()) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}



$stmt->close();
$conn->close();
?>
