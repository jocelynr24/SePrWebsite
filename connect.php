<html>
	<head>
		<title>Connect</title>
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
					<h1>Connect to the platform</h1>
				</center>
				
				<center>
				<?php
					if (isset($_SESSION["logged"])){
						echo 'You are already logged as <b>'.$_SESSION['user'].'</b>!<br/><a href="disconnect.php">Disconnect</a>';
					} else {
						echo '
						<form action="includes/dynamic/connect_request.php" method="post" name="identification">
							<table>
								<tr>
									<td class="texte">Username:</td>
									<td><input type="text" name="login"></td>
								</tr>    
								<tr>
									<td class="texte">Password:</td>
									<td><input type="password" name="password"></td>
								</tr>
								<tr>
									<td align= "center" colspan="2">
										<input type="submit" name="check"  value="Connect"/>
									</td>
								</tr>
							</table>
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