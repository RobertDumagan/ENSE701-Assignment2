<?php
  session_start();
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>SEER</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <h1><center>Acount Details</center></h1>
    <form action="mainmenu.html">
      <input type="submit" value="Back" />
    </form>
  </head>
  <body id="mainBody">
    <?php
      $conn = new mysqli('127.0.0.1', 'root', '', 'seer');

      if (!$conn) {
          die("<p>Could not connect: </p>" . mysqli_error($connection));
      } else {
          $username = $_SESSION['username'];
          $password = $_SESSION['password'];

          $getEmail = mysqli_query($conn, "SELECT email FROM users WHERE username='$username'");
          $result = mysqli_fetch_row($getEmail);

          echo "<p>Username: $username</p>";
          echo "<p>Password: $password</p>";
          echo "<p>Email: $result[0]</p>";

          $getRole1 = mysqli_query($conn, "SELECT moderator from users where username='$username'");
          $getRole1Result = mysqli_fetch_row($getRole1);
          $getRole2 = mysqli_query($conn, "SELECT analyst from users where username='$username'");
          $getRole2Result = mysqli_fetch_row($getRole1);
          $getRole3 = mysqli_query($conn, "SELECT administrator from users where username='$username'");
          $getRole3Result = mysqli_fetch_row($getRole1);

          if($getRole3Result[0] == 1){
            echo "<p>Account Role(s): Administrator";
          }elseif($getRole1Result[0] == 1){
            echo "<p>Account Role(s): Moderator";
          }elseif ($getRole2Result[0] == 1) {
            echo "<p>Account Role(s): Analyst";
          }else{
            echo "<p>Account Role(s): Standard";
          }
          $getAccDate = mysqli_query($conn, "SELECT accDate from users where username='$username'");
          $dateResult = mysqli_fetch_row($getAccDate);
          echo "<P>Account created on: $dateResult[0]</p>";
      }

      mysqli_close($conn);
    ?>
  </body>
</html>
