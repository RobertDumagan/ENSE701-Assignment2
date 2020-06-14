

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
    if ($filter == "" || ($filter != "author_name" && $filter != "author_title" && $filter != "methods" && $filter != "outcome"))
        $filter ="default";


    if ($filter=='default') 
    {
        $sql = ("SELECT * FROM articles WHERE author_name LIKE '%$search%' 
        OR author_title LIKE '%$search%' OR methods LIKE '%$search%' 
        OR outcome LIKE '%$search%' and a_date BETWEEN '$startDate' and '$endDate'
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
        <th><a href='?order=date&&sort=$sort'>Date</a></th>
        <th><a href='?order=methods&&sort=$sort'>Method</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Outcome</a></th>
        </tr>";

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br>
            <tr>
            <td>" . $row["author_name"] . "</td>
            <td>" . $row["author_title"] . "</td>
            <td>" . $row["a_date"] . "</td> 
            <td>" . $row["methods"] . "</td>
            <td>" . $row["outcome"] . "</td>
            </tr>";
        }
        echo "</table";
        
        echo "<th><a href='http://localhost/ENSE701-Assignment2/searchForm.html'>Search Again</a></th>";
    }

    elseif(!empty($result) && $display == "option2")
    {
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

        echo "<table border = 1 align = center  cellpadding=10>";
        echo
        "<tr>
        <th><a href='?order=author_name&&sort=$sort'>Author Name</a></th>
        <th><a href='?order=author_title&&sort=$sort'>Title</a></th>
        <th><a href='?order=date&&sort=$sort'>Date</a></th>
        </tr>";

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br>
            <tr>
            <td>" . $row["author_name"] . "</td>
            <td>" . $row["author_title"] . "</td>
            <td>" . $row["a_date"] . "</td> 
            </tr>";
        }
        echo "</table";

        echo "<th><a href='http://localhost/ENSE701-Assignment2/searchForm.html'>Search Again</a></th>";
    }

    elseif(!empty($result) && $display == "option3")
    {
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

        echo "<table border = 1 align = center  cellpadding=10>";
        echo
        "<tr>
        <th><a href='?order=author_name&&sort=$sort'>Author Name</a></th>
        <th><a href='?order=methods&&sort=$sort'>Method</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Outcome</a></th>
        </tr>";

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br>
            <tr>
            <td>" . $row["author_name"] . "</td>
            <td>" . $row["methods"] . "</td>
            <td>" . $row["outcome"] . "</td>
            </tr>";
        }
        echo "</table";

        echo "<th><a href='http://localhost/ENSE701-Assignment2/searchForm.html'>Search Again</a></th>";
    }

    elseif(!empty($result) && $display == "option4")
    {
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

        echo "<table border = 1 align = center  cellpadding=10>";
        echo
        "<tr>
        <th><a href='?order=author_title&&sort=$sort'>Title</a></th>
        <th><a href='?order=methods&&sort=$sort'>Method</a></th>
        <th><a href='?order=outcome&&sort=$sort'>Outcome</a></th>
        </tr>";

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br>
            <tr>
            <td>" . $row["author_title"] . "</td>
            <td>" . $row["methods"] . "</td>
            <td>" . $row["outcome"] . "</td>
            </tr>";
        }
        echo "</table";

        echo "<th><a href='http://localhost/ENSE701-Assignment2/searchForm.html'>Search Again</a></th>";
    }


    else
    {
            echo "There are no articles containing your search keywords!";

            echo "<th><a href='http://localhost/ENSE701-Assignment2/searchForm.html'>Search Again</a></th>";
    }
?>


</body>

</html>