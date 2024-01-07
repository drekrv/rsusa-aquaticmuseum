<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Collection front</title>
  <link rel="stylesheet" href="nav_front.css">
  <link rel="stylesheet" href="explore.css">
  <link rel="stylesheet" href="search-collection.css">
  <style>@import url('https://fonts.googleapis.com/css2?family=Judson&display=swap');</style>

  <!-- Include Inter font from Google Fonts -->







<style>
  

  .container {
    position: absolute;
    left: 177px; /* Updated left position to 418px */
    top: 320px; /* Updated top position to 70px */
    width: 1000px;
    height: 45px;
    background-color: rgba(255, 255, 255, 0.6); /* White color with 60% opacity */
}


.tab {
    font-family: 'Inter', sans-serif;
    font-size: 20px; /* Updated font size to 20px */
    font-weight: bold;
    color: #4B4B56;
    cursor: pointer;
    position: absolute;

}

#floraTab {
    top: 10px; /* Adjusted top position */
    left: 20px;

  
}

#faunaTab {
    top: 10px; /* Adjusted top position */
    left: 220px;

}

.subTabsContainer {
    position: absolute;
    top: 70px;
    left: 20px;
    width: 1000px;
    height: 40px;
    background-color: transparent;
    display: none;
    text-align: center;
     z-index: 1; /* Ensure it's above the images */
}

.subTab {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: normal;
    color: #666;
    cursor: pointer;
    display: inline-block;
    margin: 0 20px; /* Increased margin on left and right sides of each subtab */
    
    
}
.activeSubTab {
    color: #0096EA;
    border-bottom: 2px solid #0096EA; /* Adding a line below the active subtab */
}

/* image container */
.image-container {
    position: absolute;
    top: 215px;
    left: 103px;
    width: 1000px;
   
    
}
.resizable-image {
    width: 176px; /* Set the width */
    height: 176px; /* Set the height */
    margin-left: 40px; /* Set the left margin */
    margin-bottom: 40px; /* Set the bottom margin */
    margin-right: 10px; /* Set the right margin */
    border: 1px solid #999999;
}

.all-collections {
    position: absolute;
    left: 972px;
    top: 275px;
    width: 187px;
    height: 17px;
    border-radius: 4px;
    font-family: 'Inter', sans-serif;
    letter-spacing: 3px;
    color: #494949;
    /* Additional styling for visibility and appearance */
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
    cursor: pointer;
  }

  
.subTabsContainer {
    position: absolute;
    top: 60px;
    left: 199px;
    width: 600px;
    height: 70px;
    background-color: transparent;
    display: none;
    text-align: center;
    z-index: 1; /* Ensure it's above the images */
    line-height: 2;
    overflow: auto;
    white-space: nowrap;
    /* Adjust the value as needed for spacing between lines */
}
/* Hide the scrollbar */
.subTabsContainer::-webkit-scrollbar {
    display: none;
}
.scroll-buttons {
    position: relative;
}

.scroll-buttons button {
    background-color: #dadada;
    border: none;
    cursor: pointer;
    padding: 8px 14px;
    font-size: 20px;
    
    position: absolute;
    top: 60px;
}

.backward {
    left: 159px;
}

.forward {
    left: 799px;
}




</style>


</head>
<body>


<nav>
        <ul>
            <li><a href="home-front.php">Home</a></li>
            <li><a href="collection-front.php">Explore</a></li>
            <li><a href="home-front.php#about-nav">About Us</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <div class="grad-bar"></div>
        <form method="POST" action="all_collections.php" class="search-form">
    <div class="search-bar">
        <input type="text" name="searchInput" id="searchInput" placeholder="Search...">
        <button type="submit" name="searchButton" id="searchButton">Search</button>
    </div>
</form>
    </nav>
<section id="explore">
            <div class="line1"></div>
            <div class="line2"></div>
            <h1>THE COLLECTIONS</h1>
            <div class="line3"></div>
            <div class="background-image">
                <!-- Specify the path to your image file -->
                <img src="EXPLOREBGRND.png" alt="Example Image">
            </div>
            
    </section> 
    <section id="about">

    </section>


</body>


<div class="all-collections">All Collection</a>
</div>



<div class="container">
    <div id="floraTab" class="tab">Flora Collection</div>
    <div id="faunaTab" class="tab">Fauna Collection</div>
    <div class="scroll-buttons">
        <button id="scrollBackward" class="backward">&lt;</button>
        <button id="scrollForward" class="forward">&gt;</button>
    </div>
    <div id="subTabsContainer" class="subTabsContainer"></div>
</div>


  

  <div class="image-container" id="displayCollections">
    <!-- Include the PHP file to display images -->
    <?php include 'front-display.php'; ?>
  </div>
  
 
  

  <script>


const floraTab = document.getElementById('floraTab');
const faunaTab = document.getElementById('faunaTab');
const subTabsContainer = document.getElementById('subTabsContainer');
const scrollBackwardBtn = document.getElementById('scrollBackward');
const scrollForwardBtn = document.getElementById('scrollForward');
const allCollectionsBtn = document.querySelector('.all-collections');
const imageContainer = document.querySelector('.image-container');
const createAddBox = document.getElementById('createAddBox');
const searchInput = document.getElementById('searchInput');
const searchButton = document.getElementById('searchButton');



scrollBackwardBtn.addEventListener('click', () => {
    subTabsContainer.scrollBy({
        left: -150, // Adjust scroll value as needed
        behavior: 'smooth'
    });
});

scrollForwardBtn.addEventListener('click', () => {
    subTabsContainer.scrollBy({
        left: 150, // Adjust scroll value as needed
        behavior: 'smooth'
    });
});

