<?php 
   session_start();
   include('../includes/htmlhead.php'); 
?>

<body>

   <div id="wrapper">

      <?php include('../includes/header.php'); ?>
      
      <?php include('../includes/nav.php'); ?>
      
      <div id="content">
         <h2>Login</h2>
	      <p>
	         <form method="post" action="checklogin.php" />
               <label for="name">gebruikersnaam:</label><br />
               <input type="text" id="username" name="username" value="" /><br />
     
               <label for="mail">wachtwoord:</label><br />
               <input type="text" id="password" name="password" value="" /><br />
            
               <input type="submit" name="submit" value="login" />
               <input type="submit" name="submit" value="register" />
    
            </form>
         </p>

      </div> <!-- end #content -->

      <?php include('../includes/sidebar.php'); ?>
      
      <?php include('../includes/footer.php'); ?>
      
	</div> <!-- End #wrapper -->

</body>

</html>

