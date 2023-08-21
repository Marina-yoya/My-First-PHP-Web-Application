

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <script src="register.js"></script> 
</head>
<body>
    <h2>Registration</h2>
    <form action="index.php" method="post" onsubmit="return validateForm();">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="phone" placeholder="Phone" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>