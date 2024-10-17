<?php

echo "<style type='text/css'>

.profile-picture {
  margin: %;
  max-width: 200px;
  max-height: 200px;
  width: 160px; /* Set a fixed width */
  height: 160px; /* Set a fixed height */
  object-fit: cover; /* Maintain aspect ratio and cover the container */
}
.tutorName{
  font-size: 20px;
}
.degreeProgram{
  margin-left:0px; 
  margin-right:0px; 
  font-size: 15px;
  width: 100%;
}
.icongrad{
  width: 33px; /* Set a fixed width */
  height: 20px; /* Set a fixed height */
  position:relative; 
  margin-bottom:0.5%;
  margin-left: 1%;
}
.mode{
  
  margin-left:1px; 
  margin-right:0px; 
  font-size: 15px;
  width: 100%;
}
.iconmode{
  width: 20px; /* Set a fixed width */
  height: 20px; /* Set a fixed height */
  margin: 0;
 
  object-fit: cover;
}
.subj{
  
  margin-left:1px; 
  margin-right:0px; 
  font-size: 15px;
  width: 100%;
  font-weight: 600;
}
.iconsubj{
  width: 19px; /* Set a fixed width */
  height: 20px; /* Set a fixed height */

  margin-bottom:0.5%;
  margin-right:0.5%;
  margin-left: 1%;
  object-fit: cover;
 
}
.bio{
 
  
  font-size: 15px;
  width: 100%;
  color: #666; /* Grey font color */
  font-style: italic; /* Italic font */
}
.btn-outline-custom1,
.btn-outline-custom2 {
    color: #0F422A;
    background-color: #ffffff;
    border-color: #0F422A;
    font-weight: bold;
    letter-spacing: 0.05em;
  
   width: 100%;
}

.btn-outline-custom1 {
    width: 100%;
}
  
.btn-outline-custom2 {
 width: 100%;
}
.rate{
  top:80%;
  left:5%;
  width:200px;
  height:40px;
  position: absolute;
  z-index: 2;
  font-size: 15px;
  font-weight: 300px;
}
.btn-outline-custom1 {
    color: #0F422A;
    background-color: #ffffff;
    border-color: #0F422A;
    font-weight: bold;
    letter-spacing: 0.05em;
  
   width: 60%;
}

</style>";

// Retrieve logged-in student's studentID
$studentID = $_SESSION['auth_user']['user_id'];

// Query to fetch sessions for the logged-in student
$sql = "SELECT s.sessionID, DATE_FORMAT(s.sessionDate, '%M %e, %Y') AS formattedSessionDate, TIME_FORMAT(s.startTime, '%h:%i %p') AS formattedStartTime, TIME_FORMAT(s.endTime, '%h:%i %p') AS formattedEndTime, s.duration, s.subject, s.teachingMode, s.need, s.paymentStatus, s.status, 
        CONCAT(t.firstname, ' ', t.lastname) AS tutorFullName, t.ratePerHour, t.profilePicture
        FROM session s
        INNER JOIN tutor t ON s.tutorID = t.tutorID
        WHERE s.studentID = ? AND s.status = 'Pending'";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentID);
$stmt->execute();
$result = $stmt->get_result();

