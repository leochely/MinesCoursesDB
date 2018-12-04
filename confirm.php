<?php
    session_start();
    include 'credentials.php';

    echo $servername;
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn -> connect_error){
        die("Connection Failed: ". $conn->connect_error);
    }

    $email = $_GET['email'];
    $password = $_GET['password'];
    //We should probably hash the password before doing this

    $getUser = $conn->prepare("SELECT * FROM temp_users WHERE username = ?");
    if($getUser === false){
        die("Failed at preparing statement " . $conn->error);
    }
    $getUser->bind_param('s', $email);

    $getUser->execute();
    $results = $getUser->get_result();

    if($results->num_rows > 0){
        $finalInsert = $conn->prepare("INSERT INTO users (username, pass) VALUES (?,?)");
        if($finalInsert === false){
            die("Failed at preparing statement " . $conn->error);
        }

        $finalInsert->bind_param('ss', $email, $password);

        $finalInsert->execute();
    }
?>
