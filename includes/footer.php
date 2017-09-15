      <div id="footer">
         	<p>Copyright 2014 <a href="http://www.fontys.nl">Fontys Hogescholen</a><br>
         	<?php
         	   if (isset($_COOKIE['user'])) {
               mysql_connect("localhost", "ictportal", "ictportal") or die(mysql_error());
               mysql_select_db("ictportal") or die(mysql_error());
         	      $user = $_COOKIE['user'];
         	      $query = "select * from users where username = '$user'";
               $result = mysql_query($query) or die(mysql_error());
               if (mysql_num_rows($result) == 0)
               {
                  echo "not logged in";
               }
               else
               {
                  echo "logged in as $user";
               }
            }
         	   else {echo "not logged in";}
         	?>
         	</p>
      </div> <!-- end #footer -->

