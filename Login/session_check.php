<?php
session_start();
if (isset($_SESSION['logged_in']))
{
	if (!$_SESSION['logged_in'])
	{
		$_SESSION['login_error'] = "Please log in";
		header("location:login.php");
	}
}
else
{
	$_SESSION['login_error'] = "Please log in";
	header("location:login.php");
}

$username=$_SESSION['username'];

echo "You are logged in as ".$username;
echo"<br><br><a href='log_out.php'>Log Out</a>";
?>