<?php
session_start();
// Go back to the index
header("Location: ../../admin_courselist.php");

// Retrieve the data
$id = $_POST["id"];
$delete = $_POST["delete"];
$check = $_POST["check"];
$token = $_POST["token"];

// If the user is authorized to access this page
if(($check=="Delete course") && isset($_SESSION["logged"]) && ($_SESSION["role"] == 1) && ($_SESSION['token'] == $token)){
	// PDO connect method
	// Connection to the database
	require "../config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	// We check if everything is correct
	if($delete == "yes"){
		$request_delete = $PDO->prepare('DELETE FROM course WHERE id=:id');
		$request_delete->execute(array(
		'id' => $id
		));
		$_SESSION["ack_delcourse"] = "Course deleted!";
	} else {
	$_SESSION["ack_delcourse"] = "Course not deleted!";
	}
}

?>