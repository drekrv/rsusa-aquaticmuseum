<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Activity Log</title>
  <link rel="stylesheet" href="activity-log-.css">
  <link rel="stylesheet" href="style_admin.css">
  <link href="https://fonts.googleapis.com/css2?family=Judson:wght@700&display=swap" rel="stylesheet">
  <style>
    /* Add your CSS styles here */
    table {
      width: 999px; /* Set the width of the table */
      margin: 20px auto; /* Center the table by setting margin */
      border-collapse: collapse;
      position: absolute; /* Set the position to absolute */
      top: 148px; /* Adjust the top position */
      left: 300px; /* Adjust the left position */
    }

    table, th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }

    img {
      max-width: 100px; /* Set maximum width for the image */
      height: auto; /* Maintain aspect ratio */
    }
  </style>
</head>
<body>


<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";      // Replace with your MySQL password
$dbname = "species";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to log activity
function logActivity($activity) {
    // Log activity code here
}

// Check if 'collection' table data was added recently
$sql = "SELECT Image, SpeciesName, Type, FamilyName, SerialNo, Time_Date FROM collection ORDER BY ID DESC LIMIT 10"; // Change the query as needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the recently added record
    echo "<table border='1'>
            <tr>
                <th>Image</th>
                <th>Scientific Name</th>
                <th>Type</th>
                <th>Family Name</th>
                <th>Serial No.</th>
                <th>Time and Date</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        $imageData = $row['Image'];
        $imageSrc = 'data:image/png;base64,' . base64_encode($imageData);
        echo "<td><img src='" . $imageSrc . "' alt='Image'></td>"; // Display the image
        echo "<td>" . $row["SpeciesName"] . "</td>";
        echo "<td>" . $row["Type"] . "</td>";
        echo "<td>" . $row["FamilyName"] . "</td>";
        echo "<td>" . $row["SerialNo"] . "</td>";
        echo "<td>" . $row["Time_Date"] . "</td>";
        echo "</tr>";
        
        // Log the activity of adding data to the collection table
        logActivity("Added data to the 'collection' table");
    }
    echo "</table>";
} else {
    echo "No recently added data in the 'collection' table.";
}

$conn->close();
?>
