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
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
        }

        $checkUsernamequery = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
        $checkPasswordquery = mysqli_query($conn, "SELECT password FROM users WHERE password='$password'");
        $checkEmailquery = mysqli_query($conn, "SELECT email FROM users WHERE username='$email'");

        //if data exists in db check
        if (mysqli_num_rows($checkUsernamequery) > 0) {
            echo "<label>Username: '" . $username . "' already exists! Try a different one!</label><br>";
            echo '<p><a href="register.html" class="linkbutton">Back</a></p>';
        } else if (mysqli_num_rows($checkEmailquery) > 0) {
            echo "<label>Email Address: '" . $email . "' already exists! Try a different one!</label><br>";
            echo '<p><a href="register.html" class="linkbutton">Back</a></p>';
        } else {
            $insertDetailsquery = mysqli_query($conn, "INSERT into users VALUES('$username', '$password', '$email')");
            echo "<label>You have successfully registered for SEER!</label>";
            echo '<p><a href="index.html" class="linkbutton">Login Now!</a></p>';
        }
    }
    ?>

</html>