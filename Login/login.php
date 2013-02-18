<!DOCTYPE html>
<!-- 
Jake Marshall
Feb 18, 2013
This is an example of a login form, and code usage on a login page
-->
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login Form</title>
</head>
<body>
	<?php 
	session_start(); //creates session
	if (isset($_SESSION['logged_in'])) //makes sure session variable exists before we look at it
	{
		if ($_SESSION['logged_in'])
		{
			header("location:logged_in.php");//redirects user if session indicates that are logged in
		}
	}
	if (isset($_SESSION['login_error'])) //if a login error exists, print it
	{
		echo "<p class=\"error\">".$_SESSION['login_error']."<p>";
		unset($_SESSION['login_error']); //removes error, so it does no persist after refresh
	}
	?>
	<form name="input" action="check_login.php" method="post">
		Email: <input type="text" name="email"> <br> Password:<input
			type="password" name="password"><br> <input type="submit"
			value="Submit">
	</form>
</body>
</html>
