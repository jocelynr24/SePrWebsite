<?php
session_start();
// Go back to the index
header("Location: ../../admin_courseadd.php");

// Retrieve the data
$coursename = $_POST["coursename"];
$shortdesc = $_POST["shortdesc"];
$longdesc = $_POST["longdesc"];
$submit = $_POST["submit"];
$token = $_POST["token"];

$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

// If the user is authorized to access this page
if(($submit=="Add course") && isset($_SESSION["logged"]) && ($_SESSION["role"] == 1) && ($_SESSION['token'] == $token)){
	// PDO connect method
	// Connection to the database
	require "../config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	// We check if everything is correct
	if((strpos($coursename, '<script>') === false) && !empty($coursename) &&
	   (strpos($shortdesc, '<script>') === false) && !empty($shortdesc) &&
	   (strpos($longdesc, '<script>') === false) && !empty($longdesc)){
		
		$request_chkcourse = $PDO->prepare('SELECT name FROM course WHERE name=:coursename');
		$request_chkcourse->execute(array(
		'name' => $coursename
		));
		
		// If the course is in the database
		if ($request_chkcourse->rowCount() >= 1) {
			$_SESSION["ack_addcourse"] = "This course already exists!";
		} else {
			$request_addcourse = $PDO->prepare('INSERT INTO course (id, name, description_short, description_long) VALUES (NULL, :coursename, :shortdesc, :longdesc)');
			$request_addcourse->execute(array(
				'coursename' => $coursename,
				'shortdesc'=> $shortdesc,
				'longdesc'=> $longdesc,
				));
			$_SESSION["ack_addcourse"] = "Course added!";
		}
	} else {
		$_SESSION["ack_addcourse"] = "Parameters were invalid!";
	}

}

?>