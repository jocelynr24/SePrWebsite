<?php
session_start();
// Go back to the index
header("Location: ../../admin_useradd.php");

// Retrieve the data
$login = $_POST["login"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$password = $_POST["password"];
$email = $_POST["email"];
$role = $_POST["role"];
$check = $_POST["check"];
$token = $_POST["token"];

$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

// If the user is authorized to access this page
if(($check=="Add user") && isset($_SESSION["logged"]) && ($_SESSION["role"] == 1) && ($_SESSION['token'] == $token)){
	// PDO connect method
	// Connection to the database
	require "../config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	// We check if everything is correct
	if((strpos($login, '<script>') === false) && !empty($login) &&
	   (strpos($firstname, '<script>') === false) && !empty($firstname) &&
	   (strpos($lastname, '<script>') === false) && !empty($lastname) &&
	   (strpos($password, '<script>') === false) && !empty($password) &&
	   (strpos($email, '<script>') === false) && !empty($email) && (filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match($pattern, $email) === 1)){
		
		$request_chkuser = $PDO->prepare('SELECT login FROM users WHERE login=:login');
		$request_chkuser->execute(array(
		'login' => $login
		));
		
		// If the user is in the database
		if ($request_chkuser->rowCount() >= 1) {
			$_SESSION["ack_addusr"] = "This user already exists!";
		} else {
			$request_adduser = $PDO->prepare('INSERT INTO users (id, login, password, email, role, firstname, lastname, picture_name) VALUES (NULL, :login, :password, :email, :role, :firstname, :lastname, NULL)');
			$request_adduser->execute(array(
				'login' => $login,
				'firstname'=> $firstname,
				'lastname'=> $lastname,
				'password'=> MD5($password),
				'email'=> $email,
				'role'=> $role
				));
			$_SESSION["ack_addusr"] = "User added!";
		}
	} else {
		$_SESSION["ack_addusr"] = "Parameters were invalid!";
	}

}

?>