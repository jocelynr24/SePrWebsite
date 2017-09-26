<?php
session_start();
// Go back to the index
header("Location: ../../index.php");
  
// Retrieve the data
$login = $_POST["login"];
$password = $_POST["password"];
$check = $_POST["check"];

if($check=="Connect"){ // If the user really pushed the "Connect" button
	// Connection to the database
	require "../config/config.php";
	$mysql = new MySQLi($server, $user, $pass, $base);
	// Request to the database
	$request_login = "SELECT * FROM users WHERE login='$login' AND password='$password'";
	$answer_login = $mysql->query($request_login);
	
	// If $count = 1, the connection succeeded
	$count = mysqli_num_rows($answer_login);
	if($count==1){
		$_SESSION['logged'] = 1;
		$_SESSION['user'] = $login;
		
		$request_role = "SELECT role FROM users WHERE login='$login'";
		$answer_role=$mysql->query($request_role);
		if (NULL != ($row = $answer_role->fetch_array())) { 
			$_SESSION['role'] = $row['role'];
		} 
		$mysql->close();
	}
}
?>