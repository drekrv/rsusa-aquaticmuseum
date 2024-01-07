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

if (isset($_GET['id'])) {
    $imageID = $_GET['id'];

    // Retrieve image details based on ID
    $sql = "SELECT ID, SpeciesName, Type, FamilyName, SerialNo, Location, Description,LocalName, Image FROM collection WHERE ID = $imageID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (isset($_POST['delete'])) {
            // Archive the selected image into the recently_deleted table
            $insertSQL = "INSERT INTO recently_deleted (ID, Image, SpeciesName, Type, FamilyName, SerialNo) SELECT ID, Image, SpeciesName, Type, FamilyName, SerialNo FROM collection WHERE ID = $imageID";
            if ($conn->query($insertSQL) === TRUE) {
                // Delete the selected image from the collection table
                $deleteSQL = "DELETE FROM collection WHERE ID = $imageID";
                if ($conn->query($deleteSQL) === TRUE) {
                    // Redirect to collection.php after deletion
                    header("Location: collection.php");
                    exit();
                } else {
                    echo "Error deleting image: " . $conn->error;
                }
            } else {
                echo "Error archiving image: " . $conn->error;
            }
        }

        ?>

        
        
        
        <!DOCTYPE html>
        <html>
        <head>
            
        
            <title>View Species Details</title>
            <style>
                 .text-element {
            position: absolute;
            font-family: 'Inter', sans-serif;
            font-size: 16px;
        }
        .species-name {
            font-weight: bold;
            font-size: 35px;
            top: 115px;
            left: 631px;
        }

        .local-name-label {
            top: 190px;
            left: 631px;
        }
        .local-name {
            top: 190px;
            left: 790px;
        }

        .type-label {
            top: 260px;
            left: 631px;
        }
        .type {
            top: 260px;
            left: 790px;
        }

        .family-name-label {
            top: 330px;
            left: 631px;
        }
        .family-name {
            top: 330px;
            left: 790px;
        }
        
        .serial-no-label {
            top: 113px;
            left: 549px;
        }
        .serial-no {
            top: 113px;
            left: 559px;
        }
        
        .location-label {
            top: 400px;
            left: 631px;
        }
        .location {
            top: 400px;
            left: 790px;
        }

        .description-label {
            top: 470px;
            left: 631px;
        }
        .description {
            position: absolute;
            top: 470px;
            left: 740px;
            text-indent: 50px; /* Adjust the indent value as needed */
            width: 500px;
            height: 112px;
            word-wrap: break-word;
        }
        .edit-button {
            position: absolute;
            top: 134px; /* Updated Y position */
            left: 1197px; /* Updated X position */
            font-size: 15px; /* Updated font size */
            text-align: center;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
        }
        
        .border-frame {
            position: absolute;
            left: 75px;
            top: 50px;
            width: 1199px;
            height: 580px;
            border: 2px solid #C6C6C6;
            pointer-events: none;
            border-radius: 8px;
            z-index: -1;
        }

        .name-line{
            position: absolute;
            border: 1px solid #999999;
            width: 620px;
            top: 160px;
            right: 96px;
           
        }

        .image-container {
            position: absolute;
            top: 100px;
            left: 125px;
            width: 480px;
            height: 480px;
            border-radius: 8px;
            border: 1px solid #999999;
            overflow: hidden; /* Hide any overflowing parts of the image */
        }

        .image-container img {
            width: 100%; /* Fill the container width */
            height: auto; /* Maintain aspect ratio */
            object-fit: cover; /* Fit the image while maintaining aspect ratio */
        }
        

     

     

            </style>
        </head>
        <body>
            
            <div class="border-frame"></div>
            <div class="name-line"></div>
            <div class="image-container">
            <img src="data:image/png;base64,<?php echo base64_encode($row['Image']); ?>" alt="Species Image"></div>  
            <div class="text-element species-name"><?php echo $row['SpeciesName']; ?></div>
            <div class="text-element local-name-label">Local Name:</div>
            <div class="text-element local-name"><?php echo $row['LocalName']; ?></div>
            <div class="text-element type-label">Type:</div>
            <div class="text-element type"><?php echo $row['Type']; ?></div>
            <div class="text-element family-name-label">Family Name:</div>
            <div class="text-element family-name"><?php echo $row['FamilyName']; ?></div>
            <div class="text-element serial-no-label">#</div>
            <div class="text-element serial-no"><?php echo $row['SerialNo']; ?></div>
            <div class="text-element location-label">Location:</div>
            <div class="text-element location"><?php echo $row['Location']; ?></div>
            <div class="text-element description-label">Description:</div>
            <div class="text-element description"><?php echo $row['Description']; ?></div>
            

<script>


  
</script>




        </body>
        </html>
        <?php
    } else {
        echo "Image not found";
    }
} else {
    echo "Invalid image ID";
}

$conn->close();
?>
