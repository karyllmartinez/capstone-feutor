<?php

 // Assuming you have fetched the tutor's teachingMode from the database
 $tutorTeachingMode = "Online"; // Replace this with the actual value from the database
    
 // Function to check if a teaching mode is selected
 function isTeachingModeSelected($selectedMode, $tutorTeachingMode) {
     return $selectedMode === $tutorTeachingMode ? "checked" : "";
 }
 
  if($teachingMode === 'Online') {
    echo "<p>Online</p>";
} elseif($teachingMode === 'School') {
    echo "<p>In School</p>";
} else { // Online & School
    echo "<input type='radio' id='online' name='teachingMode' value='Online'>";
    echo "<label for='online'>Online</label>";
    echo "<input type='radio' id='school' name='teachingMode' value='School'>";
    echo "<label for='school'>In School</label>";
}

// Retrieve tutor information based on the query parameter
if(isset($_GET['tutor'])) {
$tutorName = $_GET['tutor'];

$sql = "SELECT subjectExpertise, availableDaysTime FROM tutor WHERE CONCAT(firstName, ' ', lastName) = '$tutorName'";
$result = mysqli_query($conn, $sql);

if($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $subjectExpertise = $row['subjectExpertise'];
  $availableDaysTime = $row['availableDaysTime'];

  // Check if the tutor has multiple subject expertise
  $subjectArray = explode(",", $subjectExpertise);
  $subjectCount = count($subjectArray);
}
}
?>