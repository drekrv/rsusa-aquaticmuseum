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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get content and section information from the request
    $content = $_POST['content'];
    $section = $_POST['section'];

    // Prepare SQL query to update data in the respective column based on the section
    $sql = "";

    switch ($section) {
        case 'about-us':
            $sql = "UPDATE home SET AboutUs='$content' WHERE ID=1"; // Assuming ID 1 for AboutUs
            break;
        case 'vission':
            $sql = "UPDATE home SET Vission='$content' WHERE ID=1"; // Assuming ID 1 for Vission
            break;
        case 'mission':
            $sql = "UPDATE home SET Mission='$content' WHERE ID=1"; // Assuming ID 1 for Mission
            break;
        case 'mandate':
            $sql = "UPDATE home SET Mandate='$content' WHERE ID=1"; // Assuming ID 1 for Mandate
            break;
        case 'romblon':
            $sql = "UPDATE home SET Romblon='$content' WHERE ID=1"; // Assuming ID 1 for Romblon
            break;
        default:
            // Handle other sections or errors
            break;
    }

    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
