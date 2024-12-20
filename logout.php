<?php
require 'config.php'; // Include the domain check
checkDomain(); // Check domain

session_start();
session_destroy();
header('Location: index.php'); // Redirect to home
exit();
?>
