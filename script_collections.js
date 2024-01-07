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
    fetch(`display_image.php?subtab=${subtabName}`)
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

// Additional code for handling clicks
document.getElementById('createProfileLink').addEventListener('click', function(event) {
    event.stopPropagation(); // Prevent default link behavior
});

document.getElementById('createAddBox').addEventListener('click', function() {
    window.location.href = 'create-profile.html'; // Redirect to create-profile.html
});

window.addEventListener('load', function() {
    loadAllImages();
    createAddBox.style.display = 'none'; // Hide create-add initially
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


