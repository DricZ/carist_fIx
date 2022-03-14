<?php
session_start();
// Remove all session variables
session_unset();

// Destroy the session
session_destroy();

// Back to Login Page
header("Location: ./login.php");
?>