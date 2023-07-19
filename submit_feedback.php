<?php
require('config.php');
require('validate.php');
// Get form data and sanitize it
$email = $_SESSION['user'];
$q1 = (int) $_POST["q1"];
$q2 = (int) $_POST["q2"];
$q3 = (int) $_POST["q3"];
$q4 = (int) $_POST["q4"];
$q5 = (int) $_POST["q5"];

$sql= "SELECT * FROM feedback WHERE Email_id='$email'";
$tbl= mysqli_query($con,$sql);
if(mysqli_num_rows($tbl)>0)
{
    echo "<script>alert('you have already submitted feedback form'); window.location.href = 'homepage.html';</script>";
}
// Prepare and execute the SQL statement to insert data into the database
$sql="INSERT INTO feedback (Email_id, q1, q2, q3, q4, q5) VALUES ( '$email', '$q1', '$q2', '$q3',' $q4', '$q5')";
$tbl= mysqli_query($con,$sql);
// Redirect back to the feedback form page after submission
echo "<script>alert('feedback submitted successfully!!!'); window.location.href = 'homepage.html';</script>";
exit();
?>
