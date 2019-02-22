<?php
//Start The output Buffering
ob_start();
session_start();
// page Title
$pageTitle = "DashBoard";
//Include Header
if(isset($_SESSION['usernameshop'])){
include 'inti.php';
include CTD;
include 'admininc/tpl/dashmarkup.php';
}
else{
	header('Location: index.php');
	exit();
	}
ob_end_flush();
