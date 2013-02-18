<?php
/*
 * Jake Marshall
 * Feb 18, 2013
 * This checks the info provided by a user attempting to login against
 * info stored in a db. Then they are logged in, or sent back to the
 * login page with an error message.
 */
session_start(); //creates session

$email = $_POST["email"]; //stores email and password from login, initilizes db_pass variable
$password = $_POST["password"];
$db_pass=null;

/*
 * connects to mysql at localhost, username root, no password, 
 * or page stops and error is thrown
 */
mysql_connect("localhost", "root") or die("Not connected: " . mysql_error());

$db_selected = mysql_select_db("test") or die ("Can't use test: " . mysql_error()); //connects to db named text

/*
 * Will get the password field, from login db, 
 * where email matches the one the user gave
 */
$query = "Select password from login where email = '$email'";

$results=mysql_query($query) or die("Can't find user: " . mysql_error());//runs query

/*
 * stores password as db_pass
 * assumes only one field has same email
 * should be primary key, or unique
 */
while($row = mysql_fetch_assoc($results))
	foreach ($row as $cname => $cvalue)
	{
		$db_pass=$cvalue;
	}
	
	/*
	 * If db_pass is null, means user does not exist. 
	 * Redirect to login with error message
	 */
	if ($db_pass==null) //
	{
		$_SESSION['login_error'] = "User does not exist";
		header("Location:login.php");
		exit();
	}
	else if ($db_pass!=$password) //if password in db does not match supplied password
	{
		$_SESSION['login_error'] = "Wrong Password";
		header("Location:login.php");
		exit();
	}
	/*
	 * if password is correct
	 * clear login error
	 * set user as logged in
	 * redirect to page for logged in users
	 */
	else if ($db_pass=$password)
	{
		$_SESSION['login_error'] = null;
		$_SESSION['logged_in'] = true;
		$_SESSION['username'] = $email;
		header("Location:logged_in.php");
		exit();
	}
	else //otherwise, redirect to login with generic error
	{
		$_SESSION['login_error'] = "Unknown error";
		header("Location:login.php");
		exit();
	}
	?>