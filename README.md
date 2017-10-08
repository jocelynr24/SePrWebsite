# Instructions for the security of the WEB app

Please, follow the following instructions when you develop the WEB app.

## Manage access to pages

If your page is visited by a teacher or an administrator, you have to put the following code (between `<?php` and `?>` tags) to authorize or deny the user to access this page.

- Here is the code to put in the visible page:
```
if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 1)){
 // Your code
} else {
     echo 'You are not authorized to access this page!<br/><a href="index.php">Go to home page</a>';
}
```

- Also, you have to put a similar code in the pages which connect to the database (in "includes/dynamic"):
```
if(isset($_SESSION["logged"]) && ($_SESSION["role"] == 1) && ($_SESSION['token'] == $token)){
  // Your code
}
```

The roles are:
- 1: administrator
- 2: teacher
- 3: student

You have to replace the role you want: `$_SESSION["role"] == 1`.

**Please, take a look on some pages that have implemented this type of code.**



## Token in forms

If your page contains a form, you have to add a token to secure the form (avoid CSRF).

- This token is generated at the start of a form page, each time the user go in a page with a form:
```
$token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
```

- Then, the token is stored in the session and passed through the POST method, thanks to an input of type "hidden":
```
<input type="hidden" name="token" value='.$token.'>
```

- Finally, we get the token in the page that connect to the database:
```
$token = $_POST["token"];
```

- Consequently, if the "POST" token is equal to the token in session, it is good, else no:
```
if(isset($_SESSION["logged"]) && ($_SESSION["role"] == 1) && ($_SESSION['token'] == $token)){
  // Your code
}
```

**Please, take a look on some pages that have implemented this type of code.**