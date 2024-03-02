<?php
session_start();
include ('php/t-restrict.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tutor Login</title>
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
                        <h4>Tutor Login</h4>
                    </div>
                    <div class="card-body">

                        <form action="t-logincode.php" method="POST">

                            <div class="mb-3">
                                <label>Email ID</label>
                                <input type="text" name="email" placeholder="Enter your Email">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="login_button" class="btn btn-primary">Login</button>
                            </div>

                        </form>

                        <p class="text-center">Don't have an account? <a href="t-registration.php">Signup here</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>