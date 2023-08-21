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

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password, phone) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$username, $email, $password, $phone ]);

    echo "Registration successful! <a href='login.php'>Login here</a>";
}


?>

