<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Register Process</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
    <?php
    $conn = new mysqli('127.0.0.1', 'root', '', 'seer');

    if (!$conn) {
        die("<p>Could not connect: </p>" . mysqli_error($connection));
    } else {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }

        $checkUsernamequery = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
        $checkPasswordquery = mysqli_query($conn, "SELECT password FROM users WHERE password='$password'");

        //if data exists in db check
        if (mysqli_num_rows($checkUsernamequery) > 0 && mysqli_num_rows($checkPasswordquery) > 0) {
            echo "<h1>Logged In!</h1><br>";
            echo '<p><a href="mainmenu.html" class="linkbutton">Continue to homepage</a></p>';
        } else if (mysqli_num_rows($checkUsernamequery) == 0) {
            echo "<label id='invalid'>Invalid Username! Try Again!</label>";
            echo '<p><a href="index.html" class="linkbutton">Back</a></p>';
        } else {
            echo "<label>Invalid Password! Try Again!</label>";
            echo '<p><a href="index.html" class="linkbutton">Back</a></p>';
        }
    }
    ?>

</html>