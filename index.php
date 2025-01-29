<?php
session_start(); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "db_connection.php included!<br>"; 
$dsn = "mysql:host=localhost;dbname=cineWhatch;charset=utf8mb4";
$db_user = "root";
$db_pass = "";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$errors = [];
$success = "";

if (isset($_POST['submit'])) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $errors[] = "Username and Password are required.";
    } else {
        try {
            $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
            $stmt  = $pdo->prepare($query);
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                $errors[] = "Username not found.";
            } else {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id']   = $user['id'];
                    $_SESSION['username']  = $user['username'];

                     
                         header("Location: /pages/home.html");
                 } else {
                     $errors[] = "Invalid password.";
                }
            }
        } catch (PDOException $e) {
            $errors[] = "DB Error: " . $e->getMessage();
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
    <link rel="stylesheet" href="/dist/css/login.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
</head>
<body>
    <div class="logo-wrapper">
        <img src="../dist/images/logo.png" class="logo"/>
    </div>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Login Form -->
    <form method="POST" action="">
        <h3>Login</h3>
        <div class="login-subtitle">Glad you're back!</div>

        <label for="username"></label>
        <input type="text"
               name="username" 
               placeholder="Username"
               id="username"
               value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
               required
        />

        <label for="password"></label>
        <input type="password"
               name="password"
               placeholder="Password" 
               id="password"
               required
        />

        <div class="remember-me">
            <input type="checkbox" id="rememberMe">
            <label for="rememberMe">Remember me</label>
        </div>

        <button type="submit" name="submit">Login</button>

        <?php if (!empty($errors)): ?>
        <div class="error-box" style="margin-top: 2rem; color: tomato; text-align:center;">
            <?php foreach ($errors as $error): ?>
               <p style="background:#e74c3c; border-radius: 8px; padding: 1rem;">
                <?php echo $error; ?>
            </p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

        <div class="forgot-password">
            <a href="#">Forgot password?</a>
        </div>

        <div class="or">
            <span>Or</span>
        </div>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i></div>
            <div class="fb"><i class="fab fa-facebook"></i></div>
            <div class="gh"><i class="fab fa-github"></i></div>
        </div>
        <div class="sign-up">
            Don't have an account?
            <a href="/register.html"><br> Sign up</a>
        </div>
    </form>

    <div class="text-section">
        <h1>Let the streaming begin</h1>
        <p>Watch thousands of free movies and TV shows,<br>
           as well as stream your own personal collection of movies,
        </p>
        <p>TV episodes, music, and podcasts!</p>
    </div>

    <!-- Load Javascript -->
</body>
</html>
