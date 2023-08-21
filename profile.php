 <?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$host = 'localhost';
$dbname = 'myfirstdatabase';
$username = 'root';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT username, email, phone FROM users WHERE user_id = ?";
$stmt = $db->prepare($query);
$stmt->execute([$user_id]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="profile-container">
        <h1>Welcome to Your Profile</h1>
        <form class="profile-form" action="profile_update.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input class="user" type="text" name="username" value="<?php echo $user['username']; ?>">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="email" type="email" name="email" value="<?php echo $user['email']; ?>">
            </div>
            
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input class="phone" type="text" name="phone" value="<?php echo $user['phone']; ?>">
            </div>
            
            <button class="update-button" type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
