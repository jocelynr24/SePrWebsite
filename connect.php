<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Connect</title>
		<link rel="stylesheet" href="style/style.css" type="text/css" />
		<?php
			if((isset($_SESSION["ack_connect"])) && ($_SESSION["ack_connect"] == "Ok")){
				echo '<meta http-equiv="refresh" content="1; URL=index.php" />';
			}
		?>
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
					<h1>Connect to the platform</h1>
				</center>
				
				<center>
					<?php
						if((isset($_SESSION["ack_connect"])) && ($_SESSION["ack_connect"] != "Ok")){
							echo '<div class="acknowledge">'.$_SESSION["ack_connect"].'</div><br/>';
							unset($_SESSION["ack_connect"]);
						}
					?>
				</center>
				
				<center>
				<?php
					if((isset($_SESSION["ack_connect"])) && ($_SESSION["ack_connect"] == "Ok")){
						echo 'You will be redirected on the main page...';
						unset($_SESSION["ack_connect"]);
					} else if(isset($_SESSION["logged"])){
						echo 'You are already logged as <b>'.$_SESSION['user'].'</b>!<br/><a href="index.php">Go to home page</a><br/><a href="disconnect.php">Disconnect</a>';
					} else {
						echo '
						<form action="includes/dynamic/connect_request.php" method="post" name="identification">
							<fieldset><legend>Connect</legend>
								<table>
									<tr>
										<td class="texte">Username:</td>
										<td><input type="text" name="login" required></td>
									</tr>    
									<tr>
										<td class="texte">Password:</td>
										<td><input type="password" name="password" required></td>
									</tr>
									<tr>
										<td align= "center" colspan="2">
											<br/><input type="submit" name="check"  value="Connect"/>
										</td>
									</tr>
								</table>
							</fieldset>
						</form>
						';
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