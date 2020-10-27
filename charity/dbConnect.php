<?php
// connection constants
   $hostname ="localhost";
   $hostuser ="root";
   $hostpass ="";
   $dnmane ="carwashproject";
  

 // Create the connection 
 
  $conn = new mysqli($hostname, $hostuser, $hostpass, $dnmane);  

 // Check connection
 
  if($conn->connect_error){
    die("Connection failed".$conn->error);
  }else{
  	//print"Connection Successfull";
    $error = array();
  } 




?>