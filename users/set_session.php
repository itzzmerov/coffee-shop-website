<?php
require('db.php');
require_once 'google-client/vendor/autoload.php';
session_start();

// Verify the ID token and get the user data from Google
$id_token = $_POST['id_token'];
$client = new Google_Client(['client_id' => '838321752460-6ah497tdpkbekj7lfj5so48suaqhu1e7.apps.googleusercontent.com']);
$payload = $client->verifyIdToken($id_token);
if ($payload) {
    $email = $payload['email'];
    $username = $payload['name'];
    
    // Check if the user exists in the database
    $query = "SELECT * FROM `users` WHERE email='$email'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        // Insert the user into the database
        $query = "INSERT INTO `users` (username, email) VALUES ('$username', '$email')";
        mysqli_query($con, $query);
    }
    
    // Set the user session
    $_SESSION['username'] = $username;
    
    echo 'success';
} else {
    echo 'error';
}
?>