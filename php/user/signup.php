<?php

require_once '../db.php';

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

if ($password == $cpassword) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO user (name, email, phone, password) 
    VALUES ('$name', '$email', '$phone', '$hashed_password')";
    mysqli_query($connect, $query);
    header("Location: ../../index.php");
}
else {
    echo '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error</title>
        <!-- The styles -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../css/style.css" />
    </head>
    
    <body>
        <div style="margin-top: 40px;" class="container">
            <h1>Passwords does not match!</h1>
            <a style="margin-top: 20px;" class="btn btn-primary" href="../../pages/signup.html">Back to Signup</a>
        </div>
    </body>
    
    </html>';
}

?>