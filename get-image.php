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

$sql = "SELECT FrontPage FROM home WHERE ID = 1"; // Assuming ID 1 corresponds to the image you want to display
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imagePath = $row['FrontPage'];

    // Set the appropriate content type header for the image
    header('Content-Type: image/jpeg'); // Modify this based on your image type (jpeg, png, etc.)
    
    // Output the image content
    echo file_get_contents($imagePath);

} else {
    echo 'Image not found';
}

$conn->close();
?>
