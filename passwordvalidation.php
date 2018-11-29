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

    $getUser = $conn->prepare("SELECT * FROM users WHERE username = ?");
    if($getUser === false){
        die("Failed at preparing statement " . $conn->error);
    }
    $getUser->bind_param('s', $email);

    $getUser->execute();
    $results = $getUser->get_result();

    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            if($password === $row['pass']){
                $_SESSION['timeout'] = date("Y/m/d H:i:s", strtoTime("+30 minutes"));
                header('Location: /profileHome.php');
            } else {
                header("location:javascript://history.go(-1)");
                //Add some warning to user that it was the wrong password
            }
        }
    } else {
        header("location:javascript://history.go(-1)");
        //Add some warning to user that it was the wrong username
    }
?>