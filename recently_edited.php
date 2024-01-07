<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "species";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch recently edited items from the recently_edited table
$editedItemsQuery = "SELECT Modified, Name, Time_Date FROM recently_edited ORDER BY Time_Date DESC LIMIT 10";
$result = $conn->query($editedItemsQuery);

if ($result->num_rows > 0) {
    // Output table for recently edited items
    echo "<table border='1'>
            <tr>
                <th>Modified</th>
                <th>Name</th>
                <th>Time and Date</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Modified'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Time_Date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No recently edited items";
}

$conn->close();
?>
