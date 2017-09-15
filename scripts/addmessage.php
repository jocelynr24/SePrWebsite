<?php
   if ($_POST['submit'] == 'send message')
   {
      mysql_connect("localhost", "ictportal", "ictportal") or die(mysql_error());
      mysql_select_db("ictportal") or die(mysql_error());
      $message = str_replace("'", "\&#39;", $_POST['message']);
      if (isset($_COOKIE['user'])) 
      {
         $author =  $_COOKIE['user'];
      }
      else
      {
         $author = 'anonymous';
      }
      $date = date('Y-n-j');
      $query = "insert into messages values ('$message', '$author', '$date')";
      mysql_query($query) or die(mysql_error());
      header('Location:messages.php'); 
   }

?>
