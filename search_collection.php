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

$searchQuery = $_GET['query'] ?? '';

$sql = "SELECT ID, SpeciesName, LocalName, Type, FamilyName, SerialNo, Location, Description, Image, Time_Date FROM collection WHERE SpeciesName LIKE '%$searchQuery%' OR Type LIKE '%$searchQuery%' OR FamilyName LIKE '%$searchQuery%'";

$result = $conn->query($sql);

$searchResults = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($searchResults, $row);
    }
}

echo json_encode($searchResults);

$conn->close();
?>
