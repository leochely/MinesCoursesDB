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

<h3 id="signedIn">Signed in as: </h3>
<div id="search">
	<form>
		<input id="searchBar" type="text" name="search" placeholder="Search for Courses, Departments, or Faculty" required>
		<input type="submit" value="Search Courses" class="btn">
		<input type="submit" value="Search Departments" class="btn">
		<input type="submit" value="Search Faculty" class="btn">
	</form>
</div>
<div id="viewMyReviews">
	<button class="btn">View My Reviews</button>
</div>
</body>
</html>