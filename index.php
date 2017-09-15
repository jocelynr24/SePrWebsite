<?php 
   session_start();
   include('includes/htmlhead.php');
 ?>

<body>

   <div id="wrapper">

      <?php include('includes/header.php'); ?>
      
      <?php include('includes/nav.php'); ?>
      
      <div id="content">
         <h2>Welkom</h2>
	      <p>
            U bevindt zich op de ICT portal van uw Dienst IT.<br>
            U vindt hier informatie over alle ICT gerelateerde dienstverlening. <br>
	         Ook kunt u uw vragen of meldingen kwijt bij het Service Centrum.<br><br>
         </p>
         <p>
	         O ja, en deze site is misschien nog niet helemaal veilig tegen hacking gevaren ;-)
	      </p>


      </div> <!-- end #content -->

      <?php include('includes/sidebar.php'); ?>
      
      <?php include('includes/footer.php'); ?>
      
	</div> <!-- End #wrapper -->

</body>

</html>

