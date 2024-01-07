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

// Check if the file upload request is for frontPage or mapImage
if ($_GET['type'] === 'frontPage' || $_GET['type'] === 'mapImage') {
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['file']['name'];
        $tempName = $_FILES['file']['tmp_name'];
        $folder = 'uploads/';

        // Move uploaded file to a designated folder
        if (move_uploaded_file($tempName, $folder . $fileName)) {
            $id = 1; // Set the common ID value

            $columnName = ($_GET['type'] === 'frontPage') ? 'FrontPage' : 'MapImage';

            // Check if there is an existing record for ID = 1
            $sql_check = "SELECT ID FROM home WHERE ID = $id";
            $result = $conn->query($sql_check);

            if ($result->num_rows > 0) {
                // If the record for ID = 1 exists, update the respective column
                $filePath = $folder . $fileName;
                $sql_update = "UPDATE home SET $columnName = '$filePath' WHERE ID = $id";
                if ($conn->query($sql_update) === TRUE) {
                    echo "Image edited successfully ";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "No existing record found for ID = $id";
            }
        } else {
            echo "Error moving uploaded file";
        }
    } else {
        echo "Error uploading file";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
