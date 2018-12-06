<?php
    session_start();
    include 'credentials.php';

    $conn = new mysqli($servername, $username, $password, $database);

    if($conn -> connect_error){
        die("Connection Failed: ". $conn->connect_error);
    }

    $email = $_POST['username'];
    $password = $_POST['password'];

    $finalInsert = $conn->prepare("INSERT INTO users (username, pass) VALUES (?,?)");
    if($finalInsert === false){
        die("Failed at preparing statement " . $conn->error);
    }

    $finalInsert->bind_param('ss', $email, $password);

    $finalInsert->execute();
?>