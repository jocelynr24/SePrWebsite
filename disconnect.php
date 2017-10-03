<?php
session_start();
// Retour Menu
header("Location: index.php");
unset($_SESSION["logged"]);
unset($_SESSION["user"]);
unset($_SESSION["role"]);
unset($_SESSION["token"]);
?>