<?php
session_start();
include('connection/dbconfig.php');

if(isset($_POST['login_button']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve hashed password from the database based on email
    $query = "SELECT studentID, firstname, lastname, email, password FROM student WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();

        // Verify the hashed password
        if(password_verify($password, $row['password']))
        {
            // Authentication successful
            $_SESSION['authentication'] = true;
            $_SESSION['auth_user'] = [
                'user_id' => $row['studentID'],
                'user_fullname' => $row['firstname'].' '.$row['lastname'],
                'user_email' => $row['email'],
            ];
        
   
            $_SESSION['message'] = "You are Logged In Successfully";
            header("Location: s-index.php");
            exit(0);
        }
    }

    
    // Authentication failed
    $_SESSION['message'] = "Invalid Email or Password";
    header("Location: s-login.php");
    exit(0);
}
?>
