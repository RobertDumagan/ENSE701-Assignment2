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
      $conn = new mysqli('us-cdbr-east-05.cleardb.net', 'b71967a7225592', 'a5c07dd8', 'heroku_98ace43fd919bd3');


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

          $getRoleMod = mysqli_query($conn, "SELECT moderator from users where username='$username'");
          $result1 = mysqli_fetch_row($getRoleMod);
          $getRoleAnal = mysqli_query($conn, "SELECT analyst from users where username='$username'");
          $result2 = mysqli_fetch_row($getRoleAnal);
          $getRoleAdmin = mysqli_query($conn, "SELECT administrator from users where username='$username'");
          $result3 = mysqli_fetch_row($getRoleAdmin);

          if($result3[0] == 1){
            echo "<p>Account Role(s): Administrator";
          }elseif($result1[0] == 1){
            echo "<p>Account Role(s): Moderator";
          }elseif ($result2[0] == 1) {
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
