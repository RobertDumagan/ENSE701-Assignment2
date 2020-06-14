<?php
    session_start();
    $_SESSION["status"];
    $userStatus = $_SESSION["status"];

    $conn = new mysqli('127.0.0.1', 'root', '', 'seer');

    if (!$conn) {
        die("<p>Could not connect to Database: </p>" . mysqli_error($connection));
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

        if($insertArticle){
            echo "<script>alert(\"Successfully posted the Article! Now awaiting Moderation!\");";
            echo "window.location.replace('postArticle.html');";
            echo "</script>";
        }else{
            echo "<script>alert(\"Error! Something Went Wrong:\");"."$apaString";
            echo "window.location.replace('postArticle.html');";
            echo "</script>";

        }
    }
?>