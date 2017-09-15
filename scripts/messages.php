<?php 
   session_start();
   include('../includes/htmlhead.php'); 
?>

<body>

   <div id="wrapper">

      <?php include('../includes/header.php'); ?>
      
      <?php include('../includes/nav.php'); ?>
      
      <div id="content">
         <h2>Message Board</h2>
	      <p>
	         <form method="post" action="addmessage.php" />
               <label for="name">Leave us your message:</label><br />
               <textarea id="message" name="message" cols=50 rows=6></textarea> 
               <input type="submit" name="submit" value="send message" />
            </form>
         </p>
         <h3>Messages from visitors</h3>
         <p>
            <?php
               mysql_connect("localhost", "ictportal", "ictportal") or die(mysql_error());
               mysql_select_db("ictportal") or die(mysql_error());
         	      $query = "select * from messages";
               $result = mysql_query($query) or die(mysql_error());
               if (mysql_num_rows($result) > 0)
               {
                  echo '<table border="1" cellspacing="2" cellpadding="2">';
                  while ($row = mysql_fetch_row($result))
                  {
            ?>
                     <tr>
                     <td width="20%"><?php echo $row[2] ?></td>
                     <td width="20%"><?php echo $row[1] ?></td>
                     <td width="60%"><?php echo $row[0] ?></td>
                     </tr>
            <?php
                  }
                  echo '</table>';
               }
            ?>

         </p>

      </div> <!-- end #content -->

      <?php include('../includes/sidebar.php'); ?>
      
      <?php include('../includes/footer.php'); ?>
      
	</div> <!-- End #wrapper -->

</body>

</html>

