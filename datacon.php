<?php
require("config.php");

$a= $_POST["email"];
$b= $_POST["name"];
$c= $_POST["contact"];
$d= $_POST["pwd"];
$e= $_POST["role"];
$tblcon=mysqli_query($con,"insert into sign_user (Email_id,name,contact_no,sign_pw,role) values('$a','$b',$c,'$d','$e')");
echo "<script>alert('user added !!! redirecting to sign in page'); window.location.href = 'homepage.html';</script>";
exit();
?>

