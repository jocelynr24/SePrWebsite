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
					<h1>About a course</h1>
				</center>
				
				<center>
				<?php
					require "includes/config/config.php";
					$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);

					$request = $PDO->prepare('SELECT * FROM course WHERE id=:id');
					$request->execute(array(
						'id' => $_GET['id']
						));
					if ($row = $request->fetch(PDO::FETCH_ASSOC)){
						echo '
							<table class="table_style">
								<tr class="table_tr">
									<th class="table_th">'.$row['name'].'</th>
								</tr>
								<tr>
									<td class="table_td">'.$row['description_long'].'</td>
								</tr>
							</table>
						';
					} else {
						echo "This course does not exist.";
					}
					$request->closeCursor();
				?>
				<br/><a href="courselist.php"><div class="back">< Go back to the list of the courses</div></a>
				</center>
				
				<br/><br/>

			</td></tr></table>

			</td></tr></table>

			<br/><br/><br/><br/><br/><br/>

		</center>
	</body>
</html>