// Check if the query was successful
if ($result) {
    // Loop through the result set and display the data
    while ($row = mysqli_fetch_assoc($result)) {
        $sessionID = $row['sessionID'];

      

        echo "

       <div class='col-md-12 mb-3' style='margin-left:0px; width:100% !important;'>
    <div class='card shadow custom-card' style='height: 100%; margin-top: 1%;'>
        <div class='card-body'>
            <div style='display: flex; width: 100%;'>
                <!-- First Column (Tutor Info) -->
                 <table style='width: 100%;'>
                <tbody style='display: flex; width: 100%;'>
                
                    <!-- First Column (Tutor Info) -->
                    <tr style='display: flex; width: 40%;'>
                        <td style='width: 100%;'>
                            <table style='width: 100%; height: 100%;'>
                                <tbody style='width: 100%;'>
                                    <tr style='display: flex; width: 100%;'>
                                        <td style='width: 100%;'>
                                            <p style='font-weight: bold; font-size: 20px;'>" . $row['tutorFullName'] . "</p>
                                        </td>
                                    </tr>
                                    <tr style='display: flex; width: 100%;'>
                                        <td style='margin: 0; padding: 0; width: 100%;'>
                                            <div style='display: flex; width: 100%; align-items: center;'>
                                                <img src='icons/mode.png' class='iconmode' />
                                                <div style='margin-left: 10px;'>" . $row['teachingMode'] . "</div>
                                                <div style='border-left: 1px solid black; height: 30px; margin-left: 10px;'></div>
                                                <div style='margin-left: 10px;'>" . $row['formattedSessionDate'] . "</div>
                                                <div style='border-left: 1px solid black; height: 30px; margin-left: 10px;'></div>
                                                <div style='margin-left: 10px;'>" . $row['formattedStartTime'] . "</div>
                                                <div style='border-left: 1px solid black; height: 30px; margin-left: 10px;'></div>
                                                <div style='margin-left: 10px;'>" . $row['formattedEndTime'] . "</div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr style='display: flex; width: 100%; margin-top:10px;'>
                                        <td style='margin: 0; padding: 0; width: 100%;'>
                                            <div style='display: flex; align-items: center;'>
                                                <img src='icons/subj.png' class='iconsubj' />
                                                <div style='margin-left: 10px;'>" . $row['subject'] . "</div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr style='display: flex; width: 100%; margin-top:10px;'>
                                        <td style='margin: 0; padding: 0; width: 100%;'>
                                            <p>Total Cost: ₱" . number_format($row['duration'] * $row['ratePerHour'], 2) . "</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <!-- Second Column (Status) -->
                    <tr style='width: 30%; display: flex; justify-content: center; align-items: start; text-align: center;'>
                        <td style='width: 100%;'>
                            <table style='width: 100%;'>
                                <tbody style='width: 100%;'>
                                    <tr>
                                        <td>
                                            <p class='bio'>Status:</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class='bio'>" . $row['status'] . "</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <!-- Third Column (Button) -->
                    <tr style='width: 30%; display: flex; justify-content: end; align-items: start; text-align: end;'>
                        <td style='width: 100%;'>
                            <button type='button' class='btn btn-outline-custom1' data-toggle='modal' data-target='#detailsModal{$sessionID}'>View Details</button>
                        </td>
                    </tr>
                
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
  
        
        
        ";

        echo "
                <div class='modal fade' id='detailsModal{$sessionID}' tabindex='-1' role='dialog' aria-labelledby='detailsModalLabel{$sessionID}' aria-hidden='true'>
                  <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body'>


                     
                        
                        
                        
                        
                      


                        <table>
                          <tbody>
                            <tr>
                              <td>
                                <p style='font-weight: bold; font-size: 15px; display: flex; justify-content: start; color: #0F422A'>Student-Tutor: " . $row['tutorFullName'] . "</p>
                              </td>
                            </tr>

                            <tr>
                              <td>
    
                                <p class='modal-text' style='font-weight: bold; font-size: 15px; display: flex; justify-content: start; color: #0F422A'>Subject: " . htmlspecialchars($row['subject']) . "</p>
                              </td>
                            </tr>

                            <tr>
                              <td>
                              <p class='modal-text' style=' font-size: 15px; display: flex; justify-content: start; color: #0F422A'>Teaching Mode: " . htmlspecialchars($row['teachingMode']) . "</p>
                                
                              </td>
                            </tr>

                             <tr>
                              <td>
                                <p class='modal-text' style=' font-size: 15px; display: flex; justify-content: start; color: #0F422A'>Date: " . htmlspecialchars($row['formattedSessionDate']) . "</p>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <p class='modal-text' style=' font-size: 15px; display: flex; justify-content: start; color: #0F422A'>Time: " . htmlspecialchars($row['formattedStartTime']) . " - " . htmlspecialchars($row['formattedEndTime']) . "</p> 
                              </td>
                            </tr>

                            <tr>
                              <td>
                                  <p class='modal-text' style='font-weight: bold; font-size: 15px; display: flex; justify-content: start; color: #0F422A'>Need:</p>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                  <p class='modal-text' style=' font-size: 15px; display: flex; justify-content: start; color: #0F422A'> " . htmlspecialchars($row['need']) . "</p>
                              </td>
                            </tr>



                          </tbody>
                        </table>
                      </div>


                      </div>
                    </div>
                  </div>
                </div>
                ";     
                
        


     



        
      
        
     
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>

