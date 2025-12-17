<?php
// Simple logout endpoint — destroys session and redirects home
if (session_status() === PHP_SESSION_NONE) session_start();
// If POST only, check method to prevent accidental GET logout
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Optional: CSRF protection could be added here
    session_unset();
    session_destroy();
}
header('Location: /index.php');
exit;
