<?php
// Start session
session_start();

// Redirect to login page if the tutor user is not authenticated
if(!isset($_SESSION['tutorauthentication']) || $_SESSION['tutorauthentication'] !== true) {
    header("Location: t-login.php");
    exit();
} else if(isset($_SESSION['authentication']) && $_SESSION['authentication'] === true) {
    header("Location: s-index.php");
    exit();
} 

// Set tutor first name for use in the t-index.php page
$tutor_firstname = isset($_SESSION['auth_tutor']['tutor_fullname']) ? $_SESSION['auth_tutor']['tutor_fullname'] : '';
?>
