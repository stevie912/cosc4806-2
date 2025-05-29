<?php
start_session();
require_once('./user.php');

$username = $_REQUEST['username'];
$_SESSION['username'] = $username;
$password = $_REQUEST['password'];
$password2 = $_REQUEST['password2'];

//check if passwords entered match
if ($password != $password2) {
  echo "Passwords do not match";
  header("Location: /new_user.php");
} 
  
else {  //attempt create new user
  $user = new User();
  $user->create_user($_POST[$_REQUEST['username']], $_POST[$_REQUEST['password']]);
}


?>