<?php
require('db_connect.php');
$message = '';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['username'])) {
        $message = "You must be logged in to submit feedback.";
    } else {
        $username = $_SESSION['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $feedback = $_POST['feedback'];

        
        $name = $con->real_escape_string($name);
        $email = $con->real_escape_string($email);
        $feedback = $con->real_escape_string($feedback);

        $insertQuery = "INSERT INTO feedback (name, email, feedbacktext) VALUES ('$name', '$email', '$feedback')";
        $insertResult = $con->query($insertQuery);

        if ($insertResult) {
            $message = "Thank you for your feedback!";
        } else {
            $message = "Failed to submit feedback.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #333;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-container {
            max-width: 450px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative; 
        }

        .form-container .exit-icon { 
            position: absolute;
            top: 10px;
            right: 10px;
            color: #999;
            font-size: 24px;
            text-decoration: none;
        }

        .form-container .exit-icon:hover {
            color: #666;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease-in-out;
            padding-right:3px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            outline: none;
            border-color: #4CAF50;
        }

        textarea {
            height: 100px;
        }

        .submit-button {
            background-color: #ffCC00;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .submit-button:hover {
            background-color: #ffCC00;
        }

        .message {
            margin-top: 20px;
            font-weight: bold;
        }

        .message-success {
            color: #008000;
        }

        .message-error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Feedback Form</h1>
        <?php if (!empty($message)) : ?>
            <p class="message <?php echo $insertResult ? 'message-success' : 'message-error'; ?>"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <a href="user-home.php" class="exit-icon">&#10006;</a>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="feedback">Feedback:</label>
                <textarea name="feedback" id="feedback" rows="4" cols="50" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit Feedback" class="submit-button">
            </div>
        </form>
    </div>
</body>
</html>