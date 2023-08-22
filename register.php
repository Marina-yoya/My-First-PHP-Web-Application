<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="register.js" defer></script> 
</head>
<body>
    <div class="register-form">
        <h2>Registration</h2>
        <form id="form" action="index.php" method="post" onsubmit="return validateForm();">
       
        <input type="text" name="username" placeholder="Username" required><br>
        <span id="username-error" class="error-message"></span> 
        
        <input type="email" name="email" placeholder="Email" required><br>
        <span id="email-error" class="error-message"></span> 
        
        <input type="text" name="phone" placeholder="Phone" required><br>
        <span id="phone-error" class="error-message"></span> 
        
        <input type="password" name="password" placeholder="Password" required><br>
        <span id="password-error" class="error-message"></span> 
        
        <button type="submit">Register</button>
    </form>
    </div>
</body>
</html>






