<?php
session_start();
// Go back to the connect page
header("Location: ../../connect.php");

// Retrieve the data
$login = $_POST["login"];
$password = $_POST["password"];
$check = $_POST["check"];

// If the user really pushed the "Connect" button
if($check=="Connect"){
	// PDO connect method
	// Connection to the database
	require "../config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	// Request to the database
	$request_login = $PDO->prepare('SELECT login, password FROM users WHERE login=:login AND password=:password');
	$request_login->execute(array(
		'login' => $login,
		'password' => MD5($password)
		));
		
	// If the user is in the database
	if ($request_login->rowCount() == 1) {
		$_SESSION['logged'] = 1;
		$_SESSION['user'] = $login;
		
		$request_role = $PDO->query("SELECT role FROM users WHERE login='$login'");
		if ($row = $request_role->fetch(PDO::FETCH_ASSOC)){
			$_SESSION['role'] = $row['role'];
		}
		$request_role->closeCursor();
	}
	
	if($_SESSION['logged'] == 1){
		$_SESSION["ack_connect"] = "Ok";
	} else {
		$_SESSION["ack_connect"] = "Bad login and password";
	}
}

?>

