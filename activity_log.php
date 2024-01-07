<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Activity Log</title>
  <link rel="stylesheet" href="activity-log-.css">
  <link rel="stylesheet" href="style-admin.css">
  <link href="https://fonts.googleapis.com/css2?family=Judson:wght@700&display=swap" rel="stylesheet">
  
  
<nav class="homepanel"></nav>
<nav class="navbar">
  <ul>
    <li><a href="home_page.php" >Home</a></li>
    <li><a href="collection.php" >Collection</a></li>
    <li><a href="activity_log.php">Activity log</a></li>
    <li><a href="logout.php">Settings</a></li>
  </ul>
</nav>

<div class="activity-log-container">
    <button id="recently-added" class="tab">Recently added</button>
    <button id="recently-deleted" class="tab">Recently deleted</button>
    <button id="recently-edited" class="tab">Recently edited</button>
</div>

<div id="recentlyAddedTable">
  <?php include 'update_log.php'; ?>
</div>

<div id="recentlyDeletedTable" style="display: none;">
  <?php include 'delete_log.php'; ?>
</div>

<div id="recentlyEditedTable" style="display: none;">
  <?php include 'recently_edited.php'; ?>
</div>

<script>
document.getElementById('recently-deleted').addEventListener('click', function() {
  document.getElementById('recentlyAddedTable').style.display = 'none';
  document.getElementById('recentlyDeletedTable').style.display = 'block';
  document.getElementById('recentlyEditedTable').style.display = 'none';
});

document.getElementById('recently-added').addEventListener('click', function() {
  document.getElementById('recentlyAddedTable').style.display = 'block';
  document.getElementById('recentlyDeletedTable').style.display = 'none';
  document.getElementById('recentlyEditedTable').style.display = 'none';
});

document.getElementById('recently-edited').addEventListener('click', function() {
        document.getElementById('recentlyEditedTable').style.display = 'block';
        // Hide other tables if needed
        document.getElementById('recentlyAddedTable').style.display = 'none';
        document.getElementById('recentlyDeletedTable').style.display = 'none';
    });

</script>



<!-- Display the table for recently edited items -->
<div id="recentlyEditedTable" style="display: none;">
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
</div>
  
</body>
</html>