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

// Check if a specific subtab is selected
$selectedSubtab = $_GET['subtab'] ?? null;

// SQL query to retrieve image data based on selected FamilyName
$sql = "SELECT ID, SpeciesName, LocalName, Type, FamilyName, SerialNo, Location, Description, Image FROM collection";
if ($selectedSubtab) {
    $sql .= " WHERE FamilyName = '$selectedSubtab'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo '<div class="image-container">'; // Start image container
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $imageData = $row['Image'];
        $imageSrc = 'data:image/png;base64,' . base64_encode($imageData);
        $imageID = $row['ID']; // Assuming 'ID' is the primary key of your table

        // Creating a link around the image to view details on another page
        echo '<a href="view-species.php?id=' . $imageID . '">';

        // Add CSS class to the image for resizing and setting margins
        if ($count == 0) {
            echo '<img src="' . $imageSrc . '" class="resizable-image" style="margin-left: 270px; margin-right: 40px;" />'; // First image in the row
        } elseif ($count < 3) {
            echo '<img src="' . $imageSrc . '" class="resizable-image" style="margin-left: 10px; margin-right: 40px;" />'; // Images 2 and 3 in the row
        } else {
            echo '<img src="' . $imageSrc . '" class="resizable-image" style="margin-left: 40px; margin-right: 10px; margin-bottom: -20px;" />'; // Images in subsequent rows
        }

        echo '</a>';
        $count++;
    }
    echo '</div>'; // End image container
} else {
    echo "0 results";
}
$conn->close();
?>
