<?php
session_start();
// Go back to the index
header('Location: ../../admin_userdetail.php?id='.$_POST["id"]);

// Retrieve the data
$id = $_POST["id"];
$coursename = $_POST["coursename"];
$shortdesc = $_POST["shortdesc"];
$longdesc = $_POST["longdesc"];
$check = $_POST["check"];
$token = $_POST["token"];

$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

// If the user is authorized to access this page
if(($check=="Update") && isset($_SESSION["logged"]) && ($_SESSION["role"] == 1) && ($_SESSION['token'] == $token)){
	// PDO connect method
	// Connection to the database
	require "../config/config.php";
	$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
	
	// Booleans to check the errors
	// Changes
	$change_password = FALSE;
	$change_others = FALSE;
	// Errors
	$error_others = FALSE;
	
	// Check if login already exists
	$request = $PDO->prepare('SELECT id FROM course WHERE name=:coursename');
	$request->execute(array(
		'name'=> $coursename
	));
	if($row = $request->fetch(PDO::FETCH_ASSOC)){
		$retid = $row['id'];
	}
	$request->closeCursor();
	
	if ( (($request->rowCount() == 1) && ($id == $retid))
		|| ($request->rowCount() == 0) ) {
		// We check if everything is correct (password and email)
		if(($password == $confirm_password) && (strpos($password, '<script>') === false)
		&& (strpos($login, '<script>') === false) && (!empty($login))
		&& (strpos($firstname, '<script>') === false) && (!empty($firstname))
		&& (strpos($lastname, '<script>') === false) && (!empty($lastname))){
			
		// Change the password if input is not empty
		if(!empty($password)){
			$request_update = $PDO->prepare('UPDATE users SET password=:password WHERE id=:id');
			$request_update->execute(array(
				'password' => MD5($password),
				'id'=> $id
			));
			$change_password = TRUE;
		}
		
		// Change all the other data (everytime since it is always present)
		$request_update = $PDO->prepare('UPDATE users SET login=:login, firstname=:firstname, lastname=:lastname, email=:email, role=:role WHERE id=:id');
		$request_update->execute(array(
			'login' => $login,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'email' => $email,
			'role' => $role,
			'id'=> $id
		));
		$change_others = TRUE;
		}
	} else {
		$error_others = TRUE;
	}
	
	// Upload or remove a picture (if necessary)
	if($file_to_remove == "yes"){
		// Request for the picture's name
		$request = $PDO->prepare('SELECT picture_name FROM users WHERE id=:id');
		$request->execute(array(
			'id' => $id		
		));
		if($row = $request->fetch(PDO::FETCH_ASSOC)){
			$picture_name = $row['picture_name'];
		}
		$request->closeCursor();
		unlink("../../uploads/profile/".$picture_name);
		$request_update = $PDO->prepare('UPDATE users SET picture_name=:picture_name WHERE id=:id');
		$request_update->execute(array(
			'picture_name'=> NULL,
			'id'=> $id
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
				/*$file = strtr($file, 
					  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
					  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				$file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);*/
				// If it worked, the function returns true
				if(move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $path.$login.$file_extension)) { // " $path . $file " (file name) or " $login.$file_extension " (username)
					$request_update = $PDO->prepare('UPDATE users SET picture_name=:picture_name WHERE id=:id');
					$request_update->execute(array(
						'picture_name'=> $login.$file_extension, // " $file " (file name) or " $login.$file_extension " (username)
						'id'=> $id
						));
					$change_picture = TRUE;
				}
			}
		}
	}
	
	if(($error_others == TRUE) && ($error_password == TRUE)){
		$_SESSION["ack_acuoth"] = "Error with information";
	} else if(($change_others == TRUE) || ($change_password == TRUE)) {
		$_SESSION["ack_acuoth"] = "Information changed";
	}
	
	if(($error_picext == TRUE) && ($error_picsize == TRUE)){
		$_SESSION["ack_acupic"] = "Picture must be PNG, JPEG or GIF and must not exceed 10MB";
	} else if($error_picext == TRUE){
		$_SESSION["ack_acupic"] = "Picture must be PNG, JPEG or GIF";
	} else if($error_picsize == TRUE) {
		$_SESSION["ack_acupic"] = "Picture must not exceed 10MB";
	} else if($change_picture == TRUE){
		$_SESSION["ack_acupic"] = "Picture changed";
	} else if($remove_picture == TRUE){
		$_SESSION["ack_acupic"] = "Picture removed";
	}

}

?>