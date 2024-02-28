<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tutor Registration</title>
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
                        <h4>Tutor Registration</h4>
                    </div>
                    <div class="card-body">

                        <form action="t-registercode.php" method="POST">

                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="firstname" required placeholder="Enter First Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lastname" required placeholder="Enter Last Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email Address</label>
                                <input type="email" name="email" required placeholder="Enter Email Address" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Degree Program</label>
                                <input type="text" name="degree" required placeholder="Enter Degree Program" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Year</label>
                                <input type="text" name="year" required placeholder="Enter Year" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <label>Subject Expertise</label>
                                <select name="subject" required class="form-control">
                                    <option value="">Select Subject Expertise</option>
                                    <?php
                                        // Include database connection
                                        include('connection/dbconfig.php');

                                        // SQL query to fetch subjects
                                        $sql = "SELECT * FROM subjects";
                                        $result = $conn->query($sql);

                                        // Display subjects as options
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['subject_name'] . '">' . $row['subject_name'] . '</option>';
                                        }

                                        // Close connection
                                        $conn->close();
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>G-drive Link</label>
                                <input type="text" name="g_drive_link" required placeholder="Enter G-drive Link" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" required placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" required placeholder="Confirm Password" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                            </div>

                            <div class="mb-3">
                                <p class="text-center"><a href="land.php">I don't want to sign up</a></p>
                            </div>

                            <div class="mb-3">
                                <p>Already have an account? <a href="s-login.php">Login here</a></p>
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
