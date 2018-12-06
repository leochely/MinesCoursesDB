<?php
    session_start();
    include 'credentials.php';

    $conn = new mysqli($servername, $username, $password, $database);

    if($conn -> connect_error){
        die("Connection Failed: ". $conn->connect_error);
    }

   
    
    //We should probably hash the password before doing this

    $getUser = $conn->prepare("SELECT  username from users where username = ?");
    if($getUser === false){
        die("Failed at preparing statement " . $conn->error);
    }
    $getUser->bind_param('s', $email);
    $email = $_POST['username'];
    $getUser->execute();
    $result = $getUser->get_result();

    if (mysqli_num_rows($result) == 0){
        die("No email match");
    }
    $msg = "Please confirm your email to reset password by clicking the following link: localhost/resetpass.php?email=$email";

    $msg = wordwrap($msg, 70);

    mail($email, "Reset Mines Courses Database Passwword", $msg);
?>