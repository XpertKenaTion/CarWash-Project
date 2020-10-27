<?php
session_start();
require "dbConnect.php";

print $_POST["messages"];
if(isset($_POST["messages"])){

	$fullname = $_POST["fullname"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$messages =  $_POST["messages"];
	
	require "mailprocesses/sendMail.php";
	$user_insert = "INSERT INTO messages(fullname, email,phone, messages) VALUES('$fullname','$email','$phone','$messages')";

	if($conn->query($user_insert) === TRUE){
		       header("Location: homecontact.html");
		        exit();
		      
	}else{
		print $conn->error;
	}
}



?>