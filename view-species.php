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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
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
            left: 1220px; /* Updated X position */
            font-size: 15px; /* Updated font size */
            text-align: center;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
        }

        .delete-button {
            position: absolute;
            top: 133px;
            left: 1145px;
            font-size: 15px;
            text-align: center;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            border: none;
            background-color: transparent;
            color: #f44336; /* Button text color */
            cursor: pointer;
            outline: none; 
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
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }

         .image-container img {
            width: 100%; /* Limit the image width to the container */
            max-height: 100%; /* Limit the image height to the container */
            object-fit: cover; /* Fit the image while maintaining aspect ratio */
        }
        
        .back-button {
            position: absolute;
            top: 60px;
            left: 1217px;
            padding: 10px 15px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            cursor: pointer;
        }
        /* Style for the back arrow icon */
        .back-icon {
            margin-right: 5px;
        }

        .add-to-featured-button {
            position: absolute;
            top: 115px;
            left: 139px;
            padding: 7px 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            cursor: pointer;
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
            <a href="edit_page.php?id=<?php echo $imageID; ?>" class="edit-button">Edit</a>
            <a href="" class="add-to-featured-button" id="addToFeaturedButton">Add to Featured</a>
            <div id="savedMessage" style="display: none; position: absolute; top: 50%; left: 50%; width: 250px; height:25px;text-align: center; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.8); color: white; padding: 50px; border-radius: 5px;">
                Saved to Featured
            </div>
            <a href="collection.php" class="back-button">
        <i class="fas fa-arrow-left back-icon"></i>
    </a>


            <form method="post" action="" onsubmit="return confirmDelete()">
                <input type="submit" name="delete" value="Delete" class="delete-button">
            </form>
            

<script>

function confirmDelete() {
                    return confirm("Are you sure you want to delete this species?");
                }

  function addToFeatured() {
        const imageUrl = "<?php echo base64_encode($row['Image']); ?>";
        const speciesName = "<?php echo $row['SpeciesName']; ?>";
        const description = "<?php echo $row['Description']; ?>";

        let featuredItems = JSON.parse(localStorage.getItem('featuredItems')) || [];
        featuredItems.push({ imageUrl, speciesName, description });
        localStorage.setItem('featuredItems', JSON.stringify(featuredItems));

        // Show the "Saved to Featured" message
        const savedMessage = document.getElementById('savedMessage');
        savedMessage.style.display = 'block';

        // Hide the message after 3 seconds
        setTimeout(() => {
            savedMessage.style.display = 'none';
        }, 2000); // 3000 milliseconds = 3 seconds

        // Prevent the default behavior of the link
        return false;
    }

    function editImage() {
            const imageID = <?php echo json_encode($_GET['id']); ?>;
            window.location.href = "edit_page.php?id=" + imageID;
            return false;
        }


    // Attach the addToFeatured function to the Add to Featured button
    const addToFeaturedButton = document.getElementById('addToFeaturedButton');
    addToFeaturedButton.addEventListener('click', addToFeatured);

    const editButton = document.getElementById('editButton');
        editButton.addEventListener('click', editImage);

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
