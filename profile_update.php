<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
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

        $_SESSION['profile_update_success'] = "Profile updated successfully!";
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