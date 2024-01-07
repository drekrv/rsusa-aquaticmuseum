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

// Handle image upload and retrieve the image data
$imageFileName = $_FILES['image']['name'];
$imageTmpName = $_FILES['image']['tmp_name'];
$imageData = file_get_contents($imageTmpName);

// Prepare and execute the SQL insert statement with prepared statements
$stmt = $conn->prepare("INSERT INTO collection (SpeciesName, Type, FamilyName, SerialNo, Location, Description,LocalName, Image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $speciesName, $type, $familyName, $serialNo, $location, $description,$localName, $imageData);

// Set the parameter values and execute
$speciesName = $_POST['SpeciesName_ID'];
$type = $_POST['Type_ID'];
$familyName = $_POST['FamilyName_ID'];
$serialNo = $_POST['SerialNo_ID'];
$location = $_POST['Location_ID'];
$description = $_POST['Description_ID'];
$localName = $_POST['LocalName_ID'];



if ($stmt->execute()) {
    echo "Data saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}



$stmt->close();
$conn->close();
?>