<?php
session_start();
include('../includes/db_connect.php');
include('user-navbar.html');


//$username = $_SESSION['username'];
$username = 'wmahmoud7003';


// if (!isset($_SESSION['username'])) {
//   header("Refresh: 0");
//   header("Location:../logout.php");
//   exit();
// }
$query = "SELECT * FROM course_name WHERE username = '$username'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "
 <html>
  <style>
      .registercourses {
          display: inline-block;
          width: 100%;
          padding: 0;
          margin: 0;
          margin-top: -20px; /* Add this line to remove the top margin */
      }
        
        .registercourses ul {
          padding: 0;
          margin: 0;
          display: flex;
          list-style: none;
        }
        
        .registercourses li {
          padding: 5px;
          color: white;
        }
        .nameofcourses ul {
          padding: 0;
          margin: 0;
          list-style: none;
        }
        .nameofcourses ul li {
          padding: 5px;
          color: white;
        }
        .nameofcourses ul li a {
          color: white;
          text-decoration: none;
        }
        
        .nameofcourses ul li a:hover {
         background:linear-gradient(180deg, #ffcc00, #ffcc00);
         color:black;
        }
        .course_card {
          margin: 10px;
          display: flex;
          justify-content: center;
          flex-wrap: wrap;
          text-align:center;
      }
  
      .card {
        background:linear-gradient(180deg, #ffcc00, #ffcc00);
        border-radius:8px;
        color:white;
        position: relative;
        width: 300px;
        height: 300px;
        background-color: #f5f5f5;
        padding: 10px;
        margin: 30px;
      }
      .card-contect{
        margin-top: 80px;
      }
      .button-course {
        display: inline-block;
        padding: 10px 20px;
        background-color: #f5f5f5;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
      }
    
      .button-course:hover {
        background-color: #ddd;
      }
      .drop-icon {
        display: inline-block;
        padding: 5px 10px;
        background-color: #f5f5f5;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
        position: absolute;
        top: 10px;
        right: 10px;
        color:red;
      }
    
      .drop-icon:hover {
        background-color: #ddd;
      }
  </style>
  
    <body>
      <div class='registercourses'>
      <div class='course_card'>";
      
      mysqli_data_seek($result, 0); // Reset the result pointer to the beginning

      while ($row = mysqli_fetch_assoc($result)) {
          $courseName = $row['course_name'];
          $_SESSION['course_name']= $courseName;
       echo "
       <div class='card'>
           <a href='dropcourse.php' class='drop-icon'>Drop <i class='fas fa-times-circle'></i></a>
           <div class='card-contect'>
             <h1>$courseName</h1>
              <a href='courses/' $courseName '.html' class='button-course'>Start Learning</a>
           </div>
       </div>
       ";
      }
    echo'
      </div>
    </body>
 </html>';
 
} else {
    echo "No courses registered for $username.";
}

mysqli_close($con);

?>
