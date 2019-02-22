<?php
/* File Collect  All Website Function
 *  First Function To Get Page Title To More Info Go To Docs.php */
function pageTitle(){
	global $pageTitle;
		if(isset($pageTitle)){echo $pageTitle;}
			else {echo 'Ecommerce';}}
 /* Function To Echo User Name */
function userphrase(){
	global $userphrase;
		if(isset($_SESSION['usernameshop']))
			{$userphrase = $_SESSION['usernameshop']; echo $userphrase;}
				else {echo "Guest";} }
 /* Function To Get Records From Database - Public- */
 function getrecord($selector,$table,$order){
	 global $con;
	 	$getrec = $con->prepare("SELECT $selector FROM $table ORDER BY $order ASC");
		$getrec->execute();
		$records = $getrec->fetchAll();
		return $records;
 }
 /* Function To Get Records From Database With Where- Public- */
 function getrecord_where($selector,$table,$where,$value,$order){
	 global $con;
	 	$getrec = $con->prepare("SELECT $selector FROM $table WHERE $where = ? ORDER BY $order DESC");
		$getrec->execute(array($value));
		$records = $getrec->fetchAll();
		return $records;
 }

/*
function filter_form($fusername){
	$fusername = strip_tags($fusername);
	$fusername = trim($fusername);
	$fusername = filter_var($fusername,FILTER_SANITIZE_STRING);
	$fusername = filter_var($fusername,FILTER_SANITIZE_SPECIAL_CHARS);
	$fusername = filter_var($fusername,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$fusername = html_entity_decode($fusername);
	    return($fusername);}
*/
