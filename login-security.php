<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are set in the POST request
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Validate username and password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if the entered username and password are correct
        $expectedUsername = "RSU sanagustin";
        $expectedPassword = "isdanijerik";

        if ($username === $expectedUsername && $password === $expectedPassword) {
            // Redirect to home_page.php on successful login
            header("Location: home_page.php");
            exit();
        } else {
            // Incorrect username or password
            $errorMessage = "Incorrect username or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginn.css">
    <title>Admin Login</title>

    <style>
    .error-message {
            left:20px;
            color: red;
            margin-top: 10px;
        }
    </style>

</head>
<body>
    <section>
    <div id="login-page">
            <div class="login">
                <h2 class="login-title">Login</h2>
                <form class="form-login" method="POST" action="login-security.php">
                    <label for="username">Username</label>
                    <div class="input-username">
                        <input type="text" name="username" placeholder="Enter your username" required>
                    </div>
                    <label for="password">Password</label>
                    <div class="input-password">
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <p class="error-message"><?php echo isset($errorMessage) ? $errorMessage : ''; ?></p>
                    <button type="submit">Sign in</button>
                </form>
                
                <a href="#">Forgot your password?</a>
            </div>

            <aside>
                <img src="Login turtle1.png">
                <div class="overlay-text">
                    <h1>ROMBLON STATE</h1>
                    <h2>UNIVERSITY</h2>
                    <p>digitization collections.</p>
                </div>
                <div class="wave-container">
                    <div class="wave"></div>
                    <div class="wave1"></div>
                    <div class="wave2"></div>
                    <div class="wave3"></div>
                </div>
            </aside>
        </div>
    </section>
</body>
</html>
