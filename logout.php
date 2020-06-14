<?php
    session_start();
    session_unset();

    echo("<script>window.replace.location('index.html')</script>");
?>