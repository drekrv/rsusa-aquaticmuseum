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

// Check if a search query is submitted
if (isset($_POST['searchButton'])) {
    $searchTerm = $_POST['searchInput'];

    // SQL query to search for similar values in relevant columns
    $sql = "SELECT ID, SpeciesName, LocalName, Type, FamilyName, SerialNo, Location, Description, Image, Time_Date 
            FROM collection 
            WHERE SpeciesName LIKE '%$searchTerm%' 
                OR Type LIKE '%$searchTerm%' 
                OR FamilyName LIKE '%$searchTerm%'
            ORDER BY Time_Date DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo '<div class="image-container">'; // Start image container
        while ($row = $result->fetch_assoc()) {
            $imageData = $row['Image'];
            $imageSrc = 'data:image/png;base64,' . base64_encode($imageData);
            $imageID = $row['ID'];

            echo '<a href="view-species.php?id=' . $imageID . '">';
            echo '<img src="' . $imageSrc . '" class="resizable-image" />';
            echo '</a>';
        }
        echo '</div>'; // End image container
    } else {
        echo "0 results";
    }
} else {
    // Your existing code to display all collections here
    $sql = "SELECT ID, SpeciesName, LocalName, Type, FamilyName, SerialNo, Location, Description, Image, Time_Date FROM collection ORDER BY Time_Date DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo '<div class="image-container">'; // Start image container
        while ($row = $result->fetch_assoc()) {
            $imageData = $row['Image'];
            $imageSrc = 'data:image/png;base64,' . base64_encode($imageData);
            $imageID = $row['ID']; // Assuming 'ID' is the primary key of your table

            // Creating a link around the image to view details on another page
            echo '<a href="view-species.php?id=' . $imageID . '">';
            echo '<img src="' . $imageSrc . '" class="resizable-image" />';
            echo '</a>';
        }
        echo '</div>'; // End image container
    } else {
        echo "0 results";
    }
}
$conn->close();
?>
