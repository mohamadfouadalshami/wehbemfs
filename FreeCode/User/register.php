<?php
session_start();
require('db_connect.php');
$message = '';
$message1 = '';

if (isset($_POST['course_name'])) {
    $username = $_SESSION['username'];
    $courseName = $_POST['course_name'];

    $query = "SELECT * FROM course_name WHERE course_name = '$courseName' AND username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $message = "You have already registered for this course.";
    } else {
        $query1 = "INSERT INTO course_name (username,course_name) VALUES ('$username','$courseName')";
        $result = $conn->query($query1);
        if ($result) {
            $message1 = "Course registered successfully!";
           // header('Location:courses/coursenavbar.php');
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Course Registration</title>
    
</head>
<style>
    
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
    }

    h2 {
        color: #333;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }

    select, input[type="text"] {
        width: 300px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px;
        font-size: 14px;
    }

    input[type="submit"] {
        background-color: #ffcc00;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #ffcc00;
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
</style>
<body>
<a href="User-courses.php" class="exit-icon">&#10006;</a>
<h2>Course Registration</h2>
    <form method="POST" action="register.php">        
        <label for="course_name">Course Name:</label>
        <select name="course_name" required>
            <option value="">Select a course</option>
            <option value="Python">Python</option>
            <option value="Java">Java</option>
            <option value="C++">C++</option>
            <option value="Web_Development">Web Development</option>
            <option value="Data_Science">Data Science</option>
            <option value="Ethical_Hacking">Ethical Hacking</option>
            <option value="Machine_Learning">Machine Learning</option>
            <option value="Mobile_App_Development">Mobile App Development</option>
            <option value="React">React</option>
        </select><br><br>

        <input type="submit" value="Register">
    </form>
    <?php
    if ($message) {
        echo '<p style="color: red">' . $message . '</p>';
    } else if ($message1) {
        echo '<p style="color: green">' . $message1 . '</p>';
    }
    ?>
</body>
</html>