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
<?php
echo "
<div id='forgotPassword'>
	<form method='POST' action='changepass.php'>
		<!--search user database for email, fail if no match-->
		<!--compare passwords, fail if not identical-->
		<!--apply cookies for user id-->
		<!--go to profileHome-->
		<h3>Reset your password</h3>
		<input type='hidden' name='username' value = " . $_GET['email'] . " required>
		<p>Password</p>
		<input type='password' name='password' required>
		<input type='submit' value='Submit' class='btn'>
	</form>
</div>";
?>

</body>
</html>
