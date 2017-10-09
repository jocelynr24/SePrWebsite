<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Teacher and student courses</title>
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
					<h1>Teacher and student courses</h1>
				</center>
				<center>
					<?php
						if(isset($_SESSION["ack_addtea"])){
							echo '<div class="acknowledge">'.$_SESSION["ack_addtea"];
							unset($_SESSION["ack_addtea"]);
						}
						if (isset($_SESSION["ack_addstu"])){
							echo '<br/>'.$_SESSION["ack_addstu"].'</div><br/>';
							unset($_SESSION["ack_addstu"]);
						} else {
							echo '</div><br/>';
						}
					?>
				</center>
				
				<center>
				<?php
				if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
					// Generate a token for this form
					$token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
					
					echo '
						<form action="includes/dynamic/admin_usercourse.php" method="post">
						<fieldset><legend>Add a teacher to a course</legend>
						<select name="course" id="course">
						';
						
						try
						{
							require "includes/config/config.php";
							$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
						}
						catch(Exception $e)
						{
							die('Erreur : '.$e->getMessage());
						}

						$reponse = $PDO->prepare('SELECT * FROM course WHERE id NOT IN ( 
															select id_course from course_list, users 
															where course_list.id_User = users.id
															and role = 2) ORDER BY NAME'
												);
						$reponse->execute();
						
						foreach ($reponse as $donnees){
							echo'
							<option value="'.$donnees['id'].'"> '.$donnees['name'].'</option>
							';
						}

						$reponse->closeCursor();
						
						echo'
							</select>
							<select name="teacher" id="teacher">
						';
					
						try
						{
							require "includes/config/config.php";
							$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
						}
						catch(Exception $e)
						{
							die('Erreur : '.$e->getMessage());
						}


						$reponse = $PDO->prepare('SELECT id, firstname, lastname FROM users WHERE role = 2 ORDER BY LASTNAME');
						$reponse->execute();
						

						foreach ($reponse as $donnees)
						{
							echo '
							<option value="'.$donnees['id'].'">'.$donnees['firstname'] .' '.$donnees['lastname'].'</option>
							';
						}

						$reponse->closeCursor();
						echo '
							<input type="hidden" name="token" value='.$token.'>
							<br/><br/>
							<input type="submit" value="Add teacher">
							</select>
							</fieldset>
							</form>
						';

						echo '
							<br/><br/>
							<form action="includes/dynamic/admin_usercourse.php" method="post" >		
							<fieldset><legend>Add a student to a course</legend>
							<select name="course_student" id="course_student">
						';

						try
						{
							require "includes/config/config.php";
							$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
						}
						catch(Exception $e)
						{
							die('Erreur : '.$e->getMessage());
						}

						$reponse = $PDO->prepare('SELECT * FROM course ORDER BY NAME');
						$reponse->execute();
						
						foreach ($reponse as $donnees)
						{
							echo '
							<option value="'.$donnees['id'].'" > '.$donnees['name'].'</option>
							';
						}

						$reponse->closeCursor();
						echo '
							</select>
							<select name="student" id="student">
						';

						try
						{
							require "includes/config/config.php";
							$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
						}
						catch(Exception $e)
						{
							die('Erreur : '.$e->getMessage());
						}

						

						$reponse = $PDO->prepare(' SELECT id, firstname, lastname FROM users WHERE role = 3 ');
						$reponse->execute();
						

						foreach ($reponse as $donnees)
						{
							echo '
							<option value="'.$donnees['id'].'" > '.$donnees['firstname'].' '.$donnees['lastname'].'</option>
							';
						}

						$reponse->closeCursor();
						
						echo '
							<input type="hidden" name="token" value='.$token.'>
							<br/><br/>
							<input type="submit" value="Add student">
							</select>
							</fieldset>
							</form>
						';
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