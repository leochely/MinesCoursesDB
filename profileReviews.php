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
		  	//load in all reviews for this user
		  	//outout them like this
			  echo "<tr>
				    <td><a href='./coursePage.php'> example name</a></td>
				    <td>example id</td>
				    <td><a href='./deptPage.php'> example department</a></td>	
				    <td><a href='./profPage.php'> example professor</a></td>
				    <td>example rating</td>

				 </tr>";

			//each course, department, and professor name should be a link to their page
			//might have the review just be a 1-5 rating and you can edit with dropdown menu
			//looking into having a button per row that deletes the review from database
		  ?>
</table>


</body>
</html>