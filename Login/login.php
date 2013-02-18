<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login Form</title>
</head>
<body>
	<?php 
	session_start();
	if (isset($_SESSION['logged_in']))
	{
		if ($_SESSION['logged_in'])
		{
			header("location:logged_in.php");
		}
	}
	if (isset($_SESSION['login_error']))
	{
		echo "<p class=\"error\">".$_SESSION['login_error']."<p>";
	}
	?>
	<form name="input" action="check_login.php" method="post">
		Email: <input type="text" name="email"> <br> Password:<input
			type="password" name="password"><br> <input type="submit"
			value="Submit">
	</form>
</body>
</html>
