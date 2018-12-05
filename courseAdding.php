<?php
  session_start();
  include 'credentials.php';

  $conn = new mysqli($servername, $username, $password, $database);

  if($conn -> connect_error){
      die("Connection Failed: ". $conn->connect_error);
  }

  $number = $_POST['number'];
  $department = $_POST['department'];
  $teacher = $_POST['teacher'];
  $review = $_POST['review'];
  $user = $_SESSION['user'];

  $insert = $conn->prepare("INSERT IGNORE INTO courses (course_number, department, professor) values (?, ?, ?)");
  if($insert === false){
    die("Failed at preparing statement ". $conn->error);
  }
  $insert->bind_param('iss', $number, $department, $teacher);
  $insert->execute();

  $courseReview = $conn->prepare("REPLACE INTO review (course_number, department, review, user) values (?, ?, ?, ?)");
  if($courseReview === false){
    die("Failed at preparing statement ". $conn->error);
  }
  $courseReview->bind_param('isss', $number, $department, $review, $user);
  $courseReview->execute();
 ?>
