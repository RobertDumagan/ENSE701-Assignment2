<?php
    session_start();
?>

<?php
    $conn = new mysqli('127.0.0.1', 'root', '', 'seer');
    //$_SESSION["status"] = "login";
    //$userStatus = $_SESSION["status"];

    if (!$conn) {
        die("<p>Could not connect: </p>" . mysqli_error($connection));
    } else {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
        }

        $checkPassword = mysqli_query($conn, "SELECT password FROM users WHERE username='$username'");
        $checkUname= mysqli_query($conn, "SELECT username FROM users WHERE password='$password'");

        if(mysqli_num_rows($checkPassword) >= 1){
            $row = mysqli_fetch_row($checkPassword);
        }
        if(mysqli_num_rows($checkUname) >= 1){
            $row1 = mysqli_fetch_row($checkUname);
        }

        $getRoleMod = mysqli_query($conn, "SELECT moderator from users where username='$username'");
        $result1 = mysqli_fetch_row($getRoleMod);
        $getRoleAnal = mysqli_query($conn, "SELECT analyst from users where username='$username'");
        $result2 = mysqli_fetch_row($getRoleAnal);
        $getRoleAdmin = mysqli_query($conn, "SELECT administrator from users where username='$username'");
        $result3 = mysqli_fetch_row($getRoleAdmin);
        //if data exists in db check
        if ($password == $row[0]) {
            if($result3[0] == 1){
                $_SESSION["userRole"] = "admin";
                echo "<p>Account Role(s): Administrator";
              }elseif($result1[0] == 1){
                $_SESSION["userRole"] = "moderator";
                echo "<p>Account Role(s): Moderator";
              }elseif ($result2[0] == 1) {
                $_SESSION["userRole"] = "analyst";
                echo "<p>Account Role(s): Analyst";
              }else{
                $_SESSION["userRole"] = "standard";
                echo "<p>Account Role(s): Standard";
              }
            header("Location: index.html");
            echo "<script>alert(\"Successfully Logged In!\");";
            echo "window.location.replace('index.html');";
            echo "</script>";
        } else if ($username != $row[0]) {
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