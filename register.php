<?php
require 'config.php'; // Include the domain check
checkDomain(); // Check domain

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle registration logic
    // Here you should validate, hash passwords, and store users in a database.
    $_SESSION['user'] = $_POST['username']; // Dummy implementation for login after registration
    header('Location: index.php'); // Redirect to home
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <p><a href="login.php">Already have an account? Log in here.</a></p>
</body>
</html>
