<?php
session_start();

// Redirect to login page if the user is not authenticated
if(!isset($_SESSION['admin_authenticated']) || $_SESSION['admin_authenticated'] !== true) {
    header("Location: ad-login.php");
    exit();
}

$username = isset($_SESSION['auth_admin']['username']) ? $_SESSION['auth_admin']['username'] : '';

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="tutormanagement.php">Tutor Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="subjectmanagement.php">Subject Management</a>
                </li>
            </ul>
        </div>
        <a href="ad-logout.php">Logout</a>
    </nav>

    <div class="container mt-3">
        <h2>Pending Student Tutors</h2>
    

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>

    <script src="disableBackButton.js"></script>

    </body>
    </html>