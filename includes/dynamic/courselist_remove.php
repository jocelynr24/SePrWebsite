<?php
session_start();
// Go back to the index
header("Location: ../../removecourselist.php");

// Retrieve the data
$id = $_GET["id"];
$course = $_GET["idcourse"];
$token = $_GET["token"];

if(isset($_SESSION["logged"]) && ($_SESSION["role"] == 1) && ($_SESSION['token'] == $token)){
	
	require "../config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	
	$request_remove = $PDO->query('DELETE FROM course_list WHERE id_User =' .$id.' AND id_Course='.$course.' ;	');




	
}



?>