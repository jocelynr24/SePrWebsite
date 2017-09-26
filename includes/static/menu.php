<div class="menu">
			
	<div class="menu_site">
		<ul id="menu">

			<?php
				session_start();
				if (isset($_SESSION["logged"])){
					echo "<li><a href=\"index.php\">Home</a></li>";
					echo "<li><a href=\"courses.php\">Courses</a></li>";
					echo "<li><a href=\"myresults.php\">My Results</a></li>";
					echo "<li><a href=\"profile.php\">Profile</a></li>";
					echo "<li><a href=\"disconnect.php\">Disconnect</a></li>";
				} else{
					echo "<li><a href=\"index.php\">Home</a></li>";
					echo "<li><a href=\"courses.php\">Courses</a></li>";
					echo "<li><a href=\"myresults.php\">My Results</a></li>";
					echo "<li><a href=\"profile.php\">Profile</a></li>";
					echo "<li><a href=\"connect.php\">Connect</a></li>";
				}
			?>
						
		</ul>
	</div>
	<br/>
				
</div>