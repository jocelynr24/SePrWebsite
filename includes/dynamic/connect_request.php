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
	$request = "SELECT * FROM users WHERE login='$login' AND password='$password'";
	$ans = $mysql->query($request);
	
	// If $count = 1, the connection succeeded
	$count = mysqli_num_rows($ans);
	if($count==1){
		$_SESSION['logged'] = 1;
		$_SESSION['user'] = $login;
		//$_SESSION['role'] = ; // To do
	}
}
?>
