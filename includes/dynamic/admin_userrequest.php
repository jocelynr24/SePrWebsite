<?php

// If the user is authorized to access this page
if(isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
	// PDO connect method
	// Connection to the database
	require "includes/config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);

	// Request the useful data
	$request = $PDO->prepare('SELECT login, email, role, firstname, lastname, picture_name FROM users WHERE id=:id');
	$request->execute(array(
		'id' => $_GET['id']		
		));

	// If the user is in the database
	if ($request->rowCount() == 1) {
		if($row = $request->fetch(PDO::FETCH_ASSOC)){
			$login = $row['login'];
			$email = $row['email'];
			$role = $row['role'];
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$picture_name = $row['picture_name'];
		}
		$request->closeCursor();
		$user_exists = TRUE;
	} else {
		$user_exists = FALSE;
	}
	
}

?>