<?php
// Start the session
session_start();
require('db_connect.php');

$error = ""; // Initialize error variable

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and execute the SQL query
    $stmt = $con->prepare("SELECT * FROM Users WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["UPassword"];
        $userType = $row["UserType"];

        // Verify the password
        if (password_verify($password, $storedPassword)) {
            // Password is correct, log the user in
            $_SESSION["userid"] = $row["UserID"];
            $_SESSION["username"] = $row["Username"];
            $_SESSION["usertype"] = $userType;

            // Redirect to the user's dashboard or homepage
            header("Location:user-home.php");
            exit;
        } else {
            // Password is incorrect, display an error message
            $error = "Invalid username or password.";
        }
    } else {
        // User not found, display an error message
        $error = "Invalid username or password.";
    }

    $stmt->close();
}

// Handle sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // Retrieve sign-up form data
    $username = $_POST["Username"];
    $email = $_POST["Email"];
    $password = password_hash($_POST["UPassword"], PASSWORD_DEFAULT);
    $registrationDate = date("Y-m-d H:i:s");

    // Prepare and execute the SQL query
    $stmt = $con->prepare("INSERT INTO Users (Username, Email, Upassword) VALUES (?, ?, ?)");
    $stmt->bind_param("ssssi", $username, $email, $password);

    if ($stmt->execute()) {
        // Sign-up successful, redirect to the login page
        header("Location: login.php");
        exit;
    } else {
        // Sign-up failed, display an error message
        $error = "Error creating your account. Please try again.";
    }

    $stmt->close();
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/login-Sigup.css">
    <title>Login and Sign Up</title>
</head>
<body>
    <?php if (!empty($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    
    <div class="container">
        <div class="forms-container">
            <div class= "signin-signup">
            <form class="sign-in-form" method="post">
            <input type="hidden" name="login" value="1">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" required>
            </div>
            <input type="submit" class="btn solid">
          </form>
          <form class="sign-up-form" method="post" >
            <h2 class="title">Sign up</h2>
            <input type="hidden" name="signup" value="1">
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" required>
            </div>
            <input type="submit" class="btn solid">
          </form>
            </div>
        </div>

        <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Free Code</h3>
            <p>
              Welcome to the Free Code website. Complete your Sign Up to access the website.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="">
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Free Code</h3>
            <p>
              Welcome to the Free Code website. Complete your Sign In to access the website.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="">
        </div>
      </div>
    </div>
    
</body>
</html>
