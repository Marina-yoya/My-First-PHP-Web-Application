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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPhone = $_POST['phone'];

    $query = "UPDATE users SET username = ?, email = ?, phone = ? WHERE user_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$newUsername, $newEmail, $newPhone, $user_id]);

   
    header("Location: profile.php");
    exit();
}
?>
