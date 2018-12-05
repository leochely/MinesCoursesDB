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
	conn = new mysqli($servername, $username, $password, $database);

	if($conn -> connect_error){
			die("Connection Failed: ". $conn->connect_error);
	}

	$query = "SELECT teacher FROM courses WHERE id LIKE " . $_GET['id'];
	$teacher = mysqli_query($query);

	$query = "SELECT comment FROM review WHERE id LIKE " . $_GET['id'];
	$reviews = mysqli_query($query);

	echo $_GET['id'] . " is taught by " . $teacher;
?>
<table>
	<?php
		while($row = mysql_fetch_array($reviews)){
			echo "<tr>
						<td> " . $row[0] . " </td>
					</tr>";
		}
	?>
</table>";


</body>
</html>
