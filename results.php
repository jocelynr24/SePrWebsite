<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>List of the courses</title>
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
					<h1>List of your grades</h1>

					<table class="table_style">
						<tr>
							<th class="table_th">Course name</th>
							<th class="table_th">Grade</th>
						</tr>
						<?php
							require "includes/config/config.php";
							$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);

							$request = $PDO->query('SELECT course.id, course.name, course_list.grade FROM course, course_list, users WHERE course.id = course_list.id_Course AND course_list.id_User = users.id AND users.login = "'.$_SESSION["user"].'"');
							while ($row = $request->fetch(PDO::FETCH_ASSOC)){
								echo '<tr><td class="table_td"><a href="coursedetail.php?id='.$row['id'].'">'.$row['name'].'</a></td><td class="table_td">'.$row['grade'].'</td>';
							}
							$request->closeCursor();
						?>
					</table>
				</center>
				
				<br/><br/>

			</td></tr></table>

			</td></tr></table>

			<br/><br/><br/><br/><br/><br/>

		</center>
	</body>
</html>