<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>KapeTann | Registration Form</title>
        <link rel="stylesheet" href="../assets/css/login.css"/>
        <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico"><!-- Favicon / Icon -->
    </head>
    <body>
        <?php
            require('db.php');
            // When form submitted, insert values into the database.
            if (isset($_REQUEST['username'])) {
                // removes backslashes
                $username = stripslashes($_REQUEST['username']);
                //escapes special characters in a string
                $username = mysqli_real_escape_string($con, $username);
                $name    = stripslashes($_REQUEST['name']);
                $name    = mysqli_real_escape_string($con, $name);
                $email    = stripslashes($_REQUEST['email']);
                $email    = mysqli_real_escape_string($con, $email);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);
                $create_datetime = date("Y-m-d H:i:s");
                $query    = "INSERT into `users` (name, username, password, email, create_datetime)
                            VALUES ('$name', '$username', '" . md5($password) . "', '$email', '$create_datetime')";
                $result   = mysqli_query($con, $query);
                if ($result) {
                    echo "<script>
                            alert('You are registered successfully.');
                            window.location.href = 'login.php';
                        </script>";
                } else {
                    echo "<div class='form'>
                            <h3>Required fields are missing.</h3><br/>
                        <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                        </div>";
                }
            } else {
        ?>
            <form class="form" action="" method="post">
                <center>
                    <img src="../assets/images/logo.png" alt="" class="img img-fluid">
                </center>
                <hr />
                <h1 class="login-title">Registration</h1>
                <input type="text" class="login-input" name="name" placeholder="Name" required />
                <input type="text" class="login-input" name="username" placeholder="Username" required />
                <input type="text" class="login-input" name="email" placeholder="Email Adress" required>
                <input type="password" class="login-input" name="password" placeholder="Password" required>
                <input type="submit" name="submit" value="Register" class="login-button">
                <p class="link">Already have an account? <a href="login.php">Login here!</a></p>
            </form>
        <?php
            }
        ?>
    </body>
</html>