<?php 
session_start();
// E-mailadres receiver
$mail_rec = 'you@domain.nl'; // <<<----- Fill in your e-mailaddress here!

// Special checks for name and e-mailaddress
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // name check 
    if (empty($_POST['username']))
        $name_err = 1;
}

//Check all fields
if (empty($_POST['username']) || !empty($name_err) || $_SERVER['REQUEST_METHOD'] == 'GET')
{
   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      if (!empty($name_err))
      {
         //echo '<p>You forgot to fill in your username</p>';
         $_SESSION['msg'] = "You forgot to fill in your username";
         header('Location:/ICTportal/login.php'); 
      }
   }
}
else // log in or register
{
   mysql_connect("localhost", "ictportal", "ictportal") or die(mysql_error());
   mysql_select_db("ICTportal") or die(mysql_error());
   $username = $_POST['username'];
   $password = $_POST['password'];
      
   if ($_POST['submit'] == 'login')
   {
      $query = "select * from users where username = '$username' and password = '$password'";
      $result = mysql_query($query) or die(mysql_error());
      if (mysql_num_rows($result) == 0)
      {
         $_SESSION['msg'] = "Incorrect name or password";
         header('Location:/ICTportal/login.php'); 
      }
      else
      {
         $row = mysql_fetch_array($result);
         $username = $row['username'];
         $password = $row['password'];
         setcookie("user", $username, time()+3600, "/");
         $_SESSION['msg'] = "Welcome $username";
         header('Location:/ICTportal/index.php');
         //echo "<br>Welcome '$username' <br>";
      }
   }
   else if ($_POST['submit'] == 'register')
   {
      $query = "insert into users values ('$username', '$password')";
      mysql_query($query) or die(mysql_error());
      $_SESSION['msg'] = "Your registration was successful $username, you can now log in";
      header('Location:/ICTportal/index.php'); 

   }
}
?>
