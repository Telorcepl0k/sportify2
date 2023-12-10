<?php
session_start();
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get updated data from the form
    
    $updatedUsername = $_POST['Username'];
    $updatedPassword = $_POST['Password'];
    $updatedFirstName = $_POST['FirstName'];
    $updatedLastName = $_POST['LastName'];
    $updatedEmail = $_POST['Email'];
    $updatedDateOfBirth = $_POST['DateOfBirth'];
    $updatedGender = $_POST['Gender'];
    $updatedHeight = $_POST['Height'];
    $updatedWeight = $_POST['Weight'];
    $updatedTargetWeight = $_POST['TargetWeight'];
    $updatedFitnessLevel = $_POST['FitnessLevel'];
    $updatedFocusAreas = $_POST['FocusAreas'];
    $updatedGoal = $_POST['Goal'];

    // Update user information in the database
    $updateSql = "UPDATE User SET 
        Username = '$updatedUsername',
        Password = '$updatedPassword',
        FirstName = '$updatedFirstName',
        LastName = '$updatedLastName',
        Email = '$updatedEmail',
        DateOfBirth = '$updatedDateOfBirth',
        Gender = '$updatedGender',
        Height = '$updatedHeight',
        Weight = '$updatedWeight',
        TargetWeight = '$updatedTargetWeight',
        FitnessLevel = '$updatedFitnessLevel',
        FocusAreas = '$updatedFocusAreas',
        Goal = '$updatedGoal'
        WHERE UserID = '$userID'";

    if ($conn->query($updateSql) === TRUE) {
        // Redirect to the profile page after successful update
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating user information: " . $conn->error;
    }

    $conn->close();
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Sportify</title>
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

    <div class="edit-profile-wrapper">
        <h2>Edit Your Profile</h2>
        <pre><?php print_r($userData); ?></pre>



        <!-- Display the current user information in the form -->
        <form method="post" action="editprofile.php">
            <label for="Username">Username:</label>
            <input type="text" name="Username" value="<?php echo htmlspecialchars($userData['Username']); ?>" required>

            <label for="Password">Password:</label>
            <input type="password" name="Password" required>

            <label for="DateOfBirth">Date of Birth:</label>
            <input type="date" name="DateOfBirth" value="<?php echo htmlspecialchars($userData['DateOfBirth']); ?>" required>

            <label for="Gender">Gender:</label>
            <select name="Gender" required>
                <option value="Male" <?php echo ($userData['Gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($userData['Gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                <!-- Add other gender options if needed -->
            </select>

            <label for="Height">Height (in cm):</label>
            <input type="number" name="Height" value="<?php echo htmlspecialchars($userData['Height']); ?>" required>

            <label for="Weight">Weight (in kg):</label>
            <input type="number" name="Weight" value="<?php echo htmlspecialchars($userData['Weight']); ?>" required>

            <label for="TargetWeight">Target Weight (in kg):</label>
            <input type="number" name="TargetWeight" value="<?php echo htmlspecialchars($userData['TargetWeight']); ?>" required>

            <label for="FitnessLevel">Fitness Level:</label>
            <input type="text" name="FitnessLevel" value="<?php echo htmlspecialchars($userData['FitnessLevel']); ?>" required>

            <label for="FocusAreas">Focus Areas:</label>
            <input type="text" name="FocusAreas" value="<?php echo htmlspecialchars($userData['FocusAreas']); ?>" required>

            <label for="Goal">Goal:</label>
            <input type="text" name="Goal" value="<?php echo htmlspecialchars($userData['Goal']); ?>" required>

            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
