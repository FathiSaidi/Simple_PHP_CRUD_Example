<?php

     $hostname = "127.0.0.1";
     $username = "admin";
     $password = "123456789";
     $database = "crud";

     $con = new mysqli($hostname,$username,$password,$database);

     if(!$con){
          mysqli_error($con);
     }
     
?>

