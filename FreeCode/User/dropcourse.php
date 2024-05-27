<?php
session_start();
require('db_connect.php');
if (!isset($_SESSION['username']) && !isset($_SESSION['course_name'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$courseName=$_SESSION['course_name'];
$courseName = $con->real_escape_string($courseName);
$username = $con->real_escape_string($username);

$query = "DELETE FROM course_name WHERE username = '$username' AND course_name = '$courseName'";
$result=$con->query($query);

if ($result) {
    header('Location: coursenavbar.php');
    exit();
} else {
    echo "Failed to drop the course.";
}
?>