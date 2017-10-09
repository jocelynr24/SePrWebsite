<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Course detail</title>
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
					<h1>Manage a course</h1>
				</center>
				
				<center>
				<?php
					if(isset($_SESSION["ack_acuoth"])){
							echo '<div class="acknowledge">'.$_SESSION["ack_acuoth"];
							unset($_SESSION["ack_acuoth"]);
						}
				?>
				</center>
					
				<center>
				<?php
				if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
					$id = $_GET['id'];
					include('includes/dynamic/admin_courserequest.php');
					
					// Generate a token for form
					$token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
						
					
					if($course_exists == TRUE){
											
						echo '
						<form action="includes/dynamic/admin_courseupdate.php" method="post" name="coursechange">
							<fieldset><legend>Change course information</legend>
								<table>
									<tr>
										<td class="texte">Change course name :</td>
										<td><input type="text" name="coursename" value="'.$name.'" placeholder="Course name" required></td>
									</tr>
									<tr>
										<td class="texte">Change short <br/>description :</td>
										<td><textarea name="shortdesc" rows="3" cols="20" placeholder="Set the short description" required>'.htmlspecialchars($shortdesc).'</textarea></td>
									</tr>
									<tr>
										<td class="texte">Change long <br/>description :</td>
										<td><textarea name="longdesc" rows="12" cols="25" placeholder="Set the long description" required>'.htmlspecialchars($longdesc).'</textarea></td>
									</tr>
									
									<tr>
									<tr>
										<td align= "center" colspan="2">
											<input type="hidden" name="token" value='.$token.'>
											<input type="hidden" name="id" value='.$id.'>
											<br/><input type="submit" name="check" value="Update course"/>
										</td>
									</tr>
								</table>
							</fieldset>
						</form>
						';
						echo "<br/><br/>";
						echo '
						<form action="includes/dynamic/admin_coursedelete.php" method="post" name="coursedelete">
							<fieldset><legend>Delete this course</legend>
								<table>
									<tr>
										<td class="texte">Are you sure?</td>
										<td><input type="radio" name="delete" value="yes">Yes <input type="radio" name="delete" value="no" checked>No</td>
									</tr>
									<td align= "center" colspan="2">
										<input type="hidden" name="id" value='.$id.'>
										<input type="hidden" name="token" value='.$token.'>
										<br/><input type="submit" name="check" value="Delete course"/>
									</td>
								</table>
							</fieldset>
						</form>
						';
						echo'
							<br/><br/><a href="admin_courselist.php"><div class="back">< Go back to the list of the course</div></a>
						';
					} else {
						echo 'This course doesn\'t exist!';
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