<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="style-admin.css">
  <link rel="stylesheet" href="home_style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
  <link href="https://fonts.googleapis.com/css2?family=Judson:wght@700&display=swap" rel="stylesheet">

</head>
<body>
  

<nav class="homepanel"></nav>
<nav class="navbar">
  <ul>
    <li><a href="home_page.php" >Home</a></li>
    <li><a href="collection.php" >Collection</a></li>
    <li><a href="activity_log.php">Activity log</a></li>
    <li><a href="logout.php">Settings</a></li>
  </ul>
</nav>

<!-- Image containers -->
<div class="image-container1" style="position: absolute; top: 78px; left: 300px; width: 999px; bottom: 30px; height: 523px; background-color: #FFFFFE;overflow-y: hidden;">
    <img id="frontPageImageDisplay" src="" alt="FrontPage Image" style="width: 100%; object-fit: cover; overflow-y: hidden;">
  </div>

  <div class="image-container2" style="position: absolute; left: 896px; top: 2813px; width: 403px; height: 959px; background-color: #9BBBEB;">
    <img id="mapImageDisplay" src="" alt="Map Image" style="width: 100%; height: 100%; object-fit: cover;">
  </div>

  <!-- FrontPage Image Buttons -->
  <input type="file" id="frontPageImageInput" style="display: none;">
  <button onclick="chooseImage('frontPageImageInput', 'frontPageImageDisplay')" style="position: absolute; left: 1070px; top: 573px;">Choose Image</button>
  <button onclick="uploadImage('frontPageImageInput', 'frontPage')" style="position: absolute; left: 1192px; top: 573px;">Upload Image</button>

  <!-- Map Image Buttons -->
  <input type="file" id="mapImageInput" style="display: none;">
  <button onclick="chooseImage('mapImageInput', 'mapImageDisplay')" style="position: absolute; left: 1086px; top: 2821px;">Choose Image</button>
  <button onclick="uploadImage('mapImageInput', 'mapImage')" style="position: absolute; left: 1192px; top: 2821px;">Upload Image</button>

<div class="featured" style="position: absolute; left: 300px; top: 817px; font-size: 30px; font-family: 'Judson', sans-serif;">
  Featured Collections
</div>

<div class="feature-container"></div>
    
<div class="featured-box">
  <h2 id="imageName"></h2>
  <p id="imageDescription"></p>
</div>

<div class="about" style="position: absolute; left: 300px; top: 1270px; font-size: 30px; font-family: 'Judson', sans-serif;">
  About Us
</div>


<div class="about-us">
  <textarea id="about-us-textbox" class="text-box" placeholder="Enter your text here..." disabled></textarea>
</div>

<div class="about-title" style="position: absolute; left: 468.5px; top: 1350px; letter-spacing: 10px; font-size: 30px; font-family: 'Judson', ">
ROMBLON STATE UNIVERSITY
</div>

<div class="vission">
  <textarea id="vission-textbox" class="text-box" placeholder="Enter your text here..." disabled></textarea>
</div>

<div class="vission-title" style="position: absolute; left: 508px; top: 1800px; font-size: 30px; font-family: 'Judson', sans-serif;">
VISSION
</div>

<div class="mission">
  <textarea id="mission-textbox" class="text-box" placeholder="Enter your text here..." disabled></textarea>
</div>

<div class="mission-title" style="position: absolute; left: 981px; top: 1800px; font-size: 30px; font-family: 'Judson',sans-serif;">
MISSION
</div>

<div class="mandate">
  <textarea id="mandate-textbox" class="text-box" placeholder="Enter your text here..." disabled></textarea>
</div>

<div class="mandate-title" style="position: absolute; left: 571px; top: 2488px; letter-spacing: 10px; font-size: 30px; font-family: 'Judson', sans-serif;">
UNIVERSITY MANDATE
</div>

<div class="romblon">
  <textarea id="romblon-textbox" class="romblon-textbox" placeholder="Enter your text here..." disabled></textarea>
</div>
<div class="romblon-container" style="position: absolute; left: 300px; top: 2813px; letter-spacing: 10px; font-size: 50px;font-weight: bold; color: #0682A8; font-family: 'Inter', sans-serif;z-index: 1;">
ROMBLON
</div>


<!-- Edit and Save buttons for About Us -->
<!-- Edit and Save buttons for About Us -->
<div class="about-us-edit" style="position: absolute; left: 1132px; top: 1379px;">
  <button class="edit-button" data-target="about-us-textbox">Edit</button>
</div>
<div class="about-us-save" style="position: absolute; left: 1191px; top: 1379px;">
  <button class="save-button" data-target="about-us-textbox">Save</button>
