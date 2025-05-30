<?php

session_start();
require_once('./database.php');

$username = $_REQUEST['username'];
$_SESSION['username'] = $username;
$password = $_REQUEST['password'];

$db = db_connect();
//check user is in database
$statement = $db->prepare("SELECT * FROM users WHERE username = ?");
$statement->execute([$username]);

if ($statement->rowCount() == 0) {  //user not found
  $_SESSION['no_user'] = true;
  header("Location: /login.php");

}
  
else {
  //get hashed password from database
  $statement = $db->prepare("SELECT password FROM users WHERE username = :username");
  $statement->bindParam(':username', $username);
  $statement->execute();
  $statement->bindColumn('password', $valid_password);
  $$valid_password = $statement->fetch(PDO::FETCH_BOUND);
      
  //check if password is correct
  if (password_verify($password, $valid_password)) {
    $_SESSION['authenticated'] = true;
    header("Location: /");
  } else {
    if (!isset($_SESSION['failed_attempts'])) {
      $_SESSION['failed_attempts'] = 1;
    } else {
      $_SESSION['failed_attempts'] += 1;
    }
  
    header("Location: /login.php");
  
  }
}
?>