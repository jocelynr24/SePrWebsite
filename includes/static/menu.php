<div class="menu">
			
	<div class="menu_site">
		<ul id="menu">

			<?php
				if (isset($_SESSION["logged"])){
					if($_SESSION["role"] == 1){
						echo "<li><a href=\"index.php\">Home</a></li>";
						echo "<li><a href=\"courselist.php\">Course list</a></li>";
						echo "<li><a href=\"admin.php\">Manage website</a></li>";
						echo "<li><a href=\"profile.php\">Profile</a></li>";
						echo "<li><a href=\"disconnect.php\">Disconnect</a></li>";
					} else if($_SESSION["role"] == 2){
						echo "<li><a href=\"index.php\">Home</a></li>";
						echo "<li><a href=\"courselist.php\">Course list</a></li>";
						echo "<li><a href=\"grade.php\">Manage grades</a></li>";
						echo "<li><a href=\"profile.php\">Profile</a></li>";
						echo "<li><a href=\"disconnect.php\">Disconnect</a></li>";
					} else {
						echo "<li><a href=\"index.php\">Home</a></li>";
						echo "<li><a href=\"courselist.php\">Course list</a></li>";
						echo "<li><a href=\"results.php\">Results</a></li>";
						echo "<li><a href=\"profile.php\">Profile</a></li>";
						echo "<li><a href=\"disconnect.php\">Disconnect</a></li>";
					}
				} else {
					echo "<li><a href=\"index.php\">Home</a></li>";
					echo "<li><a href=\"courselist.php\">Course list</a></li>";
					echo "<li><a href=\"results.php\">Results</a></li>";
					echo "<li><a href=\"profile.php\">Profile</a></li>";
					echo "<li><a href=\"connect.php\">Connect</a></li>";
				}
			?>
						
		</ul>
	</div>
	<br/>
				
</div>