// Function to check overflow and show/hide scroll buttons
function checkOverflow() {
    scrollBackwardBtn.style.display =
        subTabsContainer.scrollLeft > 0 ? 'block' : 'none';

    scrollForwardBtn.style.display =
        subTabsContainer.scrollLeft < (subTabsContainer.scrollWidth - subTabsContainer.clientWidth) ? 'block' : 'none';
}

// Show or hide arrow buttons based on overflow
subTabsContainer.addEventListener('scroll', () => {
    checkOverflow();
});

// Check initial overflow state on page load and show forward button if needed
window.addEventListener('load', () => {
    subTabsContainer.style.display = 'block'; // Ensure the container is displayed
    // Create subtabs
    const floraSubTabNames = [''];
    subTabsContainer.innerHTML = createSubTabs(floraSubTabNames);

    checkOverflow();
});





// Function to create subtabs with specific names and IDs for Flora Collection
function createSubTabs(subTabNames) {
    let subTabsHTML = '';
    for (let i = 0; i < subTabNames.length; i++) {
        const subTabID = `${subTabNames[i].replace(' ', '')}_ID`; // Generating unique IDs for subtabs
        subTabsHTML += `<div class="subTab" id="${subTabID}">${subTabNames[i]}</div>`;
    }
    return subTabsHTML;
}

function loadAllImages() {
    fetch('all_collections.php')
        .then(response => response.text())
        .then(data => {
            imageContainer.innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Function to change tab text colors
function changeTabTextColors(activeTab, inactiveTab) {
    activeTab.style.color = '#0096EA'; // Set active tab text color
    inactiveTab.style.color = ''; // Reset inactive tab text color
}

// Function to fetch and display images based on subtab
function loadImagesBySubtab(subtabName) {
    fetch(`front-display.php?subtab=${subtabName}`)
        .then(response => response.text())
        .then(data => {
            imageContainer.innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Function to handle subtab click event
function handleSubTabClick(event) {
    const subtabName = event.target.innerText;
    imageContainer.style.display = 'block';
    loadImagesBySubtab(subtabName);
}

// Event listener for 'All Collection' button
allCollectionsBtn.addEventListener('click', function() {
    imageContainer.style.display = 'block';
    loadAllImages();
    createAddBox.style.display = 'none'; // Hide create-add
});

// Event listener for 'Flora Collection' tab
floraTab.addEventListener('click', function() {
    const floraSubTabNames = ['Algae', 'Seagrass', 'Mangrove', 'Beach Forest Plant'];
    subTabsContainer.innerHTML = createSubTabs(floraSubTabNames);
    subTabsContainer.style.display = 'block';
    imageContainer.style.display = 'none';

    // Change tab text colors
    changeTabTextColors(floraTab, faunaTab);
    
    subTabsContainer.style.overflowX = 'auto'; // Ensure overflow detection
    if (subTabsContainer.scrollWidth > subTabsContainer.clientWidth) {
        scrollForwardBtn.style.display = 'block';
    } else {
        scrollForwardBtn.style.display = 'none';
    }



    // Add event listeners to subtabs
    const subTabs = document.querySelectorAll('.subTab');
    subTabs.forEach(tab => {
        tab.addEventListener('click', handleSubTabClick);
    });

    // Load images for 'Algae' when 'Flora Collection' tab is clicked
    handleSubTabClick({ target: { innerText: 'Algae' } });

    createAddBox.style.display = 'block'; // Show create-add
});

// Event listener for 'Fauna Collection' tab
faunaTab.addEventListener('click', function() {
    const faunaSubTabNames = ['Fish', 'Mollusk', 'Sponge', 'Athropods', 'Zhinederms', 'Cnidarians', 'Reptiles', 'Marine Mammals'];
    subTabsContainer.innerHTML = createSubTabs(faunaSubTabNames);
    subTabsContainer.style.display = 'block';
    imageContainer.style.display = 'none';

    // Change tab text colors
    changeTabTextColors(faunaTab, floraTab);


    subTabsContainer.style.overflowX = 'auto'; // Ensure overflow detection
    if (subTabsContainer.scrollWidth > subTabsContainer.clientWidth) {
        scrollForwardBtn.style.display = 'block';
    } else {
        scrollForwardBtn.style.display = 'none';
    }

    // Add event listeners to subtabs
    const subTabs = document.querySelectorAll('.subTab');
    subTabs.forEach(tab => {
        tab.addEventListener('click', handleSubTabClick);
    });

    // Load images for 'Fish' when 'Fauna Collection' tab is clicked
    handleSubTabClick({ target: { innerText: 'Fish' } });

    createAddBox.style.display = 'block'; // Show create-add
});



document.getElementById('searchButton').addEventListener('click', function() {
    var searchTerm = document.getElementById('searchInput').value;

    // AJAX request to send search term to PHP script
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update the content with the search results
                document.getElementById('displayCollections').innerHTML = xhr.responseText;
            } else {
                console.error('There was a problem with the request.');
            }
        }
    };

    xhr.open('POST', 'all_collection.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('searchInput=' + searchTerm + '&searchButton=Search');
});


function loadImagesBySearch() {
    const searchTerm = searchInput.value.trim();

    if (searchTerm !== '') {
        fetch(`all_collections.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `searchInput=${searchTerm}&searchButton=Search`
        })
        .then(response => response.text())
        .then(data => {
            imageContainer.innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } else {
        loadAllImages(); // Load all images if search input is empty
    }
}

// Event listener for search button click
searchButton.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission
    loadImagesBySearch();
});

// Event listener for pressing 'Enter' key in search input
searchInput.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Prevent form submission
        loadImagesBySearch();
    }
});
  

  </script>
</body>
</html>
