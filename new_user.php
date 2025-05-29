<?php
session_start();

if (isset($_SESSION['pass_mismatch'])) {
  echo "Passwords do not match";
  unset($_SESSION['pass_mismatch']);
}
if (isset($_SESSION['user_exists'])) {
  echo "User already exists"; 
  unset($_SESSION['user_exists']);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>New user</title>
  </head>

  <body>

    <h1>Create new user</h1>

    <form action="/create_user.php" method="post">
      <label for="username">New username:</label>
      <br>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">New password:</label>
      <br>
      <input type="password" id="password" name="password">
      <br>
      <label for="password">Confirm password:</label>
      <br>
      <input type="password" id="password2" name="password2">
      <br><br>
      <input type="submit" value="Submit">
    </form>

  </body>
</html>