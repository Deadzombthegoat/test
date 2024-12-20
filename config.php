<?php
session_start(); // Start PHP session
require 'vendor/autoload.php'; // If you're using Composer for .env file

// Load .env values
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function checkDomain() {
    $allowedDomain = $_ENV['APP_DOMAIN'];
    if ($_SERVER['HTTP_HOST'] !== parse_url($allowedDomain, PHP_URL_HOST)) {
        die("Access Denied: Your current domain is not allowed.");
    }
}
