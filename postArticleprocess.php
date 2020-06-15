<?php
    session_start();
    $_SESSION["status"];
    $userStatus = $_SESSION["status"];
    
    $conn = new mysqli('us-cdbr-east-05.cleardb.net', 'b71967a7225592', 'a5c07dd8', 'heroku_98ace43fd919bd3');

    if (!$conn) {
        die("<p>Could not connect to Database: </p>" . mysqli_error($conn));
    } else {
             $author = $_POST['authorName'];
            $title = $_POST['articleTitle'];
            $journal = $_POST['journalName'];
            $year = $_POST['articleYear'];
            $volume = $_POST['articleVolume'];
            $num = $_POST['articleNumber'];
            $pages = $_POST['articlePages'];
            //$month = $_POST['articleMonth'];
            $DOI = $_POST['doi'];
        
        $apaString = "$author".". (".$year.")".". ".$title.". "."$journal" .", ".$volume."(".$num."), ".$pages.". ".$DOI."";

        $insertArticle = mysqli_query($conn, "INSERT into modqueue (article) VALUES('$apaString')");
        $insertArticle2 = mysqli_query($conn, "INSERT into articles (authorName, authorTitle, journal, articleYear, volume, articleNum, articlePages, doi) VALUES ('$author', '$title', '$journal', '$year', '$volume', '$num', '$pages', '$DOI')");

        if($insertArticle && $insertArticle2){
            echo "<script>alert(\"Successfully posted the Article! Now awaiting Moderation!\");";
            echo "window.location.replace('postArticle.html');";
            echo "</script>";
        }else{
            echo "<script>alert(\"Error! Something Went Wrong:\");";
            echo "window.location.replace('postArticle.html');";
            echo "</script>";

        }
    }
?>