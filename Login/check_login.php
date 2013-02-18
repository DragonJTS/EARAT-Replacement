<?php
session_start();

$email = $_POST["email"];
$password = $_POST["password"];
$db_pass=null;

mysql_connect("localhost", "root") or die("Not connected: " . mysql_error());

$db_selected = mysql_select_db("test") or die ("Can't use test: " . mysql_error());

$query = "Select password from login where email = '$email'";

$results=mysql_query($query) or die("Can't find user: " . mysql_error());

while($row = mysql_fetch_assoc($results))
	foreach ($row as $cname => $cvalue)
	{
		$db_pass=$cvalue;
	}

	if ($db_pass==null)
	{
		$_SESSION['login_error'] = "User does not exist";
		header("Location:login.php");
		exit();
	}
	else if ($db_pass!=$password)
	{
		$_SESSION['login_error'] = "Wrong Password";
		header("Location:login.php");
		exit();
	}
	else if ($db_pass=$password)
	{
		$_SESSION['login_error'] = null;
		$_SESSION['logged_in'] = true;
		$_SESSION['username'] = $email;
		header("Location:logged_in.php");
		exit();
	}
	else
	{
		$_SESSION['login_error'] = "Unknown error";
		header("Location:login.php");
		exit();
	}
	?>