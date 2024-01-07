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

// Fetch data from the database
$sql = "SELECT AboutUs, Vission, Mission, Mandate, Romblon FROM home";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display data in respective HTML div elements
        echo '<div class="about-us">' . $row["AboutUs"] . '</div>';
        echo '<div class="vission">' . $row["Vission"] . '</div>';
        echo '<div class="mission">' . $row["Mission"] . '</div>';
        echo '<div class="mandate">' . $row["Mandate"] . '</div>';
        echo '<div class="romblon">' . $row["Romblon"] . '</div>';
    }
} else {
    echo "No data found";
}

$conn->close();
?>