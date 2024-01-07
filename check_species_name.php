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

// Get the species name from the AJAX request
$speciesName = $_POST['speciesName'];

// Prepare and execute the SQL statement to check if the species name exists
$stmt = $conn->prepare("SELECT COUNT(*) AS count FROM collection WHERE SpeciesName = ?");
$stmt->bind_param("s", $speciesName);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$exists = ($row['count'] > 0) ? true : false;

$response = array("exists" => $exists);
echo json_encode($response);

$stmt->close();
$conn->close();
?>