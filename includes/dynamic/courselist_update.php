<?php
session_start();
// Go back to the index
header("Location: ../../courses_administration.php");

// Retrieve the data



$teacher = $_POST["teacher"];
$course = $_POST["course"];
$course_student = $_POST["course_student"];
$student = $_POST["student"];


require "../config/config.php";
$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);



if($_POST["teacher"] != null){
$request_insert = $PDO->query('INSERT INTO course_list VALUES ('.$teacher.','.$course.');');
} else {
$request_insert2 = $PDO->query('INSERT INTO course_list VALUES ('.$student.','.$course_student.');' );
}
	



?>