<?php
session_start();
// Go back to the index
header("Location: ../../profile.php");

// Retrieve the data
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$email=$_POST["email"];
if(isset($_POST["file_to_remove"])){
	$file_to_remove = $_POST["file_to_remove"];
} else {
	$file_to_remove = "no";
}
$check = $_POST["check"];

$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

// If the user really pushed the "Connect" button
if($check=="Update"){
	// PDO connect method
	// Connection to the database
	require "../config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	// Booleans to check the errors
	// Changes
	$change_password = FALSE;
	$change_email = FALSE;
	$remove_picture = FALSE;
	$change_picture = FALSE;
	// Errors
	$error_picext = FALSE;
	$error_picsize = FALSE;
	$error_email = FALSE;
	$error_password = FALSE;
	
	// We check if everything is correct (password and email)
	if(($password == $confirm_password) && (strpos($password, '<script>') === false) 
		&& (strpos($email, '<script>') === false) && !empty($email)
		&& (filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match($pattern, $email) === 1)){
			
		// Change the password if input is not empty
		if(!empty($password)){
			$request_update = $PDO->prepare('UPDATE users SET password=:password WHERE login=:login');
			$request_update->execute(array(
				'password' => $password,
				'login'=> $_SESSION["user"]
			));
			$change_password = TRUE;
		}
		
		// Change the email (everytime since it is always present)
		$request_update = $PDO->prepare('UPDATE users SET email=:email WHERE login=:login');
		$request_update->execute(array(
			'email' => $email,
			'login'=> $_SESSION["user"]
		));
		$change_email = TRUE;
	} else {
		if(($password == $confirm_password) || (strpos($password, '<script>') === false)){
			$error_password = TRUE;
		}
		if((strpos($email, '<script>') === false) || !empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) || (preg_match($pattern, $email) === 1)){
			$error_email = TRUE;
		}
	}
	
	// Upload or remove a picture (if necessary)
	if($file_to_remove == "yes"){
		// Request for the picture's name
		$request = $PDO->prepare('SELECT picture_name FROM users WHERE login=:login');
		$request->execute(array(
			'login' => $_SESSION['user']		
		));
		if($row = $request->fetch(PDO::FETCH_ASSOC)){
			$picture_name = $row['picture_name'];
		}
		$request->closeCursor();
		unlink("../../uploads/profile/".$picture_name);
		$request_update = $PDO->prepare('UPDATE users SET picture_name=:picture_name WHERE login=:login');
		$request_update->execute(array(
			'picture_name'=> NULL,
			'login'=> $_SESSION["user"]
		));
		$remove_picture = TRUE;
	} else {
		if(!empty($_FILES['file_to_upload']['name'])){
			$path = "../../uploads/profile/";
			$file = basename($_FILES['file_to_upload']['name']);
			$max_size = 10000000;
			$size = filesize($_FILES['file_to_upload']['tmp_name']);
			$auth_extension = array('.png', '.gif', '.jpg', '.jpeg','.PNG');
			$file_extension = strrchr($_FILES['file_to_upload']['name'], '.');
		
			// Security checks
			// Check the extension (png, gif, jpg, jpeg)
			if(!in_array($file_extension, $auth_extension)){
				$error_picext = TRUE;
			}
			// Check the size
			if($size>$max_size){
				$error_picsize = TRUE;
			}
			
			// If no error (extension and size are ok)
			if(($error_picext == FALSE) && ($error_picsize == FALSE)){
				// Name format
				$file = strtr($file, 
					  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
					  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				$file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
				// If it worked, the function returns true
				if(move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $path.$file)) { // " $path . $file " (file name) or " $_SESSION["user"].$file_extension " (username)
					$request_update = $PDO->prepare('UPDATE users SET picture_name=:picture_name WHERE login=:login');
					$request_update->execute(array(
					'picture_name'=> $file, // " $file " (file name) or " $_SESSION["user"].$file_extension " (username)
					'login'=> $_SESSION["user"]
					));
					$change_picture = TRUE;
				}
			}
		}
	}
	
	if(($error_email == TRUE) && ($error_password == TRUE)){
		$_SESSION["ack_emlpsw"] = "Error with email and password";
	} else if(($change_email == TRUE) || ($change_password == TRUE)) {
		$_SESSION["ack_emlpsw"] = "Information changed";
	}
	
	if(($error_picext == TRUE) && ($error_picsize == TRUE)){
		$_SESSION["ack_pic"] = "Picture must be PNG, JPEG or GIF and must not exceed 10MB";
	} else if($error_picext == TRUE){
		$_SESSION["ack_pic"] = "Picture must be PNG, JPEG or GIF";
	} else if($error_picsize == TRUE) {
		$_SESSION["ack_pic"] = "Picture must not exceed 10MB";
	} else if($change_picture == TRUE){
		$_SESSION["ack_pic"] = "Picture changed";
	} else if($remove_picture == TRUE){
		$_SESSION["ack_pic"] = "Picture removed";
	}

}

?>