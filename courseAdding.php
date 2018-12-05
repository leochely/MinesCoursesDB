<?php
  session_start();
  include 'credentials.php';

  $conn = new mysqli($servername, $username, $password, $database);

  if($conn -> connect_error){
      die("Connection Failed: ". $conn->connect_error);
  }

  $id = $_POST['id'];
  $name = $_POST['name'];
  $department = $_POST['department'];
  $teacher = $_POST['teacher'];

  $addCourse = $conn->prepare("INSERT INTO courses (id, name, department, teacher) values(?, ?, ?, ?)");
  if($addCourse == false){
    die("Failed at preparing statement " . $conn->error);
  }
  $addCourse->bind_param('ssss', $id, $name, $department, $teacher);
  $addCourse->execute();

 ?>
