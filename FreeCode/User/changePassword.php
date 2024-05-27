<?php
require('db_connect.php');
$message = '';
$message1 = '';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newpassword'];
    $confirmPassword = $_POST['confirmpassword'];

    $username = $con->real_escape_string($username);

    $usernameQuery = "SELECT * FROM Users WHERE Username = '$username'";
    $usernameResult = $con->query($usernameQuery);

    if ($usernameResult->num_rows > 0) {
        $row = $usernameResult->fetch_assoc();
        $oldPasswordFromDB = $row['password'];

        if ($newPassword === $confirmPassword) {
            if ($oldPassword === $oldPasswordFromDB) {
                $updateQuery = "UPDATE Users SET UPassword='$newPassword' WHERE Username = '$username'";
                $updateResult = $con->query($updateQuery);

                if ($updateResult) {
                    $message1 = "Password updated successfully!";
                } else {
                    $message = "Failed to update password.";
                }
            } else {
                $message = "Incorrect old password.";
            }
        } else {
            $message = "New password and confirm password do not match.";
        }
    } else {
        $message = "Username does not exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>ChangePassword</title>
</head>

<script>
  function togglePasswordVisibility(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.nextElementSibling;
    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
</script>

<style>
    .login-container {
    position: relative;
  }
  
  .exit-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #999;
    font-size: 24px;
    text-decoration: none;
  }
  
  .exit-icon:hover {
    color: #666;
  }
  
  body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #333
  }
  
  .login-container {
    width: 400px;
    padding: 40px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  }
  
  h2 {
    text-align: center;
  }
  
  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #ffCC00;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  button[type="submit"]:hover {
    background-color: #ffCC00;
  }
  
  p {
    text-align: center;
    margin-top: 10px;
  }
  
  a {
    color: #ffCC00;
    text-decoration: none;
  }
  
  a:hover {
    text-decoration: underline;
  }
  .password-container {
    position: relative;
  }

  .password-toggle-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    color: #999;
    cursor: pointer;
  }

  .password-toggle-icon:hover {
    color: #666;
  }
</style>
<body>
<div class="login-container">
    <a href="user-home.php" class="exit-icon">&#10006;</a>
    <h2>Change Password</h2>
    <form method="post" action="changePassword.php">
      <div class="password-container">
        <input type="password" name="oldPassword" id='oldPassword' placeholder="Enter old Password." required>
           <i class="password-toggle-icon fas fa-eye" onclick="togglePasswordVisibility('oldPassword')"></i>
      </div>
  
      <div class="password-container">
        <input type="password" name="newpassword" id="newpassword" placeholder="Enter new password." required>
           <i class="password-toggle-icon fas fa-eye" onclick="togglePasswordVisibility('newpassword')"></i>
      </div>
  
      <div class="password-container">
        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Enter new password to confirm" require>
           <i class="password-toggle-icon fas fa-eye" onclick="togglePasswordVisibility('confirmpassword')"></i>
      </div>
  
      <button type="submit">Change</button>

    </form>
    <P>Please make sure to put correct password.<a href="changePassword.php"><br> Do you want to Change Username ?</a> </P>
    <?php
      if ($message) {
        echo '<p style="color: red">' . $message . '</p>';
      }else if($message1){
        echo '<p style="color: green">' . $message1 . '</p>';
      }
    ?>
  </div>
</body>

</html>