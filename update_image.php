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
    $imageID = $_POST['imageID'];
    $speciesName = $_POST['speciesName'];
    $type = $_POST['type'];
    $familyName = $_POST['familyName'];
    $serialNo = $_POST['serialNo'];
    $location = $_POST['location'];
    $localName = $_POST['localName'];
    $description = $_POST['description'];

    // Update query
    $sql = "UPDATE collection SET SpeciesName='$speciesName', Type='$type', FamilyName='$familyName', SerialNo='$serialNo', Location='$location',LocalName='$localName', Description='$description' WHERE ID = $imageID";

    if ($conn->query($sql) === TRUE) {
        header("Location: view-species.php?id=$imageID");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
}

$conn->close();
?>
