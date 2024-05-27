<?php
session_start();

include('../includes/db_connect.php');
include('user-navbar.html');

// if (!isset($_SESSION['username'])) {
//     header("Refresh: 0");
//     header("Location: login-signup.php");
//     exit();
//   }

  //$username = $_SESSION['username'];
  $username = 'Mahmoud wehbe';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user-home.css">
    <title>User Page - FreeCode</title>
</head>

<body>
    <div class="center-container">
        <div class="welcome-container">
            <h2>Welcome, <span class="username"><?php echo $username; ?></span></h2>
            <p class="message">You have successfully logged in to your account.</p>
        </div>
    </div>
</body>
</html>