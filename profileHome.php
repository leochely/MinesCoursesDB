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
<h3 id="signedIn">Signed in as: <?php echo $_SESSION['user']; ?> </h3>


<div id="search">
	<form action="./searchResults.php" method="post">
		<!--go to searchResults.php with search and category in post-->
		<input id="searchBar" type="text" name="search" placeholder="Search for Courses, Departments, or Faculty" required>
		<!--only search course table-->
		<input type="submit" name="category" value="Search Courses" class="searchbtn">
		<!--only search department table-->
		<input type="submit" name="category" value="Search Departments" class="searchbtn">
		<!--only search faculty table-->
		<input type="submit" name="category" value="Search Faculty" class="searchbtn">
	</form>
</div>
<div id="viewMyReviews">
	<!--go to profileReviews.php-->
	<button class="btn" onclick="window.location.href='./profileReviews.php'">View My Reviews</button>
</div>
<div id="addCourse">
	<!--go to addCourse.php-->
	<button class="btn" onclick="window.location.href='./addCourse.php'">Add A Course</button>
</div>
</body>
</html>
