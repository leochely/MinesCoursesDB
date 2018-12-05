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
  $review = $_POST['review'];

  $addCourse = $conn->prepare("IF NOT EXISTS (SELECT * FROM courses WHERE id LIKE ". $id .") INSERT INTO courses (id, name, department, teacher) values(?, ?, ?, ?)");
  if($addCourse == false){
    die("Failed at preparing statement " . $conn->error);
  }
  $addCourse->bind_param('ssss', $id, $name, $department, $teacher);
  $addCourse->execute();

  $addReview = $conn->prepare("IF EXISTS (SELECT * FROM review WHERE username LIKE " .$_SESSION['user']  . " AND id LIKE " . $id . ") INSERT INTO review (comment, username, id) values(?, ?, ?)");
  if($addReview == false){
    die("Failed at preparing statement " . $conn->error);
  }
  $addReview->bind_param('sss', $review, $_SESSION['user'], $id );
  $addReview->execute();
 ?>
