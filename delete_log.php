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

// Function to delete an item from the recently_deleted table
if (isset($_POST['deleteItem'])) {
    $deleteTimestamp = $_POST['deleteItem'];
    // Delete the item from the database based on the Delete_At timestamp
    $deleteQuery = "DELETE FROM recently_deleted WHERE Delete_At = '$deleteTimestamp'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Item deleted successfully');</script>";
    } else {
        echo "Error deleting item: " . $conn->error;
    }
}

// Fetch recently deleted items from the recently_deleted table
$deletedItemsQuery = "SELECT Image, SpeciesName, Type, FamilyName, SerialNo, Delete_At FROM recently_deleted ORDER BY Delete_At DESC LIMIT 10";
$result = $conn->query($deletedItemsQuery);

if ($result->num_rows > 0) {
    // Output table for recently deleted items
    echo "<table border='1'>
            <tr>
                <th>Image</th>
                <th>Species Name</th>
                <th>Type</th>
                <th>Family Name</th>
                <th>Serial No</th>
                <th>Time and Date</th>
                <th>Delete</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='data:image/png;base64," . base64_encode($row['Image']) . "' width='100' height='100' alt='Image'></td>";
        echo "<td>" . $row['SpeciesName'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['FamilyName'] . "</td>";
        echo "<td>" . $row['SerialNo'] . "</td>";
        echo "<td>" . $row['Delete_At'] . "</td>";
        echo "<td>
                <form method='post'>
                    <input type='hidden' name='deleteItem' value='" . $row['Delete_At'] . "'>
                    <button type='submit' onclick='return confirmDelete()'>Delete</button>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No recently deleted items";
}

$conn->close();
?>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this item?");
}
</script>