</div>

<!-- Edit and Save buttons for Vision -->
<div class="vission-edit" style="position: absolute; left: 643px; top: 1766px;">
  <button class="edit-button" data-target="vission-textbox">Edit</button>
</div>
<div class="vission-save" style="position: absolute; left: 702px; top: 1766px;">
  <button class="save-button" data-target="vission-textbox">Save</button>
</div>

<!-- Edit and Save buttons for Mission -->
<div class="mission-edit" style="position: absolute; left: 1121px; top: 1766px;">
  <button class="edit-button" data-target="mission-textbox">Edit</button>
</div>
<div class="mission-save" style="position: absolute; left: 1180px; top: 1766px;">
  <button class="save-button" data-target="mission-textbox">Save</button>
</div>

<!-- Edit and Save buttons for Mandate -->
<div class="mandate-edit" style="position: absolute; left: 1114px; top: 2512px;">
  <button class="edit-button" data-target="mandate-textbox">Edit</button>
</div>
<div class="mandate-save" style="position: absolute; left: 1173px; top: 2512px;">
  <button class="save-button" data-target="mandate-textbox">Save</button>
</div>

<!-- Edit and Save buttons for Romblon -->
<div class="romblon-edit" style="position: absolute; left: 648px; top: 2846px;">
  <button class="edit-button" data-target="romblon-textbox">Edit</button>
</div>
<div class="romblon-save" style="position: absolute; left: 707px; top: 2846px;">
  <button class="save-button" data-target="romblon-textbox">Save</button>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249223.70992584864!2d122.11464488052077!3d12.57430742862991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a4893416dff243%3A0xc7604fd3da0a6fbf!2sRomblon!5e0!3m2!1sen!2sph!4v1703925042204!5m2!1sen!2sph"
        style="position: absolute; left: 896px; top: 2813px; width: 403px; height: 959px; border: 2px solid #9BBBEB;"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>



<div class="about-container"></div>
<div class="mandate-container"></div>
<div class="romblon-container"></div>
<div class="corevalue-container"></div>
<div class="border1"></div>
<div class="border2"></div>











<!-- PHP to fetch image URLs from the database -->
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

  // Fetch FrontPage image URL from the database
  $sql_frontPage = "SELECT FrontPage FROM home WHERE ID = 1";
  $result_frontPage = $conn->query($sql_frontPage);

  if ($result_frontPage->num_rows > 0) {
      $row_frontPage = $result_frontPage->fetch_assoc();
      $frontPageImageUrl = $row_frontPage['FrontPage'];
      echo "<script>document.getElementById('frontPageImageDisplay').src = '$frontPageImageUrl';</script>";
  }

  // Fetch MapImage URL from the database
  $sql_mapImage = "SELECT MapImage FROM home WHERE ID = 1";
  $result_mapImage = $conn->query($sql_mapImage);

  if ($result_mapImage->num_rows > 0) {
      $row_mapImage = $result_mapImage->fetch_assoc();
      $mapImageUrl = $row_mapImage['MapImage'];
      echo "<script>document.getElementById('mapImageDisplay').src = '$mapImageUrl';</script>";
  }

  $conn->close();
  ?>






<script>

function fetchDataAndPopulateTextareas() {
  fetch('retrieve_content.php') // Fetch data from the PHP script
    .then(response => {
      if (response.ok) {
        return response.json(); // Parse JSON response
      }
      throw new Error('Network response was not ok.');
    })
    .then(data => {
      // Set the retrieved data into the respective textareas
      document.getElementById('about-us-textbox').value = data.AboutUs;
      document.getElementById('mission-textbox').value = data.Mission;
      document.getElementById('vission-textbox').value = data.Vission;
      document.getElementById('mandate-textbox').value = data.Mandate;
      document.getElementById('romblon-textbox').value = data.Romblon;
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });
}

// Call the function to fetch data and populate textareas when the page loads
fetchDataAndPopulateTextareas();

// Function to enable textareas on Edit button click and focus on textarea
function enableTextarea(editButtons) {
  editButtons.forEach(button => {
    button.addEventListener('click', () => {
      const targetTextareaId = button.dataset.target;
      const targetTextarea = document.getElementById(targetTextareaId);
      const textContainer = targetTextarea.parentElement;
      
      // Enable the corresponding textarea
      targetTextarea.disabled = false;
      
      // Show the text container
      textContainer.style.display = 'block';
      
      // Focus on the textarea (show blinking cursor)
      targetTextarea.focus();
    });
  });
}

