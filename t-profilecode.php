<?php
session_start();

$message = '';


$uploadFileDir = 'img/';
if (!file_exists($uploadFileDir)) {
    mkdir($uploadFileDir, 0777, true);
}

if (isset($_POST['register_btn'])) {
    // Handle profile picture upload
    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
        // Uploaded file details
        $fileTmpPath = $_FILES['profilePicture']['tmp_name'];
        $fileName = $_FILES['profilePicture']['name'];
        $fileSize = $_FILES['profilePicture']['size'];
        $fileType = $_FILES['profilePicture']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        // File extensions allowed
        $allowedfileExtensions = array('jpg', 'jpeg', 'png');
        
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directory where file will be moved
            $uploadFileDir = 'img/';
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Insert data into database
                include('connection/dbconfig.php'); // Include your database connection file
                
                // Process other form data
                $fullname = $_POST['fullName'];
                $subject = implode(',', $_POST['subjectExpertise']);
                $degreeProgram = $_POST['degreeProgram'];
                $availDayandTime = $_POST['availDayandTime'];
                $teachingMode = $_POST['teachingMode'];
                $ratePerHour = $_POST['ratePerHour'];
                $bio = $_POST['bio'];

                // Assuming tutorID is obtained from the session or elsewhere
                $tutorID = $_SESSION['tutorID']; // Adjust this accordingly
                
                // Insert data into database
                $sql = "INSERT INTO tutorProfile (profileImage, tutorID, fullName, subjectExpertise, degreeProgram, availableDaysTime, teachingMode, ratePerHour, bio) 
                        VALUES ('$dest_path', '$tutorID', '$fullname', '$subject', '$degreeProgram', '$availDayandTime', '$teachingMode', '$ratePerHour', '$bio')";

                if ($conn->query($sql) === TRUE) {
                    $message = "New record created successfully";
                } else {
                    $message = "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $message = 'An error occurred while uploading the file to the destination directory.';
            }
        } else {
            $message = 'Upload failed as the file type is not acceptable. The allowed file types are: ' . implode(',', $allowedfileExtensions);
        }
    } else {
        $message = 'Error occurred while uploading the file.';
    }
}

$_SESSION['message'] = $message;
header("Location: t-profile.php");
?>
