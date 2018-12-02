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
<button class="backHome" onclick="window.location.href='./profileHome.php'">Back to Home Page</button>
<?php

	$search = $_POST['search'];

	if ($_POST['category'] == "Search Courses"){
		//search course table for the search variable
		echo "  <br><br>
				<table class='searchTable'>
				<tr><th class='searchHeader'>Results for (search variable) in Courses</th></tr>
				<tr><td class='searchD'><a href='./coursePage.php'> example course</a></td></tr>

			  </table>";
	}
	else if ($_POST['category'] == "Search Departments"){
		//search department table for the search variable
		echo "<br><br>
				<table class='searchTable'>
				<tr><th class='searchHeader'>Results for (search variable) in Departments</th></tr>
				<tr><td class='searchD'><a href='./deptPage.php'> example department</a></td></tr>

			  </table>";		
	}
	else if ($_POST['category'] == "Search Faculty"){
		//search faculty table for the search variable
		echo "<br><br>
				<table class='searchTable'>
				<tr><th class='searchHeader'>Results for (search variable) in Faculty</th></tr>
				<tr><td class='searchD'><a href='./profPage.php'> example professor</a></td></tr>

			  </table>";		
	}
?>


</body>
</html>