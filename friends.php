<?php
require 'config.php'; // Include the domain check
checkDomain(); // Check domain

if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login if not authenticated
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Friends</title>
</head>
<body>
    <h1>Your Friends</h1>
    <p>This is the friends page. List of friends would go here.</p>
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
