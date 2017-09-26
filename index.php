<html>
	<head>
		<title>Home</title>
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
					<?php
						if (isset($_SESSION["logged"])){
							echo "<h1>Welcome to the website, ".$_SESSION["user"]." (".$_SESSION["role"].")!</h1>";
						}
						else{
							echo "<h1>Welcome to the website, guest!</h1>";
						}
						echo "</div>";
					?>
				</center>
				
				<p>Short description of the website.</p>

				<br/><br/>

			</td></tr></table>

			</td></tr></table>

			<br/><br/><br/><br/><br/><br/>

		</center>
	</body>
</html>