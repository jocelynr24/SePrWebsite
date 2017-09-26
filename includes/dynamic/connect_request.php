<?php
session_start();
// Go back to the index
header("Location: ../../index.php");
  
// Retrieve the data
$login = $_POST["login"];
$password = $_POST["password"];
$check = $_POST["check"];

// If the user really pushed the "Connect" button
if($check=="Connect"){
/*  //MySQLi connect method
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
}*/

	// PDO connect method (safer)
	// Connection to the database
	require "../config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	// Request to the database
	$request_login = $PDO->prepare('SELECT * FROM users WHERE login=:login AND password=:password');
	$request_login->execute(array(
		'login' => $login,
		'password' => $password
		));
		
	// Something found in the database
	if ($request_login->rowCount() > 0) {
		$_SESSION['logged'] = 1;
		$_SESSION['user'] = $login;
		
		$request_role = $PDO->query("SELECT role FROM users WHERE login='$login'");
		if ($row = $request_role->fetch(PDO::FETCH_ASSOC)){
			$_SESSION['role'] = $row['role'];
		}
		$request_role->closeCursor();
	}
}

?>

