<?php

// If the user is connected
if(isset($_SESSION["logged"])){
	// PDO connect method
	// Connection to the database
	require "includes/config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	// Request the useful data
	$request = $PDO->prepare('SELECT firstname, lastname, email, picture_name FROM users WHERE login=:login');
	$request->execute(array(
		'login' => $_SESSION['user']		
		));
	
	// If the user is in the database
	if ($request->rowCount() == 1) {
		if($row = $request->fetch(PDO::FETCH_ASSOC)){
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$email = $row['email'];
			$picture_name = $row['picture_name'];
		}
		$request->closeCursor();
	}
}

?>