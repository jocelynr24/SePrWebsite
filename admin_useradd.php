<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Add a user</title>
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
					<h1>Add a user</h1>
				</center>
				
				<center>
				<?php
					if(isset($_SESSION["ack_addusr"])){
						echo '<div class="acknowledge">'.$_SESSION["ack_addusr"].'</div><br/>';
						unset($_SESSION["ack_addusr"]);
					}
				?>
				</center>
					
				<center>
				<?php
					if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
						// Generate a token for this form
						$token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
						echo '
						<form action="includes/dynamic/admin_useradd.php" method="post" name="useradd">
							<fieldset><legend>Add a new user</legend>
								<table>
									<tr>
										<td class="texte">Username:</td>
										<td><input type="text" name="login" placeholder="Username" required></td>
									</tr>
									<tr>
										<td class="texte">Password:</td>
										<td><input type="password" name="password" placeholder="Password (6 char. min.)" pattern=".{6,20}" required></td>
									</tr>
									<tr>
										<td class="texte">First name:</td>
										<td><input type="text" name="firstname" placeholder="First name" required></td>
									</tr>
									<tr>
										<td class="texte">Last name:</td>
										<td><input type="text" name="lastname" placeholder="Last name" required></td>
									</tr>
									<tr>
										<td class="texte">Email:</td>
										<td><input type="text" name="email" placeholder="Email" required></td>
									</tr>
									<tr>
										<td class="texte">Role:</td>
										<td>
											<select name="role" style="width: 173px;" required>
												<option value="1">Administrator</option>
												<option value="2">Teacher</option>
												<option value="3">Student</option>
											</select>
										</td>
									</tr>
									<tr>
										<td align= "center" colspan="2">
											<input type="hidden" name="token" value='.$token.'>
											<br/><input type="submit" name="check" value="Add user"/>
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