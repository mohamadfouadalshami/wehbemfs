<?php
$servsername="localhost";
$username="root";
$password="";
$database="FreeCode";

$con = mysqli_connect($servsername,$username,$password,$database);
if (!$con)
{
        die('Could not connect: ' );  
} 

?>