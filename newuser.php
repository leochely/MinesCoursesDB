<?php
    session_start();
    include 'credentials.php';

    $conn = new mysqli($servername, $username, $password, $database);

    if($conn -> connect_error){
        die("Connection Failed: ". $conn->connect_error);
    }

    $email = $_POST['username'];
    $password = $_POST['password'];
    //We should probably hash the password before doing this

    $getUser = $conn->prepare("INSERT INTO temp_users (username, pass) values (?, ?)");
    if($getUser === false){
        die("Failed at preparing statement " . $conn->error);
    }
    $getUser->bind_param('ss', $email, $password);

    $getUser->execute();
    
    $msg = "Please confirm your email by clicking the following link: localhost/confirm.php?email=$email&pass=$password";

    $msg = wordwrap($msg, 70);

    mail($email, "Confirmation to Mines Courses Database", $msg);
?>