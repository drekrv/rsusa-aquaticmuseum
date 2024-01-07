<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Collection</title>
  <link rel="stylesheet" href="collection-style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
  <link rel="stylesheet" href="style-admin.css">
  <link rel="stylesheet" href="searchcollection.css">
  <link href="https://fonts.googleapis.com/css2?family=Judson:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-xxx" crossorigin="anonymous">

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


<div class="container">
    <div id="floraTab" class="tab">Flora Collection</div>
    <div id="faunaTab" class="tab">Fauna Collection</div>
    <div class="scroll-buttons">
        <button id="scrollBackward" class="backward">&lt;</button>
        <button id="scrollForward" class="forward">&gt;</button>
    </div>
    <div id="subTabsContainer" class="subTabsContainer"></div>
</div>
  

  <div class="create-add" id="createAddBox">
    <a href="create-profile.html" id="createProfileLink">
    <i class="fas fa-plus-circle"></i>
    <span>Click to add Collection</span>
    </a>
  </div>

<div class="all-collections">All Collection</a>
</div>

 
<form method="POST" action="all_collections.php" class="search-form">
    <div class="search-bar">
        <input type="text" name="searchInput" id="searchInput" placeholder="Search...">
        <button type="submit" name="searchButton" id="searchButton">Search</button>
    </div>
</form>

<div class="image-container" id="displayCollections">
    <!-- Include the PHP file to display images -->
 
  </div>
  

  <script src="script_collections.js"></script>
</body>
</html>
