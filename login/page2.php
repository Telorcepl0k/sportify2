
<?php
session_start();
include_once("config.php"); 

// Check if the user is logged in
if (!isset($_SESSION['UserID'])) {
    // If not logged in, redirect to the login page
    header("Location: page1.php");
    exit();
}

// Display a welcome message
echo "Welcome, " . $_SESSION['username'] . "! You have successfully logged in to page 2.";
?>
