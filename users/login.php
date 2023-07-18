<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>KapeTann | Login Form</title>
        <link rel="stylesheet" href="../assets/css/login.css"/>
        <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico"><!-- Favicon / Icon -->
        <script src="https://accounts.google.com/gsi/client" async defer></script>
    </head>
    <body>
        <?php
            require('db.php');
            session_start();
            // When form submitted, check and create user session.
            if (isset($_POST['username'])) {
                $username = stripslashes($_REQUEST['username']);// removes backslashes
                $username = mysqli_real_escape_string($con, $username);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);
                // Check user is exist in the database
                $query    = "SELECT * FROM `users` WHERE username='$username'
                            AND password='" . md5($password) . "'";
                $result = mysqli_query($con, $query);
                $rows = mysqli_num_rows($result);
                if ($rows == 1) {
                    $_SESSION['username'] = $username;
                    // Redirect to user dashboard page
                    header("Location: index.php");
                } else {
                    echo "<div class='form'>
                        <h3>Incorrect Username/password.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                        </div>";
                }
            } else {
        ?>
            <form class="form" method="post" name="login">
                <center>
                    <img src="../assets/images/logo.png" alt="" class="img img-fluid">
                </center>
                <hr />
                <h1 class="login-title">Login</h1>
                <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
                <input type="password" class="login-input" name="password" placeholder="Password"/>
                <input type="submit" value="Login" name="submit" class="login-button"/>
                <p class="link">Don't have an account? <a href="registration.php">Register here!</a></p>
                <hr />

                <div id="g_id_onload"
                    data-client_id="838321752460-6ah497tdpkbekj7lfj5so48suaqhu1e7.apps.googleusercontent.com"
                    data-context="signin"
                    data-ux_mode="popup"
                    data-login_uri="https://kapetanncoffeeshop.infinityfreeapp.com"
                    data-auto_prompt="false">
                </div>

                <div class="g_id_signin"
                    data-type="standard"
                    data-shape="rectangular"
                    data-theme="outline"
                    data-text="signin_with"
                    data-size="large"
                    data-logo_alignment="center"
                    data-callback="onSignIn">
                </div>
        </form>
        <?php
            }
        ?>

        <script src="js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            function onSignIn(googleUser) {
                // Get the user ID token
                var id_token = googleUser.getAuthResponse().id_token;

                // Send the token to the server using AJAX
                $.ajax({
                    type: 'POST',
                    url: 'set_session.php',
                    data: { id_token: id_token },
                    success: function(response) {
                        // Redirect to the index.php page
                        window.location.href = 'index.php';
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        </script>
    </body>
</html>