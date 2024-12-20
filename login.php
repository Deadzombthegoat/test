<?php
require 'config.php'; // Include the domain check
checkDomain(); // Check domain

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dummy authentication logic
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example users (in practice, hash passwords and check against a database!)
    $valid_users = [
        'user' => 'password123'
    ];

    if (array_key_exists($username, $valid_users) && $valid_users[$username] === $password) {
        $_SESSION['user'] = $username; // Set session variable
        header('Location: index.php'); // Redirect to home
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <p><a href="register.php">Don't have an account? Register here.</a></p>
</body>
</html>
