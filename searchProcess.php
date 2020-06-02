
<html>

<head>
    <title>Post Article</title>
    <meta http-wquiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1> Search Results </h1>

    <?php
    $conn = new mysqli('127.0.0.1', 'root', '', 'seer');

    $searchText = mysql_real_escape_string($conn,trim($_GET['searchArticles']));
    $sql = "SELECT author_name, author_title, 'date', methods, outcome FROM articles WHERE author_name LIKE '%$searchText%' 
    OR author_title LIKE '%$searchText%' OR methods LIKE '%$searchText%' OR outcomes LIKE '%$searchText%';"; 
    $result = mysqli_query($conn, $sql);
    $qResult = mysqli_num_rows($result);
    //prints results if table has data
    if(!empty($result))
    {
        echo "<table border = 1 align = center  cellpadding=10>";
        echo"<tr><td class =head>Author Name</td>
        <td class =head>Title</td>
        <td class =head>Date</td>
        <td class =head>Methods</td>
        <td class =head>Outcome</td></tr>";      
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