<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Administration</title>
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
					<h1>From which course do you want to remove a teacher or a user ?</h1>
				
					<?php
						if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
							

							require "includes/config/config.php";
							$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);

							$request = $PDO->query("SELECT * FROM course ORDER BY ID");
							while ($row = $request->fetch(PDO::FETCH_ASSOC)){
								echo '<tr><td class="table_td"><a href="admin_removefromcourse.php?idcourse='.$row['id'].'">'.$row['name'].'</a></td>';
							}
							$request->closeCursor();
						



						}
						else{
							echo 'You are not authorized to access this page!<br/><a href="index.php">Go to home page</a>';
						}
						echo "</div>";
					?>
				</center>
				
				<br/><br/>

			</td></tr></table>

			</td></tr></table>

			<br/><br/><br/><br/><br/><br/>

		</center>
	</body>
</html>