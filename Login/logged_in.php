<!DOCTYPE html>
<!-- 
Jake Marshall
Feb 18, 2013
This is an example of a page available to logged in users, and code usage on such a page
-->
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login Form</title>
<?php require 'session_check.php'; //runs file that confirms user is logged in. If it can't be found, page quits loading?>
</head>
<body>
	<p>You are logged in as <?php echo $_SESSION['username'] //prints username (stored in session?></p>
	<br>
	<a href='session_destroy.php'>Log Out</a>
</body>
</html>
