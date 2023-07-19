<?php
require("config.php");
session_start();
// Get the submitted username, password, and role from the login form
$username = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

// TODO: Validate username and password against your database
$sql = "SELECT * FROM sign_user WHERE Email_id = '$username' AND sign_pw = '$password'";
$tbl = mysqli_query($con, $sql);

// Redirect users based on their role
if ($tbl && mysqli_num_rows($tbl) > 0) {
    $user = mysqli_fetch_assoc($tbl);
    if ($role === 'trainee' && $user['role'] === 'trainee') {
        // Redirect students to the student dashboard
        $_SESSION['user']= $username;
        header("Location: trainee_dashboard.php");
        exit();
    } elseif ($role === 'admin' && $user['role'] === 'admin') {
        // Redirect faculty to the faculty dashboard
        $_SESSION['user']= $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Invalid role, redirect back to the login page
        header("Location: homepage.html");
        exit();
    }
} else {
    // Invalid credentials, show an alert and redirect back to the login page
    echo "<script>alert('Invalid credentials'); window.location.href = 'homepage.html';</script>";
    exit();
}
?>
