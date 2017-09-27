<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>Home</title>
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
						if (isset($_SESSION["logged"])){
							echo "<h1>Welcome to the website, ".$_SESSION["user"]."!</h1>";
						}
						else{
							echo "<h1>Welcome to the website, guest!</h1>";
						}
						echo "</div>";
					?>
				</center>
				
				<p>Morbi aliquet id turpis id ornare. Donec nec mi nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras id enim tortor. Vestibulum nec enim pellentesque, malesuada erat vel, ornare metus. Donec metus nulla, vulputate vel arcu non, blandit elementum nisi. Integer semper, nunc pharetra iaculis dapibus, metus quam blandit ligula, non dignissim neque est non mi.</p>
				<p>Donec sapien elit, faucibus sit amet porttitor quis, convallis ac velit. In velit nibh, euismod in lacinia ut, ornare nec lectus. Donec imperdiet dolor eu mollis pretium. Mauris congue maximus nulla lobortis sollicitudin. Morbi fermentum faucibus nulla non porta. Phasellus accumsan sodales nibh, in maximus libero consectetur id. Sed elit sem, sagittis id leo ut, volutpat elementum lacus.</p>
				<p>Nunc quis fringilla tellus, sit amet auctor augue. Proin sagittis laoreet finibus. Vivamus convallis nulla neque, ac placerat nisl lacinia et. Nulla faucibus, ex ut vestibulum condimentum, quam tellus cursus turpis, vitae hendrerit eros nunc commodo nisl. Mauris eleifend ipsum at dapibus aliquam. Mauris eu cursus lorem. Phasellus fringilla est at mauris vestibulum feugiat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque consectetur felis at metus vestibulum efficitur. Nullam gravida efficitur ornare. Donec sit amet nunc lacinia, bibendum magna eget, pellentesque quam. Quisque interdum nisi sit amet imperdiet iaculis. Donec felis diam, pellentesque et ante a, sollicitudin vestibulum arcu.</p>
				<p>Nullam non tincidunt turpis. Suspendisse nec neque eu nisl dictum tempor et ac dolor. Morbi aliquet accumsan mi non scelerisque. Nam ac est volutpat nisi molestie viverra tincidunt vitae elit. In non ex erat. Donec ac tellus sapien. Cras dignissim tortor suscipit enim tempor blandit. Duis rutrum iaculis nisi, eu viverra est. Donec in orci dictum augue rhoncus tempus. Cras interdum laoreet tellus, ut varius eros feugiat vitae. Donec vel odio sit amet leo placerat maximus vel vitae dui. Etiam gravida euismod porta. Nulla facilisi. Donec vel elit sit amet lorem sagittis tincidunt. Fusce iaculis risus vel nunc malesuada tempus. Morbi pretium fermentum placerat.</p>
				<p>Curabitur malesuada suscipit mi, vel faucibus justo vestibulum vitae. Nam pulvinar ac eros id rutrum. Donec et lorem sit amet nisi rutrum aliquam. Donec ut mi varius, pellentesque diam at, sagittis nulla. Curabitur facilisis sit amet enim ac egestas. Cras tempor volutpat ultrices. Suspendisse vel diam eu dui tristique gravida. Sed lectus velit, commodo eu bibendum tempus, volutpat imperdiet lacus. Fusce at dolor tempor purus lacinia gravida quis in nisl.</p>
				<p>Morbi aliquet id turpis id ornare. Donec nec mi nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras id enim tortor. Vestibulum nec enim pellentesque, malesuada erat vel, ornare metus. Donec metus nulla, vulputate vel arcu non, blandit elementum nisi. Integer semper, nunc pharetra iaculis dapibus, metus quam blandit ligula, non dignissim neque est non mi.</p>
				<p>Donec sapien elit, faucibus sit amet porttitor quis, convallis ac velit. In velit nibh, euismod in lacinia ut, ornare nec lectus. Donec imperdiet dolor eu mollis pretium. Mauris congue maximus nulla lobortis sollicitudin. Morbi fermentum faucibus nulla non porta. Phasellus accumsan sodales nibh, in maximus libero consectetur id. Sed elit sem, sagittis id leo ut, volutpat elementum lacus.</p>
				<p>Nunc quis fringilla tellus, sit amet auctor augue. Proin sagittis laoreet finibus. Vivamus convallis nulla neque, ac placerat nisl lacinia et. Nulla faucibus, ex ut vestibulum condimentum, quam tellus cursus turpis, vitae hendrerit eros nunc commodo nisl. Mauris eleifend ipsum at dapibus aliquam. Mauris eu cursus lorem. Phasellus fringilla est at mauris vestibulum feugiat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque consectetur felis at metus vestibulum efficitur. Nullam gravida efficitur ornare. Donec sit amet nunc lacinia, bibendum magna eget, pellentesque quam. Quisque interdum nisi sit amet imperdiet iaculis. Donec felis diam, pellentesque et ante a, sollicitudin vestibulum arcu.</p>
				<p>Nullam non tincidunt turpis. Suspendisse nec neque eu nisl dictum tempor et ac dolor. Morbi aliquet accumsan mi non scelerisque. Nam ac est volutpat nisi molestie viverra tincidunt vitae elit. In non ex erat. Donec ac tellus sapien. Cras dignissim tortor suscipit enim tempor blandit. Duis rutrum iaculis nisi, eu viverra est. Donec in orci dictum augue rhoncus tempus. Cras interdum laoreet tellus, ut varius eros feugiat vitae. Donec vel odio sit amet leo placerat maximus vel vitae dui. Etiam gravida euismod porta. Nulla facilisi. Donec vel elit sit amet lorem sagittis tincidunt. Fusce iaculis risus vel nunc malesuada tempus. Morbi pretium fermentum placerat.</p>
				<p>Curabitur malesuada suscipit mi, vel faucibus justo vestibulum vitae. Nam pulvinar ac eros id rutrum. Donec et lorem sit amet nisi rutrum aliquam. Donec ut mi varius, pellentesque diam at, sagittis nulla. Curabitur facilisis sit amet enim ac egestas. Cras tempor volutpat ultrices. Suspendisse vel diam eu dui tristique gravida. Sed lectus velit, commodo eu bibendum tempus, volutpat imperdiet lacus. Fusce at dolor tempor purus lacinia gravida quis in nisl.</p>
				
				<br/><br/>

			</td></tr></table>

			</td></tr></table>

			<br/><br/><br/><br/><br/><br/>

		</center>
	</body>
</html>