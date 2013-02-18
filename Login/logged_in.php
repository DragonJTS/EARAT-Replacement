<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login Form</title>
<?php require 'session_check.php'; ?>
</head>
<body>
	<p>You are logged in as <?php echo $username?></p>
	<br>
	<a href='session_destroy.php'>Log Out</a>
</body>
</html>
