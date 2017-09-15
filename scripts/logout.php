<?php
   session_start();
   if (isset($_COOKIE['user']))
   {
      $_SESSION['msg'] = "You have been logged out";
      setcookie("user", $username, -1, "/");
   }
   header('Location:/ICTportal/index.php');
?>
