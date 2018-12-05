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

<table>
		  <tr>
		    <th>Course Name</th>
		    <th>Course ID</th>
		    <th>Department</th>
		    <th>Professor</th>
		    <th>Rating</th>
		  </tr>
		  <?php

				conn = new mysqli($servername, $username, $password, $database);

				if($conn -> connect_error){
						die("Connection Failed: ". $conn->connect_error);
				}

				$query = "SELECT DISTINCT courses.name, courses.id, courses.department, courses.teacher, review.comment from review, courses WHERE courses.id = review.id AND username = " . ;

				$result = mysqli_query($query);

				while($row = mysql_fetch_array($result)){
				  echo "<tr>
					    <td><a href='./coursePage.php?id=" . $row[1] . "'> " . $row[0] . " </a></td>
					    <td> ". $row[1] ." </td>
					    <td><a href='./deptPage.php?department=" . $row[2] . "'> " . $row[2] . " </a></td>
					    <td><a href='./profPage.php?teacher=" . $row[3] . "'> " . $row[3] . " </a></td>
					    <td> " . $row[4] . " </td>

					 </tr>";
				 }
			//each course, department, and professor name should be a link to their page
			//might have the review just be a 1-5 rating and you can edit with dropdown menu
			//looking into having a button per row that deletes the review from database
		  ?>
</table>


</body>
</html>
