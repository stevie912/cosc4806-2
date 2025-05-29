<?php


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