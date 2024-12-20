<?php
require 'config.php'; // Include the domain check
checkDomain(); // Check domain

// Fetch all client files from the client_files directory
$client_files = array_diff(scandir('client_files'), array('..', '.'));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Download Clients</title>
</head>
<body>
    <h1>Download Client Files</h1>
    <ul>
        <?php foreach ($client_files as $file): ?>
            <li>
                <a href="<?php echo 'client_files/' . htmlspecialchars($file); ?>">
                    Download <?php echo htmlspecialchars(pathinfo($file, PATHINFO_FILENAME)); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
