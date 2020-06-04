<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Search Status Form</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <h1><center>Moderator Queue</center></h1>
    <form method="POST" action="mainmenu.php">
      <input type="submit" value="Back" />
    </form>
    <br /><br />
  </head>
  <body>
    <table style="width:100%">
        <tr>
          <th>ID</th>
          <th>Full Article</th>
        </tr>
        <?php
          $conn = new mysqli('127.0.0.1', 'root', '', 'seer');
          if (!$conn) {
            die("<p>Could not connect: </p>" . mysqli_error($connection));
          } else {
            $getArticleID = mysqli_query($conn, "SELECT id FROM modqueue");
            $rowNum = mysqli_num_rows($getArticleID);
            $result = mysqli_fetch_row($getArticleID);
            //echo "$rowNum";

            $getArticle = mysqli_query($conn, "SELECT article from modqueue");
            $rowNum2 = mysqli_num_rows($getArticle);
            $result2 = mysqli_fetch_row($getArticle);
            //echo "$rowNum2";
            for($i = 0; $i < $rowNum;$i++){
              echo "<tr>";
              echo "<td>".$result[0]."<td>";
              echo "<td>".$result2[0]."<td>";
              echo "</tr>";
            }
          }
        ?>
        
    </table>
  </body>
</html>
