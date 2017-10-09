<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Update grade</title>
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
					$course_id = $_GET['course_id'];
					$course_name = $_GET['course_name'];
					$student_id= $_GET['student_id'];
					echo'<h1>List of student in the course '.$course_name.'</h1>
					
					<br/>';
					
					if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 2)){
						
						echo '
						<form action="includes/dynamic/teacher_gradeadd.php" method="post" name="gradeadd">
						<table class="table_teacher_grade">
							<tr>
								<th class="table_th">Student</th>
								<th class="table_th">Grade</th>
							</tr>';
							
								require "includes/config/config.php";
								$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
								
								$request = $PDO->query('SELECT firstname, lastname FROM users WHERE id = "'.$student_id.'"');
								while ($row = $request->fetch(PDO::FETCH_ASSOC)){
									echo '
									
									<tr>
									<td class="table_td_center"><p>'.$row['firstname'].' '.$row['lastname'].'</p></td>
									<td class="table_td_center">
										<select name="grade">
											<option value="default" selected="selected">Choose a grade</option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
									</td>
									</tr>';
									
									
								}
								$request->closeCursor();
								
							
						echo'</table>
						<br/><br/>
						<input type="hidden" name="id_User" value="'.$student_id.'"/>
						<input type="hidden" name="id_Course" value="'.$course_id.'"/>
						<input type="hidden" name="name_Course" value="'.$course_name.'"/>';
						$request2 = $PDO->query('SELECT role FROM users WHERE id = "'.$student_id.'"');
							while ($row2 = $request2->fetch(PDO::FETCH_ASSOC)){
								if($row2['role'] == 3){
									echo'<input type="hidden" name="check" value="Add grade"/>';
								}
								else{
									echo'<input type="hidden" name="check" value="Not a student"/>';
								}
							}
						$request->closeCursor();
						echo'
						<input type="submit" name="update" value="Update"/>
						</form>';
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