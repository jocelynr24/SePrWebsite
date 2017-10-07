<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Courses Administration</title>
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
					<h3 id="bloc1">Course administration</h3>
				</center>
				<center>
					<?php
						if(isset($_SESSION["ack_emlpsw"])){
							echo '<div class="acknowledge">'.$_SESSION["ack_emlpsw"];
							unset($_SESSION["ack_emlpsw"]);
						}
						if (isset($_SESSION["ack_pic"])){
							echo '<br/>'.$_SESSION["ack_pic"].'</div><br/>';
							unset($_SESSION["ack_pic"]);
						} else {
							echo '</div><br/>';
						}
					?>
				</center>
				<center>

			<form action="includes/dynamic/courselist_update.php" method = "post">		
				<p>Add a teacher to a course : </p>
				<select name="course" id="course">


					<?php

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
					

					foreach ($reponse as $donnees)
					{
						?>


						<option value=" <?php echo $donnees['id']; ?>" > <?php echo $donnees['name']; ?></option>
						

						<?php
					}

					$reponse->closeCursor();

					?>
				</select>

				<select name="teacher" id="teacher">


					<?php

					try
					{
						require "includes/config/config.php";
						$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
					}
					catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}


					$reponse = $PDO->prepare('SELECT * FROM users WHERE role = 2 ORDER BY LASTNAME');
					$reponse->execute();
					

					foreach ($reponse as $donnees)
					{
						?>


						<option value=" <?php echo $donnees['id']; ?>" > <?php echo $donnees['firstname']; ?> <?php echo $donnees['lastname']; ?></option>
						

						<?php
					}

					$reponse->closeCursor();

					?>
				</select>
				
				
				<input type="submit" value="Add teacher">


			</form>



			<form action="includes/dynamic/courselist_update.php" method = "post" >		
				<p>Add student to a course : </p>

				<select name="course_student" id="course_student" >


					<?php

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
						?>


						<option value=" <?php echo $donnees['id']; ?>" > <?php echo $donnees['name']; ?></option>
						

						<?php
					}

					$reponse->closeCursor();

					?>
				</select>

				<select name="student" id="student">


					<?php

					try
					{
						require "includes/config/config.php";
						$PDO = new PDO('mysql:host='.$server.';dbname='.$base.';charset=utf8', $user, $pass);
					}
					catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}

					

					$reponse = $PDO->prepare(' SELECT * FROM users WHERE role = 3 '    );
					$reponse->execute();
					

					foreach ($reponse as $donnees)
					{
						?>


						<option value=" <?php echo $donnees['id']; ?>" > <?php echo $donnees['firstname']; ?> <?php echo $donnees['lastname']; ?></option>
						

						<?php
					}

					$reponse->closeCursor();

					?>
				</select>
				
				
				<input type="submit" value="Add student">


			</form>






				</center>
				
				<br/><br/>

			</td></tr></table>

			</td></tr></table>

			<br/><br/><br/><br/><br/><br/>

		</center>
	</body>
</html>