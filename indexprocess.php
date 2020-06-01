<?php
    session_start();
?>

<?php
    $conn = new mysqli('127.0.0.1', 'root', '', 'seer');

    if (!$conn) {
        die("<p>Could not connect: </p>" . mysqli_error($connection));
    } else {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
        }

        $checkUsernamequery = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
        $checkPasswordquery = mysqli_query($conn, "SELECT password FROM users WHERE password='$password'");

        //if data exists in db check
        if (mysqli_num_rows($checkUsernamequery) > 0 && mysqli_num_rows($checkPasswordquery) > 0) {
            $doc = new DOMDocument();
            $doc->loadHTMLFile("mainmenu.html");
            echo $doc->saveHTMLFile();
            echo "<script>alert(\"Successfully Logged In!\");";
            echo "window.location.replace('mainmenu.html');";
            echo "</script>";
        } else if (mysqli_num_rows($checkUsernamequery) == 0) {
            echo "<script>alert(\"Invalid Username!\");";
            echo "window.location.replace('index.html');";
            echo "</script>";
        } else {
            echo "<script>alert(\"Invalid Password!\");";
            echo "window.location.replace('index.html');";
            echo "</script>";
        }
    }
?>