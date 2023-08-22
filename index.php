 <!-- <?php
$host = 'localhost';
$dbname = 'myfirstdatabase';
$username = 'root';


try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the database successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>    -->


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $db = new PDO("mysql:host=localhost;dbname=myfirstdatabase", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, email, password, phone) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$username, $email, $password, $phone ]);

    echo "Registration successful! <a href='login.php'>Login here</a>";
}



?>


