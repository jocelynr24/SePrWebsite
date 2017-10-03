<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>User detail</title>
		<link rel="stylesheet" href="style/style.css" type="text/css" />
	</head>
	
	<body>
		<center>
			<table width=950 height=800 border=0 class="page"><tr><td align=center>

			<center>
				<img src="style/img/logo.png" style="margin: 10px;"></img>
			</center>

			<?php include('includes/static/menu.php'); ?>

			<table width=930 height=200 border=0><tr><td align=left>

				<br/><br/>
				
				<center>
					<h1>Manage a user</h1>
				</center>
				
				<center>
				<?php
					if(isset($_SESSION["ack_acuoth"])){
							echo '<div class="acknowledge">'.$_SESSION["ack_acuoth"];
							unset($_SESSION["ack_acuoth"]);
						}
						if (isset($_SESSION["ack_acupic"])){
							echo '<br/>'.$_SESSION["ack_acupic"].'</div><br/>';
							unset($_SESSION["ack_acupic"]);
						} else {
							echo '</div><br/>';
						}
				?>
				</center>
					
				<center>
				<?php
				if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
					$id = $_GET['id'];
					include('includes/dynamic/admin_userrequest.php');
					
					// Generate a token for form
					$token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
						
					
					if($user_exists == TRUE){
						switch($role){
							case 1:
								$role_desc = "Administrator";
							break;
							case 2:
								$role_desc = "Teacher";
							break;
							case 3:
								$role_desc = "Student";
							break;
							default:
								$role_desc = "Unknown";
							break;
						}
					
						echo '
						<form action="includes/dynamic/admin_userupdate.php" method="post" name="userchange" enctype="multipart/form-data">
							<fieldset><legend>Change information</legend>
								<table>
									<tr>
										<td class="texte">Change username:</td>
										<td><input type="text" name="login" value='.$login.' placeholder="Username" required></td>
									</tr>
									<tr>
										<td>Change password:</td>
										<td><input type="password" placeholder="Password (6 char. min.)" name="password" pattern=".{6,20}"></td>
									</tr>   
									<tr>
										<td>Confirm password:</td>
										<td><input type="password" placeholder="Confirm password" name="confirm_password" pattern=".{6,12}"></td>
									</tr>
									<tr>
										<td class="texte">Change first name:</td>
										<td><input type="text" name="firstname" value='.$firstname.' placeholder="First name" required></td>
									</tr>
									<tr>
										<td class="texte">Change last name:</td>
										<td><input type="text" name="lastname" value='.$lastname.' placeholder="Last name" required></td>
									</tr>
									<tr>
										<td class="texte">Change email:</td>
										<td><input type="text" name="email" value='.$email.' placeholder="Email" required></td>
									</tr>
									<tr>
										<td class="texte">Change role:</td>
										<td>
											<select name="role" style="width: 173px;" required>
												<option value='.$role.'>No change ('.$role_desc.')</option>
												<option value="1">Administrator</option>
												<option value="2">Teacher</option>
												<option value="3">Student</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Change picture:</td>
							';
							if(!empty($picture_name)){
								$picture_path = "uploads/profile/".$picture_name;
								echo '	<td><img src='.$picture_path.' style="width:172px;height:100px;>
											<br/><input type="hidden" name="MAX_FILE_SIZE" value="10000000">
											<br/><input type="file" name="file_to_upload" style="width: 172px;"></td>
									</tr>';
							} else {
								echo '	<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000">
											<input type="file" name="file_to_upload" style="width: 172px;"></td>
									</tr>';
							}
							echo '
									<tr>
										<td>Remove picture:</td>
										<td><input type="radio" name="file_to_remove" value="yes">Yes <input type="radio" name="file_to_remove" value="no" checked>No</td>
									</tr>
									<tr>
									<tr>
										<td align= "center" colspan="2">
											<input type="hidden" name="token" value='.$token.'>
											<input type="hidden" name="id" value='.$id.'>
											<br/><input type="submit" name="check" value="Update"/>
										</td>
									</tr>
								</table>
							</fieldset>
						</form>
						';
						echo "<br/><br/>";
						echo '
						<form action="includes/dynamic/admin_userdelete.php" method="post" name="userdelete">
							<fieldset><legend>Delete this user</legend>
								<table>
									<tr>
										<td class="texte">Are you sure?</td>
										<td><input type="radio" name="delete" value="yes">Yes <input type="radio" name="file_to_remove" value="no" checked>No</td>
									</tr>
									<td align= "center" colspan="2">
										<input type="hidden" name="id" value='.$id.'>
										<input type="hidden" name="token" value='.$token.'>
										<br/><input type="submit" name="check" value="Delete"/>
									</td>
								</table>
							</fieldset>
						</form>
						';
						echo'
							<br/><br/><a href="admin_userlist.php"><div class="back">< Go back to the list of the users</div></a>
						';
					} else {
						echo 'This user doesn\'t exist!';
					}
				} else {
					echo 'You are not authorized to access this page!<br/><a href="index.php">Go to home page</a>';
				}
					
				?>
				</center>
				
				<br/><br/>

			</td></tr></table>

			</td></tr></table>

			<br/><br/><br/><br/><br/><br/>

		</center>
	</body>
</html>