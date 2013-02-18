<?php
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
	echo "User does not exist";
}
else if ($db_pass!=$password)
{
	echo "Wrong Password";
}
else if ($db_pass=$password)
{
	echo "Ding Ding Ding!";
}
else
{
	echo "Unknown error";
}
?>