<?php

require_once('./database.php');

Class User {
  public function get_all_users() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function create_user($username, $password) {
    $db = db_connect();

    //check if user already exists
    $statement = $db->prepare("SELECT * FROM users WHERE username = ?");  
    $statement->execute([$username]);
    if ($statement->rowCount() > 0) {
      echo "User already exists";  
      header("Location: /new_user.php");
    }
      
    else {  //create new user
      $password = password_hash($password, PASSWORD_DEFAULT); 
      $statement = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
      $statement->execute([$username, $password]);
      echo "User created successfully";  
      header("Location: /login.php");
    }
  }
  
}

?>