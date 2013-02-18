<?php
/*
* Jake Marshall
* Feb 18, 2013
* This destorys a users session, and sends them to the login page
* Used for logging out.
*/
session_start(); //creates session
session_destroy(); //destroys session. Yes, it must be created first
header("location:login.php"); //redirects to login
exit();
?>