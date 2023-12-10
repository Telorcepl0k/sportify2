<?php
include_once("config.php");

// Fetch equipment data from the database
$conn = connectDB();
$sql = "SELECT * FROM Equipment";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    echo "Error: " . $conn->error;
    exit();
}

// Check if equipment data was found
if ($result->num_rows > 0) {
    $equipmentData = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No equipment data found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment List</title>
    <!-- Add your stylesheet link here -->
    <style>
        /* Add your CSS styles for formatting the equipment list */
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

<h2>Equipment List</h2>

<table>
    <thead>
        <tr>
            <th>EquipmentID</th>
            <th>EquipmentName</th>
            <th>Description</th>
            <th>YouTubeURL</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach ($equipmentData as $equipment): ?>
    <tr>
        <td><?php echo $equipment['EquipmentID']; ?></td>
        <td><?php echo $equipment['EquipmentName']; ?></td>
        <td><?php echo $equipment['Description']; ?></td>
        <td>
        <?php if (!empty($equipment['YouTubeURL'])): ?>
                <a href="<?php echo $equipment['YouTubeURL']; ?>" target="_blank">Watch Video</a>
            <?php else: ?>
                No video available
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>

    </tbody>
</table>

</body>
</html>
