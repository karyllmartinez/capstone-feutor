<?php
// Include database connection
include('connection/dbconfig.php');

// Include getsubjects.php
include('getsubjects.php');

// SQL query to fetch subjects
$sql = "SELECT * FROM subjects";
$result = $conn->query($sql);

// Display subjects in a table
if ($result->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead><tr><th>Subject Name</th><th>Category</th><th>Semester</th><th>Action</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['subject_name'] . '</td>';
        echo '<td>' . $row['category'] . '</td>';
        echo '<td>' . $row['semester'] . '</td>';
        echo '<td>';
        // Form for deleting subject
        echo '<form action="deletesubject.php" method="POST">';
        echo '<input type="hidden" name="subjectId" value="' . $row['id'] . '">';
        echo '<button type="submit" name="deleteSubject" class="btn btn-danger ml-2">Delete</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "No subjects found";
}

// Close connection
$conn->close();
?>