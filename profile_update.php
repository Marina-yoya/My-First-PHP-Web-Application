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
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];

    $query = "SELECT password FROM users WHERE user_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($currentPassword, $user['password'])) {

        $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $query = "UPDATE users SET username = ?, email = ?, phone = ?, password = ? WHERE user_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$newUsername, $newEmail, $newPhone, $hashedNewPassword, $user_id]);

        header("Location: profile.php");
        exit();
    } else {
        $_SESSION['password_change_error'] = "Invalid current password.";
        header("Location: profile.php");
        exit();
    }

    // $query = "UPDATE users SET username = ?, email = ?, phone = ? WHERE user_id = ?";
    // $stmt = $db->prepare($query);
    // $stmt->execute([$newUsername, $newEmail, $newPhone, $user_id]);
    // header("Location: profile.php");
    // exit();
}
?>