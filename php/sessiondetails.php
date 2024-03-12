<?php
// Check if the session ID is provided in the URL
if (isset($_GET['sessionID'])) {
    // Get the session ID from the URL
    $sessionID = $_GET['sessionID'];
    // Retrieve logged-in tutor's tutorID
    $tutorID = $_SESSION['auth_tutor']['tutor_id'];
    // Prepare and execute a query to fetch session details
    $sql = "SELECT s.*, DATE_FORMAT(s.sessionDate, '%M %e, %Y') AS formattedSessionDate, TIME_FORMAT(s.startTime, '%h:%i %p') AS formattedStartTime, TIME_FORMAT(s.endTime, '%h:%i %p') AS formattedEndTime, CONCAT(st.firstname, ' ', st.lastname) AS studentName, st.degreeProgram, st.year, t.ratePerHour 
    FROM session s 
    INNER JOIN student st ON s.studentID = st.studentID 
    INNER JOIN tutor t ON s.tutorID = t.tutorID
    WHERE s.sessionID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sessionID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch session details
        $session = $result->fetch_assoc();
        $totalCost = $session['duration'] * $session['ratePerHour'];

        // Display session details
        echo "<div class='container'>";
        echo "<h1>Session Details</h1>";
        echo "<p>Student: " . $session['studentName'] . "</p>";
        echo "<p>Degree Program: " . $session['degreeProgram'] . "</p>";
        echo "<p>Year: " . $session['year'] . "</p>";
        echo "<p>Session Date & Time: "   . $session["formattedSessionDate"] .  "  ". "<strong>|</strong>" . "  " .   $session["formattedStartTime"] ." - ".   $session["formattedEndTime"] ."</p>";
        echo "<p>Duration: " . $session['duration'] . " hours</p>";
        echo "<p>Subject: " . $session['subject'] . "</p>";
        echo "<p>Teaching Mode: " . $session['teachingMode'] . "</p>";
        echo "<p>Need: " . $session['need'] . "</p>";
        echo "<p>Status: " . $session['status'] . "</p>";
        echo "<p>Duration: " . (int)$session['duration'] . "hrs" . "</p>";


        // Check if duration has a decimal value
         if ((float)$session['duration'] == (int)$session['duration']) {
            // Display duration without decimal value
            echo "<p>" . "Total Price: ₱" . number_format($totalCost, 2) . "</p>";
        } else {
            // Display duration with decimal value
            echo "<p>" . $session['duration'] . "hrs</p>";
        }

        echo "<a href=''>
        <button class='btn btn-outline-success'>Accept & Ask for Payment</button>
        </a><br><br>";
        
        echo "<a href=''>
        <button class='btn btn-outline-danger'>Decline</button>
        </a>";
        // Display other session details as needed
        echo "</div>";

        // Close database connection
        $stmt->close();
        $conn->close();
    } else {
        // Display an error message if the session ID is not found
        echo "Session not found.";
    }
} else {
    // Display an error message if the session ID is not provided in the URL
    echo "Session ID not provided.";
}
?>
