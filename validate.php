<?php
session_start();
// Check if the user is signed in
if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];
} else {
    // Redirect to the sign-in page if the user is not signed in
    header('location:homepage.html');
    exit();
}
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    // Add logout logic here, such as destroying session variables, clearing cookies, etc.
    session_destroy();
    // Redirect the user to the login page after successful logout.
    header('location:homepage.html'); // Replace "login.php" with your actual login page.
    exit;
  }
?>