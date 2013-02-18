<?php
/*
 * Jake Marshall
 * Feb 18, 2013
 * This checks that the user is logged in when visiting a page this
 * is required or included on. Don't include it, though. Require it.
 */
session_start();//creates session

/*
 * if session variaable exists and is not true, or does not exist at all
 * direct to login page, with error message
 */
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
	exit();
}
?>