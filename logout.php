<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Judson:wght@700&display=swap" rel="stylesheet">
    <title>Logout</title>
    <style>
        /* Styles for the logout button */
        .logout-button {
            position: fixed;
            top: 321px;
            left: 757px;
            background-color: #EB4343;
            width: 85px; /* Set the width */
            height: 37px; /* Set the height */
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>

<nav class="homepanel"></nav>
<nav class="navbar">
  <ul>
    <li><a href="home_page.php">Home</a></li>
    <li><a href="collection.php">Collection</a></li>
    <li><a href="activity_log.php">Activity log</a></li>
    <li><a href="logout.php">Settings</a></li>
  </ul>
</nav>

<button class="logout-button" onclick="confirmLogout()">Logout</button>

<script>
    function confirmLogout() {
        // Display confirmation dialog
        if (confirm("Are you sure you want to log out?")) {
            // Redirect to login.php if user confirms
            window.location.href = 'login.php';
        }
    }
</script>
</body>
</html>
