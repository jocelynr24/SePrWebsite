<?php
session_start();
// Go back to the index
header("Location: ../../admin_usercourse.php");

// Retrieve the data
$teacher = $_POST["teacher"];
$course = $_POST["course"];
$course_student = $_POST["course_student"];
$student = $_POST["student"];
$token = $_POST["token"];

if(isset($_SESSION["logged"]) && ($_SESSION["role"] == 1) && ($_SESSION['token'] == $token)){
	require "../config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	if($_POST["teacher"] != null){
		$request_insert = $PDO->query('INSERT INTO course_list VALUES ('.$teacher.','.$course.');');
		$_SESSION["ack_addtea"] = "Teacher added to this course!";
	} else {
		$request_insert2 = $PDO->query('INSERT INTO course_list VALUES ('.$student.','.$course_student.');' );
		$_SESSION["ack_addstu"] = "Student added to this course!";
	}
}

?>