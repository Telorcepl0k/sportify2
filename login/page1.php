<!-- Login page -->
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

    // Perform the login check
    $sql = "SELECT * FROM User WHERE username = '$Username' AND password = '$Password'";
    $result = $conn->query($sql);
    


    if ($result->num_rows > 0) {
        // Login successful
        $user = $result->fetch_assoc();
        $_SESSION['UserID'] = $user['UserID'];
        $_SESSION['Username'] = $user['Username'];

        var_dump($_SESSION);
        header("Location: homepage.php");
        exit();
    } else {
        // Login failed
        $error_message = "Invalid username or password.";
    }if (!$result) {
        // Display MySQL error if there is an issue with the query
        echo "Error: " . $conn->error;
        exit();
    }
    

    $conn->close();
} 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="page1.css">
</head>
<body>
<header>
        <h2 class="logo">Sportify</h2>
        <nav class="navigation">
            <a href="index.php">Home</a>
            <a href="page1.php">Login</a>
            <!-- <a href="page1.php" class="btnLogin-popup">Login</a> -->
        </nav>
        
    </header>
    <div class="wrapper">
    <h2>Login</h2>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
        <p>Don't have an account? <a href="page3.php">Register here</a>.</p>

    </form>
    </div>
</body>
</html>
