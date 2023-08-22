<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="login.js" defer></script>
</head>

<body>
    <div class="login-form">
        <h2>Login</h2>
        <form id="form" action="login_auth.php" method="post" onsubmit="return validateForm();">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required><br>
            <span id="email-error" class="error-message"></span>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required><br>
            <span id="password-error" class="error-message"></span>
            <?php
            if (isset($_SESSION['login_error'])) {
                $error_message = $_SESSION['login_error'];
                unset($_SESSION['login_error']);
                echo "<p class='error-message'>$error_message</p>";
            }
            ?>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>