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

<div id="login">
	<form>
		<!--search user database for email, fail if no match-->
		<!--compare passwords, fail if not identical-->
		<!--apply cookies for user id-->
		<!--go to profileHome-->
		<h3>Login</h3>
		<p>Email</p>
		<input type="text" name="username" required>
		<p>Password</p>
		<input type="text" name="password" required>
		<input type="submit" value="Submit" class="btn">
	</form>
</div>

<div id="createAccount">
	<form>
		<!--create email/password entry in user database-->
		<!--send email-->
		<h3>Create Account</h3>
		<p>Email</p>
		<input type="text" name="username" required>
		<p>Password</p>
		<input type="text" name="password" required>
		<input type="submit" value="Submit" class="btn">
	</form>	
</div>

<div id="forgotPassword">
	<form>
		<!--search user database for email-->
		<!--change password to some random password-->
		<!--send email with new random password-->
		<h3>Forgot Password</h3>
		<p>Email</p>
		<input type="text" name="email" required>
		<input type="submit" value="Submit" class="btn">
	</form>	
</div>

</body>
</html>