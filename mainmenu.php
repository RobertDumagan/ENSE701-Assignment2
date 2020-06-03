<?php
  session_start();
?>
<html>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>SEER</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="mainmenuProcess.js"></script>
    <h1><center>Welcome to SEER!</center></h1>
    <?php
      if($_SESSION["userRole"]=="moderator"){
        echo "<form action=\"modQueue.php\">
        <input type=\"submit\" value=\"View Moderator Queue\" />
      </form>";
      }else if($_SESSION["userRole"]=="analyst"){
        echo "<form action=\"analQueue.php\">
        <input type=\"submit\" value=\"View Analyst Queue\" />
      </form>";
      }else if($_SESSION["userRole"]=="admin"){
        echo "<form action=\"modQueue.php\">
        <input type=\"submit\" value=\"View Moderator Queue\" />
      </form>";
        echo "<form action=\"analQueue.php\">
        <input type=\"submit\" value=\"View Analyst Queue\" />
      </form>";
      }
    ?>

    <form action="postArticle.html">
      <input type="submit" value="Post Article" />
    </form>
    <form action="searchArticle.html">
      <input type="submit" value="Search Article" />
    </form>
    <form action="account.php">
      <input type="submit" value="Account Details" />
    </form>
    <form action="index.html">
      <input type="submit" value="Log Out" />
    </form>
    
  </head>
  <body id="mainBody"></body>
</html>
