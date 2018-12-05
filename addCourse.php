<?php
	session_start();
	if(date("Y/m/d H:i:s") > $_SESSION['timeout']){
		header("location: /");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>MCDB</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="MCDB.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
	include 'templateheader.php'
?>

<!--if user cookie is not correct, redirect to index.php-->

<!--display user email-->

<h3 id="signedIn">Signed in as: </h3>
<button class="backHome" onclick="window.location.href='./profileHome.php'">Back to Home Page</button>\

<div id="add">
  <form method='POST' action='courseAdding.php'>
    <h3>Add a course</h3>
		<p>Course Number</p>
		<input type="text" name="number" required>
    <p>Department</p>
    <input type="text" name="department" required>
    <p>Teacher</p>
    <input type="text" name="teacher" required>
		<p>Review</p>
		<input type="textarea" name ="review" required>
		<input type="submit" value="Submit" class="btn">
  </form>
</div>

</body>
</html>
