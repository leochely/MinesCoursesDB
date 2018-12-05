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
<button class="backHome" onclick="window.location.href='./profileHome.php'">Back to Home Page</button>
<?php
	include 'credentials.php';
	$conn = new mysqli($servername, $username, $password, $database);
	if($conn -> connect_error){
		die("Connection Failed: ". $conn->connect_error);
	}

	$search = $_POST['search'];

	if ($_POST['category'] == "Search Courses"){
		//search course table for the search variable
		$query = $conn->prepare("SELECT department, course_number, professor FROM courses where course_number = ?");
		if($query === false){
			die("Failed at preparing statement " . $conn->error);
		}
		
		$query->execute();
		$result = $query->get_result();
		if($result === false){
			die($conn->error);
		}
		while($row = $result->fetch_assoc()){
			echo "<p>" . $row['department'] . ", " . $row['course_number'] . ", " . $row['professor'] . "</p>";
		}
		echo "  <br><br>
				<table class='searchTable'>
				<tr><th class='searchHeader'>Results for '" . $search . "' in Courses</th></tr>
				<tr><td class='searchD'><a href='./coursePage.php'> example course</a></td></tr>

			  </table>";
	}
	else if ($_POST['category'] == "Search Departments"){
		//search department table for the search variable
		echo "<br><br>
				<table class='searchTable'>
				<tr><th class='searchHeader'>Results for '" . $search . "' in Departments</th></tr>
				<tr><td class='searchD'><a href='./deptPage.php'> example department</a></td></tr>

			  </table>";
	}
	else if ($_POST['category'] == "Search Faculty"){
		//search faculty table for the search variable
		echo "<br><br>
				<table class='searchTable'>
				<tr><th class='searchHeader'>Results for '" . $search . "' in Faculty</th></tr>
				<tr><td class='searchD'><a href='./profPage.php'> example professor</a></td></tr>

			  </table>";
	}
?>


</body>
</html>
