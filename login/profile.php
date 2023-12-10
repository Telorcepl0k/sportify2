<?php
session_start();
include_once("config.php"); 

// Check if the user is logged in
if (!isset($_SESSION['UserID'])) {
    header("Location: page1.php");
    exit();
}

// Include necessary files and perform any other setup
$conn = connectDB(); // Assuming you have a function for database connection

// Retrieve user data from the database based on the session UserID
$userID = $_SESSION['UserID'];
$sql = "SELECT * FROM User WHERE UserID = '$userID'";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    echo "Error: " . $conn->error;
    exit();
}

// Check if user data was found
if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile - Sportify</title>
    <link rel="stylesheet" href="profile.css">
   
</head>
<body>
    <header>
        <h2 class="logo">Sportify</h2>
        <nav class="navigation">
            <a href="homepage.php">Home</a>
            <a href="logout.php">Logout</a> 
           
        </nav>
    </header>

    <div class="profile-wrapper">
        <h2>Your Profile</h2>
        <p>Welcome, <?php echo $userData['Username']; ?>!</p>

        <div class="user-details">
            <p>Username: <?php echo $userData['Username']; ?></p>
            <p>Password: <?php echo $userData['Password']; ?></p>
            <p>FirstName: <?php echo $userData['FirstName']; ?></p>
            <p>LastName: <?php echo $userData['LastName']; ?></p>
            <p>Email: <?php echo $userData['Email']; ?></p>
            <p>DateOfbirth: <?php echo $userData['DateOfBirth']; ?></p>
            <p>Gender: <?php echo $userData['Gender']; ?></p>
            <p>Height: <?php echo $userData['Height']; ?></p>
            <p>Weight: <?php echo $userData['Weight']; ?></p>
            <p>TargetWeight: <?php echo $userData['TargetWeight']; ?></p>
            <p>FitnessLevel: <?php echo $userData['FitnessLevel']; ?></p>
            <p>FocusAreas: <?php echo $userData['FocusAreas']; ?></p>
            <p>Goal: <?php echo $userData['Goal']; ?></p> 
            <?php echo "<p><a href='editprofile.php?UserID={$userData['UserID']}'>Edit</a></p>"; ?>


        </div>
    </div>

   

</body>
</html>
