<?php

echo "db_connection.php included!<br>";


$dsn = "mysql:host=localhost;dbname=cineWhatch;charset=utf8mb4";
$db_user = "root";
$db_pass = "";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
 

$errors = [];
$success_message = "";

if (isset($_POST['submit'])) {

    $username    = trim($_POST['username'] ?? '');
    $email       = trim($_POST['email'] ?? '');
    $password    = trim($_POST['password'] ?? '');
    $confirmPass = trim($_POST['repeat_password'] ?? '');

    if (empty($username) || empty($email) || empty($password) || empty($confirmPass)) {
        $errors[] = "All fields are required.";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } 
    elseif ($password !== $confirmPass) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        try {
            $checkQuery = "SELECT * FROM users WHERE username = :username OR email = :email LIMIT 1";
            $checkStmt  = $pdo->prepare($checkQuery);
            $checkStmt->execute([
                ':username' => $username,
                ':email'    => $email
            ]);
            $existingUser = $checkStmt->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                if ($existingUser['username'] === $username) {
                    $errors[] = "Username already exists.";
                }
                if ($existingUser['email'] === $email) {
                    $errors[] = "Email already exists.";
                }
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $insertQuery = "INSERT INTO users (username, email, password) 
                                VALUES (:username, :email, :password)";
                $insertStmt  = $pdo->prepare($insertQuery);
                $insertStmt->execute([
                    ':username' => $username,
                    ':email'    => $email,
                    ':password' => $hashedPassword
                ]);

                $success_message = "Registration successful! You can now log in.";
            }
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
    <title>CineWhatch | Login Form</title>
    <link rel="stylesheet" href="/dist/css/login.css">
    <link rel="stylesheet" href="/dist/css/mobile.css">
    <link rel="stylesheet" href="/dist/css/register.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- Font Awesome and Google Fonts (Optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet">
</head>
<body>
    <div class="logo-wrapper">
        <img src="/dist/images/logo.png" class="logo" />
    </div>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <?php if (!empty($errors)): ?>
        <div style="color: red; text-align:center;">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($success_message)): ?>
        <div style="color: green; text-align:center;">
            <p><?php echo $success_message; ?></p>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="container" id="Signup"></div>

        <h3 class="register-title">Sign Up</h3>
        <div class="login-subtitle sing-up-subtitle">Just some details to get you in!</div>

        <label for="username"></label>
        <input 
            type="text" 
            name="username" 
            placeholder="Username" 
            id="username"
            value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
            required
        >

        <label for="email"></label>
        <input 
            type="email" 
            name="email" 
            placeholder="Email" 
            id="email"
            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
            required
        >

        <label for="password"></label>
        <input 
            type="password" 
            name="password" 
            placeholder="Password" 
            id="password"
            required
        >

        <label for="repeat_password"></label>
        <input 
            type="password" 
            name="repeat_password" 
            placeholder="Confirm Password" 
            id="repeat_password"
            required
        >

        <button type="submit" name="submit">Signup</button>

        <div class="or">
            <span>Or</span>
        </div>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i></div>
            <div class="fb"><i class="fab fa-facebook"></i></div>
            <div class="gh"><i class="fab fa-github"></i></div>
        </div>
        <div class="sign-up">
            Already Registered? <a href="/index.php">Login</a>
        </div>
    </form>

    <div class="text-section">
        <h1>We’re compatible.</h1>
        <p>Stream CineWatch from just about any phone,<br/>
           tablet, smart TV, gaming consoles or PC.
        </p>
        <div class="register-icons">
            <img class="icons" src="/dist/images/icons/apple.png" />
            <img class="icons" src="/dist/images/icons/android.png" />
            <img class="icons" src="/dist/images/icons/google.png" />
            <img class="icons" src="/dist/images/icons/roku.png" />
        </div>
    </div>
</body>
</html>
