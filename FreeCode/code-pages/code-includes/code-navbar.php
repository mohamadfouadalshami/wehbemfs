<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeCode.navbar</title>
    <link rel="stylesheet" href="css/code-navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/menu.js"></script>
</head>
<body>

<nav>
  <div class="logo">
    <a href="web-code-page.php" class="haha"><img src="assets/logo.png" alt="Logo" leading="lazy"></a>
  </div>

  <div class="search-bar">
  <form action="navbar.php" method="GET">
    <input type="text" name="query" placeholder="Search..." required>
    <button type="submit"><i class="fas fa-search"></i></button>
  </form>
  </div>

  <div class="menu-icon">
    <i class="fas fa-bars"></i>
  </div>

<div class="sidebar-menu ">
  <div class="logo">
   <img src="assets/logo.png" alt="Logo" leading="lazy">
  </div>
  <div class="cancel-icon">
    <i class="fas fa-times"></i>
  </div>
  <hr class="separator">
  <ul>
    <li><a href="../../Home-page.html" class="show">Home</a></li>
    <li><a href="#" class="show">Services</a></li>
    <li><a href="#" class="show">Contact</a></li>
    <li><a href="#" class="show">About</a></li>
  </ul>
  <hr class="separator">
</div>

</nav>


<!-- ............... end nav bar................. -->

<hr class="separator">

<!--............ below navbar class................-->
<!--this will contain what code contain and sections -->

<?php
 require('db_connect.php');
 $query = "SELECT CS_title FROM contentsection";
 $result = mysqli_query($con, $query);
 
 if ($result) {
   echo '<nav class="below-navbar">';
   echo '<ul class="nav-list">';
   
   while ($row = mysqli_fetch_assoc($result)) {
       $name = $row['CS_title'];
       
       // Check if the current link matches the current page
       $activeClass = '';
       if ($name === basename($_SERVER['PHP_SELF'], '.php')) {
           $activeClass = 'active';
       }
       
       echo '<li><a href="'.$name.'.php" class="'.$activeClass.'">'.$name.'</a></li>';
   }
   
   echo '</ul>';
   echo '</nav>';
 } else {
   echo 'Error retrieving navigation content from the database.';
 }
 
 mysqli_close($con);
?>

<!--............ End  below-navbar class................-->

<hr class="separator">

<!--.......................................-->

</body>


</html>