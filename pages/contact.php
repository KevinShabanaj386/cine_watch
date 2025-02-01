<?php
// Database Connection
$dsn = "mysql:host=localhost;dbname=cineWatch;charset=utf8mb4";
$db_user = "root";
$db_pass = "";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle Form Submission
$errors = [];
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $errors[] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':subject' => $subject,
                ':message' => $message
            ]);

            $success_message = "Thank you! Your message has been received.";
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineWatch | Contact Us</title>
    <link rel="stylesheet" href="/dist/css/contact.css">
</head>
<body>
    <div class="logo-wrapper">
        <img src="/dist/images/logo.png" class="logo" />
    </div>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Display Errors or Success Messages -->
    <?php if (!empty($errors)): ?>
        <div style="color: red; text-align:center;">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($success_message)): ?>
        <div style="color: green; text-align:center;">
            <p><?= htmlspecialchars($success_message); ?></p>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="container">
            <h3 class="contact-title">Contact Us</h3>
            <p class="contact-subtitle">We'd love to hear from you!</p>

            <label for="name"></label>
            <input 
                type="text" 
                name="name" 
                placeholder="Your Name" 
                id="name"
                value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                required
            >

            <label for="email"></label>
            <input 
                type="email" 
                name="email" 
                placeholder="Your Email" 
                id="email"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                required
            >

            <label for="subject"></label>
            <input 
                type="text" 
                name="subject" 
                placeholder="Subject" 
                id="subject"
                value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>"
                required
            >

            <label for="message"></label>
            <textarea 
                name="message" 
                placeholder="Your Message" 
                id="message"
                required
            ><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>

            <button type="submit">Send Message</button>
        </div>
    </form>

    <div class="text-section">
        <h1>Let's Talk!</h1>
        <p>Reach out to us for any queries, support, or suggestions.<br/>
           We’ll get back to you as soon as possible.
        </p>
    </div>
</body>
</html>
