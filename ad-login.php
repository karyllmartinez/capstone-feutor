<?php
session_start();

include('php/ad-restrict.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

            <?php
                    // Your message code
                    if(isset($_SESSION['message']))
                    {
                        echo '<h4 class="alert alert-warning">'.$_SESSION['message'].'</h4>';
                        unset($_SESSION['message']);
                    } // Your message code
                ?>

                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Admin Login</h4>
                    </div>
                    <div class="card-body">

                        <form action="ad-logincode.php" method="POST">

                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" placeholder="Enter your Username">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="login_button" class="btn btn-primary">Login</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
