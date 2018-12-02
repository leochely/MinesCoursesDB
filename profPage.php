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
	//get professor id from url and search table
	echo "<br><br>

		<table class='courseTable'>
			<tr class='courseRow'>
				<th class='courseHeader'>Professor</th>
				<td>xxxxxx</td>
			</tr>
			<tr class='courseRow'>
				<th class='courseHeader'>Background</th>
				<td>xxxxxx</td>
			</tr>
			<tr class='courseRow'>
				<th class='courseHeader'>Office</th>
				<td>xxxxxx</td>
			</tr>
			<tr class='courseRow'>
				<th class='courseHeader'>Office Hours</th>
				<td>xxxxxx</td>
			</tr>
			<tr>
				<th class='courseHeader'>Courses</th>
				<td>xxxxxx</td>
			</tr>
		</table>";
?>

</body>
</html>