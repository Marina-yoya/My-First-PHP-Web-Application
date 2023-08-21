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
</head>
<body>
    <h1>Welcome to Your Profile</h1>
    <form action="profile_update.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>"><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>"><br>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $user['phone']; ?>"><br>
        
        <button type="submit">Update Profile</button>
    </form>
</body>
</html>