// Function to handle saving content on Save button click
function handleSave(saveButtons) {
  saveButtons.forEach(button => {
    button.addEventListener('click', () => {
      const targetTextareaId = button.dataset.target;
      const targetTextarea = document.getElementById(targetTextareaId);
      const content = targetTextarea.value;

      // Get the section name (about-us, vision, mission, etc.)
      const section = targetTextareaId.replace('-textbox', '');

      // Send content and section identifier to the server using fetch
      fetch('save_content.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `content=${encodeURIComponent(content)}&section=${section}`, // Send content and section info to PHP script
      })
      .then(response => {
        if (response.ok) {
          return response.text();
        }
        throw new Error('Network response was not ok.');
      })
      .then(data => {
        alert(data); // Show response message from the server
        targetTextarea.disabled = true; // Disable the textarea after saving
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
    });
  });
}





// Get all edit buttons and save buttons
const editButtons = document.querySelectorAll('.edit-button');
const saveButtons = document.querySelectorAll('.save-button');

// Enable textareas on Edit button click and focus on textarea
enableTextarea(editButtons);

// Handle saving content on Save button click
handleSave(saveButtons);



// Query the image from database and displayed on image containers
function chooseImage(inputId, displayId) {
      const fileInput = document.getElementById(inputId);
      fileInput.click(); // Simulate click on the file input element
      
      fileInput.addEventListener('change', function() {
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onload = function(event) {
          const imageDisplay = document.getElementById(displayId);
          imageDisplay.src = event.target.result;
        };

        reader.readAsDataURL(file);
      });
    }

    // Function to upload image
    function uploadImage(inputId, imageType) {
      const fileInput = document.getElementById(inputId);
      const file = fileInput.files[0];

      const formData = new FormData();
      formData.append('file', file);

      fetch(`upload_image.php?type=${imageType}`, {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        alert(data); // Show "Image successfully saved" message
      })
      .catch(error => {
        console.error('Error:', error);
      });
    }
// Featured Image 
const featuredBox = document.querySelector('.featured-box');
let featuredItems = JSON.parse(localStorage.getItem('featuredItems')) || [];
let currentIndex = 0;

function showFeaturedItem(index) {
  const currentItem = featuredItems[index];
  const featuredContent = document.createElement('div');
  featuredContent.classList.add('featured-content');
  featuredContent.setAttribute('id', `featuredContent${index}`);
  featuredContent.innerHTML = `
    <img src="data:image/png;base64,${currentItem.imageUrl}" alt="Featured Image" style="width: 300px; height: 300px; object-fit: cover; border-radius: 6px; border: 1px solid #999999; position: absolute; top: px; left: px;">
    <h3 style="position: absolute; top: 20px; left: 320px; font-size: 35px;">${currentItem.speciesName}</h3>
    <p style="position: absolute; top: 80px; left: 320px;  text-indent: 50px; width: 490px; height:100px; overflow: auto; word-wrap: break-word;">${currentItem.description}</p>
  `;
  return featuredContent;
}

function displayFeaturedItem(index) {
  const newFeaturedContent = showFeaturedItem(index);
  featuredBox.innerHTML = ''; // Clear previous content
  featuredBox.appendChild(newFeaturedContent);
}

if (featuredItems.length > 0) {
  displayFeaturedItem(currentIndex);

  const nextButton = document.createElement('button');
  nextButton.textContent = 'Next';
  nextButton.style.position = 'absolute';
  nextButton.style.left = '1214px';
  nextButton.style.top = '1017px';
  nextButton.addEventListener('click', showNextItem);
  document.body.appendChild(nextButton);

  function showNextItem() {
    currentIndex = (currentIndex + 1) % featuredItems.length;
    displayFeaturedItem(currentIndex);
  }
}

const deleteButton = document.createElement('button');
deleteButton.textContent = 'Delete';
deleteButton.style.position = 'absolute';
deleteButton.style.left = '1100px';
deleteButton.style.top = '868px';
deleteButton.addEventListener('click', deleteFeaturedContent);
document.body.appendChild(deleteButton);

function deleteFeaturedContent() {
  const featuredContent = document.querySelector('.featured-content');
  if (featuredContent) {
    const contentId = parseInt(featuredContent.id.replace('featuredContent', ''), 10);
    featuredItems.splice(contentId, 1); // Remove the item from the array
    localStorage.setItem('featuredItems', JSON.stringify(featuredItems)); // Update localStorage
    featuredContent.remove();
    // Display the next image
    currentIndex = currentIndex >= featuredItems.length ? 0 : currentIndex;
    displayFeaturedItem(currentIndex);
  } else {
    console.log('No featured content to delete.');
  }
}






</script>




</body>
</html>
