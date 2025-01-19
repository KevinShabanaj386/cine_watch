<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (leave empty)
$dbname = "feedback_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$experience_rating = $_POST['experience_rating'];
$improvements = $_POST['improvements'];
$helpful = $_POST['helpful'];
$recommend = $_POST['recommend'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedback (experience_rating, improvements, helpful, recommend) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $experience_rating, $improvements, $helpful, $recommend);

// Execute the statement
if ($stmt->execute()) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
