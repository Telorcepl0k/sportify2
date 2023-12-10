<?php
include_once("config.php");

// Fetch workout program data from the database
$conn = connectDB();
$sql = "SELECT * FROM WorkoutProgram";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    echo "Error: " . $conn->error;
    exit();
}

// Check if workout program data was found
if ($result->num_rows > 0) {
    $workoutPrograms = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No workout program data found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Programs</title>
    <!-- Add your stylesheet link here -->
    <style>
        /* Add your CSS styles for formatting the workout programs list */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Workout Programs</h2>

<table>
    <thead>
        <tr>
            <th>ProgramID</th>
            <th>ProgramName</th>
            <th>Description</th>
            <th>Duration (minutes)</th>
            <th>Goal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($workoutPrograms as $program): ?>
            <tr>
                <td><?php echo $program['ProgramID']; ?></td>
                <td><?php echo $program['ProgramName']; ?></td>
                <td><?php echo $program['Description']; ?></td>
                <td><?php echo $program['Duration']; ?></td>
                <td><?php echo $program['Goal']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
