<?php 

session_start();

// Redirect to dashboard if admin is already authenticated
if(isset($_SESSION['admin_authenticated']) && $_SESSION['admin_authenticated'] === true) {
    header("Location: ad-index.php");
    exit(0);
}  elseif(isset($_SESSION['tutorauthentication']) && $_SESSION['tutorauthentication'] === true) {
    header("Location: t-index.php");
    exit();
} elseif(isset($_SESSION['authentication']) && $_SESSION['authentication'] === true) {
    header("Location: s-index.php");
    exit();
}  

?>