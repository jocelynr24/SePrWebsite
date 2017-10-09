<?php

// If the user is authorized to access this page
if(isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
	// PDO connect method
	// Connection to the database
	require "includes/config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);

	// Request the useful data
	$request = $PDO->prepare('SELECT name, description_short, description_long FROM course WHERE id=:id');
	$request->execute(array(
		'id' => $_GET['id']		
		));

	// If the user is in the database
	if ($request->rowCount() == 1) {
		if($row = $request->fetch(PDO::FETCH_ASSOC)){
			$name = $row['name'];
			$shortdesc = $row['description_short'];
			$longdesc = $row['description_long'];
		}
		$request->closeCursor();
		$course_exists = TRUE;
	} else {
		$course_exists = FALSE;
	}
	
}

?>