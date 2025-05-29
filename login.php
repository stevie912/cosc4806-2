<?php
  session_start();

  if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
    header("Location: /");
  }

  if (isset($_SESSION['failed_attempts'])) {
    echo "This is unsuccessful attempt number " . $_SESSION['failed_attempts'];
    echo "<br>Input hash: " . $_SESSION['pass'];
    echo "<br>DB hash: " . $_SESSION['valid_pass'];
  }

  if (isset($_SESSION['no_user'])) {
    echo "No such user exists";
    unset($_SESSION['no_user']);  
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>

  <body>

    <h1>Login Form</h1>

    <form action="/validate.php" method="post">
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="password">
      <br><br>
      <input type="submit" value="Submit">
    </form>

    <br>
    <a href="/new_user.php"><h4>Create new user</h4></a>
  </body>
</html>