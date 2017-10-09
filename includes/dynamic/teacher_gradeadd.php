<?php
session_start();

// Retrieve the data
$id_User = $_POST["id_User"];
$id_Course = $_POST["id_Course"];
$name_Course = $_POST["name_Course"];
$grade = $_POST["grade"];
$check = $_POST["check"];

// Go back to the index
header("Location: ../../teacher_grade.php?id=".$id_Course."&name=".$name_Course."");

$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

// If the user is authorized to access this page
if(($check=="Add grade") && isset($_SESSION["logged"]) && ($_SESSION["role"] == 2) && ($_SESSION['token'] == $token)){
	// PDO connect method
	// Connection to the database
	require "../config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	// We check if everything is correct
	if((strpos($id_User, '<script>') === false) && !empty($id_User) &&
	   (strpos($id_Course, '<script>') === false) && !empty($id_Course) &&
	   (strpos($grade, '<script>') === false) && !empty($grade)){
		
		$request_adduser = $PDO->prepare('UPDATE course_list SET grade=:grade WHERE id_User=:id_User and id_Course=:id_Course');
		$request_adduser->execute(array(
			'grade'=> $grade,
			'id_User' => $id_User,
			'id_Course'=> $id_Course
			));
		$_SESSION["ack_addgrade"] = "Grade updated!";
	}
	else {
		$_SESSION["ack_addgrade"] = "Parameters were invalid!";
	}

}
else {
	$_SESSION["ack_addgrade"] = "Parameters were invalid!";
}

?>