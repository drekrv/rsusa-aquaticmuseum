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

// Retrieve data from the database
$sql = "SELECT AboutUs, Mission, Vission, Mandate, Romblon FROM home WHERE ID=1"; // Assuming ID 1 for the row

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    $data = [
        'AboutUs' => $row["AboutUs"],
        'Mission' => $row["Mission"],
        'Vission' => $row["Vission"],
        'Mandate' => $row["Mandate"],
        'Romblon' => $row["Romblon"]
    ];
    echo json_encode($data); // Send the retrieved data as JSON response
} else {
    echo "No data found";
}
$conn->close();
?>
