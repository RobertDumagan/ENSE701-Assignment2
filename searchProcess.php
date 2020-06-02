<!DOCTYPE html>
<html>

<head>
    <title>Post Article</title>
    <meta http-wquiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <h1> Search Results </h1>


    <?php

    //connects to database based on settings file (change details)
    include_once '/home/xrn3664/conf/settings.php';




    $searchTxt = trim($_GET['searchArticles']);
    $query = "SELECT * FROM seer WHERE  LIKE '%$searchTxt%';"; //searches for database based on Status
    $result = mysqli_query($conn, $query);
   
    
    //prints results if table has data
    if(!empty($result)){
        echo "<table border = 1 align = center  cellpadding=10>";
        echo"<tr><td class =head>Status Code</td><td class =head>Status</td><td class =head>Share</td><td class =head>Date</td><td class =head>Permission(s)</td></tr>";      
       //loop to print each search result
        while($row = mysqli_fetch_assoc($result)){
            echo "<br><tr><td>" . 
            $row["author_name"] . "</td><td>" .
            $row["author_title"] . "</td><td>" .
            $row["date"] . "</td><td>" . 
            $row["methods"] . "</td><td>" . 
            $row["outcome"] . "</td></tr>";
        }
        echo "</table";
    }

    ?>
</body>

</html>