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

//check password is at least 8 characters long, etc***TODO***
  
else {  //attempt create new user
  $user = new User();
  $user->create_user($username, $password);
}


?>