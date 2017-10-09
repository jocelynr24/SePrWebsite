<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Users list</title>
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
					<h1>List of the users</h1>
					
					<?php
					if(isset($_SESSION["ack_delusr"])){
						echo '<div class="acknowledge">'.$_SESSION["ack_delusr"].'</div><br/>';
						unset($_SESSION["ack_delusr"]);
					}
					?>
					
					<?php





					if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){

						// Generate a token for this form
						$token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));

						require "includes/config/config.php";
						$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
						$request = $PDO->prepare("SELECT id, login, email, role, firstname, lastname FROM users,course_list 
												  WHERE users.id = course_list.id_User 
												  AND role IN (2,3)
												  AND course_list.id_Course = :idcourse");

						$request->execute(array(
						'idcourse' => $_GET['idcourse']
						));
					

						echo '
						<table class="table_style">
							<tr>
								<th class="table_th">User ID</th>
								<th class="table_th">User role</th>
								<th class="table_th">Username</th>
								<th class="table_th">First name</th>
								<th class="table_th">Last name</th>
								<th class="table_th">Email</th>
								<th class="table_th">Remove</th>
							</tr>
							';
						while ($row = $request->fetch(PDO::FETCH_ASSOC)){
							if($row['role'] == 1){
								$role = "admin";
							} else if($row['role'] == 2) {
								$role = "teacher";
							} else if($row['role'] == 3) {
								$role = "student";
							} else {
								$role = "unknown";
							}
							echo '
									
									<tr>
									<td class="table_td">'.$row['id'].' - <a href="admin_userdetail.php?id='.$row['id'].'">edit</a></td>
									<td class="table_td">'.$role.'</td>
									<td class="table_td">'.$row['login'].'</td>
									<td class="table_td">'.$row['firstname'].'</td>
									<td class="table_td">'.$row['lastname'].'</td>
									<td class="table_td">'.$row['email'].'</td>
									<td class="table_td"><a href = "includes/dynamic/courselist_remove.php?id='.$row['id'].'&amp;idcourse='.$_GET['idcourse'].'&amp;token='.$token.'">DELETE</a></td>
									
									
									';
									
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