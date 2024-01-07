<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginn.css">
    <title>Admin Login</title>
</head>
<section>
  <div id="login-page">
    <div class="login">
      <h2 class="login-title">Login</h2>
      <p class="notice">Please login to access the system</p>
      <form class="form-login" method="POST" action="login-security.php">
        <label for="username">Username</label>
        <div class="input-username">
          <input type="text" name="username" placeholder="Enter your username" required>
        </div>
        <label for="password">Password</label>
        <div class="input-password">
          <input type="password" name="password" placeholder="Enter your password" required>
        </div>
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
</html>
