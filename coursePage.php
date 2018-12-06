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
	$number = $_GET['course'];
	$dept = $_GET['dept'];

	$query = $conn->prepare("SELECT review, user FROM review WHERE course_number = ? AND department = ?");
	if($query === false){
		die("Failed at preparing statement " . $conn->error);
	}
	$query->bind_param("is", $number, $dept);
	$query->execute();
	$reviews = $query->get_result();
?>
<h2>Reviews for course <?php echo $_GET['dept'] . " " . $_GET['course']; ?></h2>
<table>
	<tr>
		<th>Review</th>
		<th>User</th>
	</tr>
	<?php
		while($row = $reviews->fetch_assoc()){
			echo "<tr>	<td> " . $row['review'] . " </td> <td>" . $row['user']. "</td>	</tr>";
		}
	?>
</table>


</body>
</html>
