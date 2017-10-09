<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Courses list</title>
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
					<h1>List of the courses</h1>
					
					<?php
					if(isset($_SESSION["ack_delusr"])){
						echo '<div class="acknowledge">'.$_SESSION["ack_delusr"].'</div><br/>';
						unset($_SESSION["ack_delusr"]);
					}
					?>
					
					<?php
					if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
						require "includes/config/config.php";
						$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
						$request = $PDO->query("SELECT id, name, description_short, description_long FROM course ORDER BY ID");
						echo '
						<table class="table_style">
							<tr>
								<th class="table_th">Course ID</th>
								<th class="table_th">Course name</th>
								<th class="table_th">Short Description</th>
								<th class="table_th">Long Description</th>
							</tr>
							';
						while ($row = $request->fetch(PDO::FETCH_ASSOC)){
							echo '<tr><td class="table_td">'.$row['id'].' - <a href="admin_coursedetail.php?id='.$row['id'].'">edit</a></td><td class="table_td">'.$row['name'].'</td><td class="table_td">'.$row['description_short'].'</td><td class="table_td">'.$row['description_long'].'</td>';
						}
						$request->closeCursor();
						echo '</table>';
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