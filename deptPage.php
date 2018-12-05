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

	conn = new mysqli($servername, $username, $password, $database);

	if($conn -> connect_error){
			die("Connection Failed: ". $conn->connect_error);
	}

	$query = "SELECT * FROM department WHERE name LIKE " . $_GET['department'];
	$result = mysqli_query($query);

	$query = "SELECT id, name, teacher FROM courses WHERE department LIKE " . $_GET['department'];
	$courses = mysqli_query($query);

	echo "<p> " . $result[0] . " </p>";
	echo "<p> Main Office" . $result[1] . " </p>";
	echo "<p> Faculty: " . $result[2] . " </p>";
?>

<table>
		  <tr>
		    <th>Course Name</th>
		    <th>Course ID</th>
		    <th>Professor</th>
		  </tr>
		  <?php
				while($row = mysql_fetch_array($courses)){
					echo "<tr>
							<td><a href='./coursePage.php?id=" . $row[0] . "'> " . $row[1] . " </a></td>
							<td> ". $row[0] ." </td>
							<td><a href='./profPage.php?teacher=" . $row[3] . "'> " . $row[3] . " </a></td>
					 </tr>";
				 }
			 ?>
</table>


</body>
</html>
