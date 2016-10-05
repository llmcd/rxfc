<?php

  $dbhost = "localhost"; //host name. do not change this!
  $dbuser = "videoupload"; //username
  $dbpass = "video"; //password
  $dbname = "test"; //database name
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
