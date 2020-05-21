<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Register Process</title>
</head>
<body>
<?php
    require_once ("../2020University/ENSE701/settings.php"); //please make sure the path is correct

    $conn = mysqli_connect($host,$user,$pswd, $dbnm);

    if(!$conn){
        die("<p>Could not connect: </p>".mysqli_error($connection));
    }else{
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
        }

        $checkUsernamequery = mysqli_query($conn, "SELECT username FROM userDetails WHERE username='$username'");
        $checkPasswordquery = mysqli_query($conn, "SELECT password FROM userDetails WHERE password='$password'");
        $checkEmailquery = mysqli_query($conn, "SELECT email FROM userDetails WHERE username='$email'");

        if(mysqli_num_rows($checkUsernamequery) > 0){
            echo "<label>Username: '".$username."' already exists! Try a different one!</label><br>";
        }else if(mysqli_num_rows($email) > 0){
            echo "<label>Email Address: '".$email."' already exists! Try a different one!</label><br>";
        }else{
            $insertDetailsquery = mysqli_query ($conn, "INSERT into userDetails VALUES($username, $password, $email)");
            echo "<label>Success! User is registered!</label>";
            echo '<p><a href="login.html" class="linkbutton">Login Now!</a></p>';
        }
    }
?>
</body>
</html> 