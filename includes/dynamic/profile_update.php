<?php
session_start();
// Go back to the index
header("Location: ../../profile.php"); //profile.php?msg=$ack

// Retrieve the data
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$email=$_POST["email"];
if(isset($_POST["remove_picture"])){
	$remove_picture=$_POST["remove_picture"];
} else {
	$remove_picture= "no";
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
	$Password_changed = FALSE;
	$Email_changed = FALSE;
	$Picture_removed = FALSE;
	$Error_extension = FALSE;
	$Error_size = FALSE;
	$Picture_changed = FALSE;
	
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
			$Password_changed = TRUE;
		}
		
		// Change the email (everytime since it is always present)
		$request_update = $PDO->prepare('UPDATE users SET email=:email WHERE login=:login');
		$request_update->execute(array(
			'email' => $email,
			'login'=> $_SESSION["user"]
		));
		$Email_changed = TRUE;
		
		// Upload or remove a picture (if necessary)
		if($remove_picture == "yes"){
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
			$Picture_removed = TRUE;
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
					$Error_extension = TRUE;
				}
				// Check the size
				if($size>$max_size){
					$Error_size = TRUE;
				}
				
				// If no error (extension and size are ok)
				if(($Error_extension == FALSE) && ($Error_size == FALSE)){
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
						$Picture_changed = TRUE;
					}
				}
			}
		}
	}	

/*if(($Error_extension == TRUE) || ($Error_size == TRUE)){
	$ack = "'An error occured, please retry.'";
} else {
	$ack = "'Changes applied succesfully!'";
}*/

}

// Debug
/*
echo "Password_changed = ";
echo $Password_changed ? 'true' : 'false';
echo "<br/>Email_changed = ";
echo $Email_changed ? 'true' : 'false';
echo "<br/>Picture_removed = ";
echo $Picture_removed ? 'true' : 'false';
echo "<br/>Error_extension = ";
echo $Error_extension ? 'true' : 'false';
echo "<br/>Error_size = ";
echo $Error_size ? 'true' : 'false';
echo "<br/>Picture_changed = ";
echo $Picture_changed ? 'true' : 'false';
*/

?>