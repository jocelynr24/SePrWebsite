<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Profile</title>
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
					<h1>Manage your profile</h1>
				</center>
				
				<!--<?php
					if(isset($_GET['msg'])){
						echo '<script>alert('.$_GET['msg'].');</script>';
					}
				?>-->
				
				<center>
				<?php
					include('includes/dynamic/profile_request.php');
					if (isset($_SESSION["logged"])){
						echo '
						<form action="includes/dynamic/profile_update.php" method="post" name="changeProfile" enctype="multipart/form-data">
							<table>
								<tr>
									<td>Login:</td>
									<td><input type="text" placeholder="Login" name="login" value='.$_SESSION["user"].' disabled></td>
								</tr>
									<td>First name:</td>
									<td><input type="text" placeholder="First name" name="firstname" value='.$firstname.' disabled></td>
								</tr>
									<td>Last name:</td>
									<td><input type="text" placeholder="Last name" name="lastname" value='.$lastname.' disabled></td>
								</tr>
								<tr>
									<td>Change email:</td>
									<td><input type="text" placeholder="Email" name="email" value='.$email.' required></td>
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
									<td><input type="checkbox" name="remove_picture" value="yes"><small>I want to remove my picture</small></td>
								</tr>
								<tr>
									<td align= "center" colspan="2">
										<br/><input type="submit" name="check"  value="Update"/>
									</td>
								</tr>
							</table>
						</form>';
					} else {
						echo '<p>You must be logged in before accessing this page!<br/><a href="connect.php">Connect</a></p>';
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