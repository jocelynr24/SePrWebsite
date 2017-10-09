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
					<h1>Administration of the platform</h1>
				
					<?php
						if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
							echo '
								<fieldset><legend>Users administration</legend>
									<a href="admin_userlist.php">User list</a><br/>
									<a href="admin_useradd.php">Add a user</a><br/>
									<a href="admin_usercourse.php">Assign teacher/student to course</a>
								</fieldset>
								<br/>
								<fieldset><legend>Courses administration</legend>
									<a href="admin_courseadd.php">Add a course</a><br/>
									<a href="admin_courselist.php">Course list</a><br/>
								</fieldset>
							';
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