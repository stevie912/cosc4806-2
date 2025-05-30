<?php

require_once('./database.php');

Class User {

  public function create_user($username, $password) {
    $db = db_connect();

    //check if user already exists
    $statement = $db->prepare("SELECT * FROM users WHERE username = ?");  
    $statement->execute([$username]);
    if ($statement->rowCount() > 0) {
      $_SESSION['user_exists'] = true; 
      header("Location: /new_user.php");
    }
      
    else {  //create new user
      $password = password_hash($password, PASSWORD_DEFAULT); 
      $statement = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
      $statement->execute([$username, $password]);
      echo "User created successfully";  
      echo "<br><a href='/login.php'>Click here to login</a>";
    }
  }
  
}

?>