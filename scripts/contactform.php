<?php
// E-mailadres receiver
$mail_rec = 'youremail@domain.nl'; // <<<----- voer jouw e-mailadres hier in!

// Special checks for name and e-mailaddress
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // name check 
    if (empty($_POST['name']))
        $name_err = 1;
    // e-mail check 
    if (function_exists('filter_var') && !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
            $email_err = 1;
}

//Check all fields
if (empty($_POST['name']) || !empty($name_err) || empty($_POST['mail']) || !empty($email_err) || empty($_POST['type']) || empty($_POST['message']) || $_SERVER['REQUEST_METHOD'] == 'GET')
{
   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      if (!empty($name_err))
         echo '<p><b>U bent vergeten uw naam in te vullen</b></p>';
      elseif (!empty($email_err))
         echo '<p><b>Uw email adres is niet correct</b></p>';
      else
         echo '<p><b>U bent vergeten uw naam, email adres, type of bericht in te vullen</b></p>';
   }


  // (re)build HTML e-mail form
  echo '<form method="post" action="' . $_SERVER['REQUEST_URI'] . '" />
  <p>
  
      <label for="name">Naam:</label><br />
      <input type="text" id="naam" name="name" value="' . $_POST['name'] . '" /><br />
      
      <label for="mail">E-mail adres:</label><br />
      <input type="text" id="mail" name="mail" value="' . $_POST['mail'] . '" /><br />
      
      <label for="type">Type:</label><br />
      <select id="type" name="type"> 
        <option selected>incident
        <option>rfc
        <option>servicerequest
        <option>support
      </select><br />
      
      <label for="message">Bericht:</label><br />
      <textarea id="message" name="message" rows="8" style="width: 400px;">' . $_POST['message'] . '</textarea><br />
      
      <input type="submit" name="submit" value=" Send " />
  </p>
  </form>';
}
else // store in database
{      
  // set date
  $datum = date('d/m/Y H:i:s');

  mysql_connect("localhost", "ictportal", "ictportal") or die(mysql_error());
  mysql_select_db("ictportal") or die(mysql_error());
  if (isset($_COOKIE['user'])) 
  {
     $author =  $_COOKIE['user'];
  }
  else
  {
     $author = 'anonymous';
  }
  $type = $_POST['type'];
  $status = 'new';
  $message = $_POST['message'];
  $priority ='low';
  $query = "insert into tickets values ('', '$type', '$status', '$author', '$message', '$priority')";
  mysql_query($query) or die(mysql_error());
  
  echo '<h1>Uw bericht is verstuurd</h1>
  <p>Bedankt voor het invullen van het formulier. We zullen zo spoedig mogelijk contact met u opnemen.</p>';
}
?>
