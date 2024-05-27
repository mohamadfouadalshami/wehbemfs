<?php
require('db_connect.php');
$message = '';
$message1='';

session_start();

if (isset($_SESSION['username']) && isset($_POST['Newusername']) && isset($_POST['password'])) {
    $username = $_SESSION['username'];
    $newUsername = $_POST['Newusername'];
    $password = $_POST['password'];

    $newUsername = $con->real_escape_string($newUsername);

    $query = "SELECT * FROM Users WHERE Username='$username'";

    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if ($hashedPassword == $password) {
            $updateQuery = "UPDATE Users SET Username='$newUsername' WHERE Username='$username'";

            if ($conn->query($updateQuery)) {
                $_SESSION['username'] = $newUsername; // Update the session username
                $message1 = 'Your username has been changed.';
            } else {
                $message = 'Error updating username: ' . $conn->error;
            }
        } else {
            $message = 'Please enter the correct password.';
        }
    } else {
        $message = 'Username not found.';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>ChangeUserName</title>
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
    <h2>Change Username</h2>
    <form method="post" action="changeUsername.php">
      
      <input type="text" name="Newusername" placeholder="Enter New Username." required>
      <div class="password-container">
         <input type="password" name="password" id='Upassword' placeholder="Enter Password." required>
         <i class="password-toggle-icon fas fa-eye" onclick="togglePasswordVisibility('Upassword')"></i>
      </div>
      <button type="submit">Change</button>
    </form>
    <P>Please make sure to put correct password.<a href="changePassword.php"><br> Do you want to Change Password ?</a> </P>
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