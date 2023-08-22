# My-First-PHP-Web-Application

This repository contains a project where I'm learning to implement user registration, login and profile functionality using PHP, PDO, and basic front-end technologies.

## User Registration

1. Created a registration form with fields for username, email, phone, and password.
2. Implemented client-side validation for the registration form using JavaScript.
3. Hashed and securely stored the password in the database using password hashing techniques.
4. Displayed a success message upon successful registration, along with a link to the login page.

## User Login and Profile Page
1. Designed a login form with fields for email and password.
2. Implemented client-side validation for the login form.
3. Set up a session upon successful login to maintain user authentication.
4. Created a profile page where users can view and update their information, including name, email, password, and phone number.

## Database Setup

To get started with this project, you'll need to set up the database configuration. Here's how:

1. **Create a Database**: Use your preferred database management tool to create a new database.
2. **Update Configuration**: Open the `config.php` file and update the following variables with your database credentials:

```php
$host = 'localhost'; // Your database host
$dbname = 'myprojectdb'; // Your database name
$username = 'yourusername'; // Your database username

