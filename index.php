<?php
  session_start();
  if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != true) {
    header("Location: /login.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Steve</title>
  </head>

  <body>

    <h1>Assignment 2</h1>

    <p>Welcome, <?php echo $_SESSION['username'] ?></p>
    <p><?php echo "Today is " . date ("l") . ", " . date("Y/m/d") ?></p>

  </body>

  <footer>
    <p></p><a href="/logout.php">Click here to logout</a>
  </footer>

</html>
