<?php
// Start Session
session_start();
// Check If
if(isset($_SESSION['usernameshop']))
{ 	// To clear All Session Data
	session_unset();
	// To Destroy All Sessions
	session_destroy();
	header ('Location:index.php');
	exit();
	}
