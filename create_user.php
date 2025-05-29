<?php
session_start();
require_once('./user.php');

$username = $_REQUEST['username'];
$_SESSION['username'] = $username;
$password = $_REQUEST['password'];
$password2 = $_REQUEST['password2'];

//check if passwords entered match
if ($password != $password2) {
  $_SESSION['pass_mismatch'] = true;
  header("Location: /new_user.php");
} 
  
else {  //attempt create new user
  $user = new User();
  $user->create_user($username, $password);
}


?>