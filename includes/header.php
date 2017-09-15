      <div id="header">
	      <h2>ICT portal</h2>
	      <p>
	      <?php 
	         if (isset($_SESSION['msg'])) 
	         {
               echo $_SESSION['msg'];
               $_SESSION['msg'] = "";
            }
	      ?>
	      </p>
      </div> <!-- end #header -->

