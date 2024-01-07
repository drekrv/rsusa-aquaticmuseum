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
    $sql = "SELECT ID, SpeciesName, Type, FamilyName, SerialNo, Location,LocalName, Description, Image FROM collection WHERE ID = $imageID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        
<html>
<head>
    <title>Edit Species details</title>
    <style>
        
        /* Your CSS-like styling */
        .species-name-label {
            
            position: absolute;
            top: 150px;
            left: 626px;
        }

        .species-name {
            position: absolute;
            top: 150px;
            left: 780px;
        }

        .type-label {
            position: absolute;
            top: 225px;
            left: 626px;
        }

        .type {
            position: absolute;
            top: 225px;
            left: 780px;
        }

        .family-name-label {
            position: absolute;
            top: 300px;
            left: 626px;
        }

        .family-name {
            position: absolute;
            top: 300px;
            left: 780px;
        }

        .serial-no-label {
            position: absolute;
            top: 375px;
            left: 626px;
        }

        .serial-no {
            position: absolute;
            top: 375px;
            left: 780px;
        }

        .location-label {
            position: absolute;
            top: 450px;
            left: 626px;
        }

        .location {
            position: absolute;
            top: 450px;
            left: 780px;
        }

        .local-name-label {
            position: absolute;
            top: 530px;
            left: 626px;
        }

        .local-name {
            position: absolute;
            top: 530px;
            left: 780px;
        }

       
        .description-label {
            position: absolute;
            top: 615px;
            left: 145px;
        }

        .description {
            position: absolute;
            top: 657px;
            left: 168px;
            width: 600px; /* Adjust width as per your requirement */
            height: 100px; /* Adjust height as per your requirement */
        }

        .input-30 {
            height: 27px;
        }

        label {
            font-family: 'Inter', sans-serif;
            font-size: 20px;
        }

        .border-frame {
            position: absolute;
            left: 105px;
            top: 56px;
            width: 1156px;
            height: 960px;
            border: 3px solid #999999;
            pointer-events: none;
            border-radius: 8px;
            z-index: -1;
        }


        .update-button {
            position: absolute;
            color: white;
            top: 880px;
            left: 1109px;
            height: 50px;
            width: 120px;
            text-align: center;
            background-color: #17CF77;
            border-radius: 8px;
            border: 2px solid #17CF77;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        
    </style>
</head>

<body>
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
    ?>
            <div class="border-frame"></div>
            <form method="post" action="update_image.php">
            <img src="data:image/png;base64,<?php echo base64_encode($row['Image']); ?>" style="position: absolute; top: 118px; left: 145px; width: 450px; height: 450px; border-radius: 8px; border: 2px solid #999999; object-fit: cover;" />
                <!-- Species Name -->
            <label class="species-name-label">Species Name:</label>
            <input type="text" class="species-name input-30" name="speciesName" style="width: 440px;border-radius: 8px; border: 2px solid #999999;" value="<?php echo $row['SpeciesName']; ?>"><br><br>
            
              <!-- Localname -->
            <label class="local-name-label">Local Name:</label>
            <input type="text" class="local-name input-30"name="localName" style="width: 440px;border-radius: 8px; border: 2px solid #999999;" value= "<?php echo $row['LocalName']; ?>"><br><br>
            
        
            <label class="type-label">Type:</label>
            <input type="text" class="type input-30" name="type" style="width: 150px;border-radius: 8px; border: 2px solid #999999;" value="<?php echo $row['Type']; ?>"><br><br>
            
            <!-- Family Name -->
            <label class="family-name-label">Family Name:</label>
            <input type="text" class="family-name input-30" name="familyName" style="width: 150px;border-radius: 8px; border: 2px solid #999999;" value="<?php echo $row['FamilyName']; ?>"><br><br>
            
            <!-- Serial No -->
            <label class="serial-no-label">Serial No:</label>
            <input type="text" class="serial-no input-30" name="serialNo" style="width: 150px;border-radius: 8px; border: 2px solid #999999;" value="<?php echo $row['SerialNo']; ?>"><br><br>
            
            <!-- Location -->
            <label class="location-label">Location:</label>
            <input type="text" class="location input-30" style="width: 440px;border-radius: 8px; border: 2px solid #999999;" name="location" value="<?php echo $row['Location']; ?>"><br><br>
            
            <!-- Description -->
            <label class="description-label">Description:</label><br>
            <textarea class="description" name="description" style="width: 1057px; left: 145px; height: 200px; border-radius: 8px; border: 2px solid #999999; top: 645px; vertical-align: top; padding: 10px;"><?php echo $row['Description']; ?></textarea><br><br>

            <input type="hidden" name="imageID" value="<?php echo $imageID; ?>">
            <input type="submit" class="update-button" value="Save">
            </form>
    <?php
        } else {
            echo "Image not found";
        }
    } else {
        echo "Invalid image ID";
    }

    $conn->close();
    ?>

    
    <script>
 // JavaScript to prevent going back to edit_page.php after saving
 if (window.history.replaceState) {
    window.history.replaceState(null, null, 'collection.php');
  }

  // Add a listener for the back/forward buttons
  window.addEventListener('popstate', function(event) {
    window.location.href = 'collection.php'; // Redirect to collection.php
  });
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


?>
