<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>List of student</title>
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
					$course_id = $_GET['id'];
					$course_name = $_GET['name'];
					echo'<h1>List of student in the course '.$course_name.'</h1>
					
					<br/>';
					
					if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 2)){
						
						echo'<table class="table_teacher_grade">
							<tr>
								<th class="table_th">Student</th>
								<th class="table_th">Grade</th>
								<th class="table_th"></th>
							</tr>';
							
								require "includes/config/config.php";
								$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
								
								$request = $PDO->query('SELECT users.firstname, users.lastname, users.id, course_list.grade FROM users, course_list, course WHERE course_list.id_User = users.id AND course_list.id_Course = course.id AND course.name= "'.$course_name.'" AND users.role = 3');	
								while ($row = $request->fetch(PDO::FETCH_ASSOC)){
									echo '
									<tr>
									<td class="table_td_center"><p>'.$row['firstname'].' '.$row['lastname'].'</p></td>
									<td class="table_td_center"><p>'.$row['grade'].'</p></td>
									<td class="table_td_center"><button><a href="teacher_updategrade.php?course_id='.$course_id.'&course_name='.$course_name.'&student_id='.$row['id'].'" style="color:black">Update</a></button></td>
									</tr>';
								}
								$request->closeCursor();
								
							
						echo'</table>';
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