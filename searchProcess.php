

<html>

<head>
    <title>Search Article</title>
    <meta http-wquiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1> Search Results </h1>

    <?php
    $conn = new mysqli('us-cdbr-east-05.cleardb.net', 'b71967a7225592', 'a5c07dd8', 'heroku_98ace43fd919bd3');

    if(isset($_GET['order']))
    {  
       $order= $_GET['order'];
    }
    else
    {
        $order = 'author_name';
    }

    if(isset($_GET['sort']))
    {  
        $sort= $_GET['sort'];
    }
    else
    {
        $sort = 'ASC';
    }

    $search = mysqli_real_escape_string($conn, $_GET['searchArticles']);
    $filter = mysqli_real_escape_string($conn, $_GET['filter']);
    $display = $_GET['displayList'];
    $startDate = mysqli_real_escape_string($conn, $_GET['startDate']);
    $endDate =  mysqli_real_escape_string($conn,$_GET['endDate']);
    
    //if the option select variable is not the same, $filter = default
    if ($filter == "" || ($filter != "authorName" && $filter != "authorTitle" && $filter != "journal" && $filter != "articleYear"))
        $filter ="default";


    if ($filter=='default') 
    {
        $sql = ("SELECT * FROM articles WHERE authorName LIKE '%$search%' 
        OR authorTitle LIKE '%$search%' OR journal LIKE '%$search%' 
        OR outcome LIKE '%$search%' and articleYear BETWEEN '$startDate' and '$endDate'
        ORDER BY $order $sort"); 
    }
    else 
     {
    $sql = ("SELECT * FROM articles WHERE $filter LIKE '%$search%' ORDER BY $order $sort"); 
     }
    
    $result = mysqli_query($conn, $sql);


    if(!empty($result) && $display == "option1")
    {
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

        echo "<table border = 1 align = center  cellpadding=10>";
        echo
        "<tr>
        <th><a href='?order=author_name&&sort=$sort'>Author Name</a></th>
        <th><a href='?order=author_title&&sort=$sort'>Title</a></th>
        <th><a href='?order=date&&sort=$sort'>Journal</a></th>
        <th><a href='?order=methods&&sort=$sort'>Year</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Volume</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Article Number</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Article Pages</a></th>
        </tr>";

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br>
            <tr>
            <td>" . $row["authorName"] . "</td>
            <td>" . $row["authorTitle"] . "</td>
            <td>" . $row["journal"] . "</td> 
            <td>" . $row["articleYear"] . "</td>
            <td>" . $row["volume"] . "</td>
            <td>" . $row["articleNum"] . "</td>
            <td>" . $row["articlePages"] . "</td>
            </tr>";
        }
        echo "</table";
        
        echo "<th><a href='searchForm.html'>Search Again</a></th>";
    }

    elseif(!empty($result) && $display == "option2")
    {
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

        echo "<table border = 1 align = center  cellpadding=10>";
        echo
        "<tr>
        <th><a href='?order=author_name&&sort=$sort'>Author Name</a></th>
        <th><a href='?order=author_title&&sort=$sort'>Title</a></th>
        <th><a href='?order=methods&&sort=$sort'>Year</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Volume</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Article Number</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Article Pages</a></th>
        </tr>";

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br>
            <tr>
            <td>" . $row["authorName"] . "</td>
            <td>" . $row["authorTitle"] . "</td>
            <td>" . $row["articleYear"] . "</td>
            <td>" . $row["volume"] . "</td>
            <td>" . $row["articleNum"] . "</td>
            <td>" . $row["articlePages"] . "</td>
            </tr>";
        }
        echo "</table";
        
        echo "<th><a href='searchForm.html'>Search Again</a></th>";
    }

    elseif(!empty($result) && $display == "option3")
    {
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

        echo "<table border = 1 align = center  cellpadding=10>";
        echo
        "<tr>
        <th><a href='?order=author_name&&sort=$sort'>Author Name</a></th>
        <th><a href='?order=author_title&&sort=$sort'>Title</a></th>
        <th><a href='?order=date&&sort=$sort'>Journal</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Volume</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Article Number</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Article Pages</a></th>
        </tr>";

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br>
            <tr>
            <td>" . $row["authorName"] . "</td>
            <td>" . $row["authorTitle"] . "</td>
            <td>" . $row["journal"] . "</td> 
            <td>" . $row["volume"] . "</td>
            <td>" . $row["articleNum"] . "</td>
            <td>" . $row["articlePages"] . "</td>
            </tr>";
        }
        echo "</table";
        
        echo "<th><a href='searchForm.html'>Search Again</a></th>";
    }

    elseif(!empty($result) && $display == "option4")
    {
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

        echo "<table border = 1 align = center  cellpadding=10>";
        echo
        "<tr>
        <th><a href='?order=author_title&&sort=$sort'>Title</a></th>
        <th><a href='?order=date&&sort=$sort'>Journal</a></th>
        <th><a href='?order=methods&&sort=$sort'>Year</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Volume</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Article Number</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Article Pages</a></th>
        </tr>";

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br>
            <tr>
            <td>" . $row["authorTitle"] . "</td>
            <td>" . $row["journal"] . "</td> 
            <td>" . $row["articleYear"] . "</td>
            <td>" . $row["volume"] . "</td>
            <td>" . $row["articleNum"] . "</td>
            <td>" . $row["articlePages"] . "</td>
            </tr>";
        }
        echo "</table";
        
        echo "<th><a href='searchForm.html'>Search Again</a></th>";
    }


    else
    {
            echo "There are no articles containing your search keywords!";

            echo "<th><a href='searchForm.html'>Search Again</a></th>";
    }
?>


</body>

</html>
