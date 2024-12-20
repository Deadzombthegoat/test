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
    <title>Your Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
    <p>This is your profile page.</p>
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
