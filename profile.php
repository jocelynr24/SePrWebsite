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
				
				<?php
					if (isset($_SESSION["logged"])){
						echo '<p>Here is the profile page of '.$_SESSION["user"].'.</p>';
					} else {
						echo '<center><p>You must be logged in before accessing this page!<br/><a href="connect.php">Connect</a></p></center>';
					}
				?>
				
				<br/><br/>

			</td></tr></table>

			</td></tr></table>

			<br/><br/><br/><br/><br/><br/>

		</center>
	</body>
</html>