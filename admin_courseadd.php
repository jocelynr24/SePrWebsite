<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Add a course</title>
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
					<h1>Add a course</h1>
				</center>
				
				<center>
				<?php
					if(isset($_SESSION["ack_addcourse"])){
						echo '<div class="acknowledge">'.$_SESSION["ack_addcourse"].'</div><br/>';
						unset($_SESSION["ack_addcourse"]);
					}
				?>
				</center>
					
				<center>
				<?php
					if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
						// Generate a token for this form
						$token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
						echo '
						<form action="includes/dynamic/admin_courseadd.php" method="post" name="courseadd">
							<fieldset><legend>Add a new course</legend>
								<table>
									<tr>
										<td class="texte">Name of the course :</td>
										<td><input type="text" name="coursename" placeholder="Course Name" required></td>
									</tr>
									<tr>
										<td class="texte">Short description :</td>
										<td><textarea name="shortdesc" placeholder="Type your short description here" rows="3" cols="20" required></textarea></td>
									</tr>
									<tr>
										<td class="texte">Long description :</td>
										<td><textarea name="longdesc" placeholder="Add the full description here (what you study, terms and principles)" rows="12" cols="25" required></textarea></td>
									</tr>
									
										<td align= "center" colspan="2">
											<input type="hidden" name="token" value='.$token.'>
											<br/><input type="submit" name="submit" value="Add course"/>
										</td>
									</tr>
								</table>
							</fieldset>
						</form>
						';
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