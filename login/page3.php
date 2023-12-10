<?php
session_start();
include_once("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connectDB(); // Use the connectDB function

    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $FirstName = $_POST['first_name'];
    $LastName = $_POST['last_name'];
    $Email = $_POST['email'];

    // Validate email address
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email address.";
    } else {
        // Perform the registration
        $sql = "INSERT INTO User (Username, Password, FirstName, LastName, Email) VALUES ('$Username', '$Password', '$FirstName', '$LastName', '$Email')";
        $result = $conn->query($sql);

        if ($result) {
            // Registration successful
            $success_message = "User registered successfully. <a href='page1.php'>Login</a>";
        } else {
            // Registration failed
            $error_message = "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="page3.css">
</head>
<body>
<header>
        <h2 class="logo">Sportify</h2>
        <nav class="navigation">
        <a href="landingpage.php">Home</a>
            <a href="page1.php">Login</a>
        </nav>
        
    </header>
    <div class="wrapper">
    <h2>Registration</h2>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <?php if (isset($success_message)) { ?>
        <p><?php echo $success_message; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Register">
        
    </form>
    </div>
</body>
</html>
