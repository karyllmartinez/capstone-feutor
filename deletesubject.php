<?php
// Include database connection
include('connection/dbconfig.php');

// Check if delete form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteSubject'])) {
    // Get the subject ID from the form submission
    $subjectId = $_POST['subjectId'];

    // SQL query to delete subject from database
    $deleteSql = "DELETE FROM subjects WHERE id = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("i", $subjectId);

    // Execute the deletion statement
    if ($deleteStmt->execute()) {
        // Subject deleted successfully
        $_SESSION['deletemessage'] = "Subject deleted successfully";
    } else {
        // Error occurred while deleting subject
        $_SESSION['deletemessage'] = "Error: Unable to delete subject";
    }

    // Close deletion statement
    $deleteStmt->close();
}

// Close connection
$conn->close();
?>
