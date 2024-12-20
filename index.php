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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Lunaeag Client Launcher 1.0</title>
</head>
<body>
    <div class="top-bar">
        <h1>Lunaeag 1.0</h1>
        <div class="auth-buttons">
            <?php if (isset($_SESSION['user'])): ?>
                <button class="auth-button" onclick="window.location.href='profile.php'">Profile</button>
                <button class="auth-button" onclick="window.location.href='friends.php'">Friends</button>
                <button class="auth-button" onclick="logout()">Logout</button>
            <?php else: ?>
                <button class="auth-button" onclick="window.location.href='login.php'">Login</button>
                <button class="auth-button" onclick="window.location.href='register.php'">Register</button>
            <?php endif; ?>
        </div>
    </div>

    <div class="sidebar left-sidebar">
        <img src="images/logo.png" alt="Logo" class="logo-image">
        <h2>Clients</h2>
        <div class="button-container">
            <button class="sidebar-button" onclick="window.location.href='news.html'">News</button>
            <button class="sidebar-button" onclick="window.location.href='community.html'">Community</button>
            <button class="sidebar-button" onclick="window.location.href='download.php'">Download</button>
        </div>
        <div class="footer-info">© 2023 Lunaeag</div>
    </div>

    <div class="launch-screen">
        <div class="logo">
            <img src="path/to/lunar-client-logo.png" alt="Lunar Client Logo">
        </div>

        <div class="client-selection">
            <label for="client-select">Select Client:</label>
            <select id="client-select" class="rounded-dropdown" onchange="toggleDropdownAnimation()">
                <option value="">--Select a Client--</option>
                <?php foreach ($client_files as $file): ?>
                    <option value="<?php echo htmlspecialchars(pathinfo($file, PATHINFO_FILENAME)); ?>">
                        <?php echo htmlspecialchars(pathinfo($file, PATHINFO_FILENAME)); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button class="play-button" onclick="startGame()">Play</button>
    </div>

    <div class="sidebar right-sidebar"></div>
    <div class="sidebar bottom-sidebar"></div>

    <div class="bottom-bar"></div>

    <script>
        function startGame() {
            const selectedClient = document.getElementById('client-select').value;

            if (selectedClient) {
                alert('Please do not close this tab. The client will open in another tab.');
                window.open('client_files/' + selectedClient + '.html', '_blank'); // Open in a new tab with hidden file extension
            } else {
                alert('Please select a client to play!');
            }
        }

        function toggleDropdownAnimation() {
            const dropdown = document.getElementById('client-select');
            dropdown.classList.add('slide-down');

            setTimeout(() => {
                dropdown.classList.remove('slide-down');
            }, 300); // Duration of slide-down effect
        }

        function logout() {
            window.location.href = 'logout.php'; // Redirect to logout
        }
    </script>
</body>
</html>
