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
<h3 id="signedIn">Signed in as: <?php echo $_SESSION['user'] ?></h3>
<button class="backHome" onclick="window.location.href='./profileHome.php'">Back to Home Page</button>

<?php
	include 'credentials.php';
	$conn = new mysqli($servername, $username, $password, $database);

	if($conn -> connect_error){
		die("Connection Failed: ". $conn->connect_error);
	}
	$prof = $_GET['prof'];

	$query = $conn->prepare("SELECT course_number, department FROM courses WHERE professor = ?");
	if($query === false){
		die("Failed at preparing statement " . $conn->error);
	}
	$query->bind_param("s", $prof);
	$query->execute();
	$reviews = $query->get_result();
?>
<h3>Courses taught by <?php echo $_GET['prof']; ?></h3>
<table>
	<tr>
		<th>Course Number</th>
		<th>Department</th>
	</tr>
	<?php
		while($row = $reviews->fetch_assoc()){
			echo "<tr>	<td><a href='./coursePage.php?course=" . $row['course_number'] . "&dept=". $row['department'] ."'>" . $row['course_number'] . " </a></td> <td>" . $row['department'] . "</td></tr>";
		}
	?>
</table>


</body>
</html>
