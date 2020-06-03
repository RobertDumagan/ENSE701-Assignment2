

<html>

<head>
    <title>Search Article</title>
    <meta http-wquiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1> Search Results </h1>

    <?php
    $conn = new mysqli('127.0.0.1', 'root', '', 'seer');

    $search = mysqli_real_escape_string($conn, $_GET['searchArticles']);
    $sql = ("SELECT * FROM articles WHERE author_name LIKE '%$search%' OR author_title LIKE '%$search%' 
    OR methods LIKE '%$search%' OR date LIKE '%$search%' OR outcome LIKE '%$search%'");
    $result = mysqli_query($conn, $sql);


    if(!empty($result))
    {
        echo "<table border = 1 align = center  cellpadding=10>";
        echo"<tr><td class =head>Author Name</td>
        <td class =head>Title</td>
        <td class =head>Date</td>
        <td class =head>Methods</td>
        <td class =head>Outcome</td></tr>";

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

    else
    {
            echo "There are no articles containing your search keywords!";
    }
    ?>
</body>

</html>