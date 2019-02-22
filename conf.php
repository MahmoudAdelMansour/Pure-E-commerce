<?php
$dsn = 'mysql:host=127.0.0.1;dbname=ecshop';
$user = 'root';
$pass = '01154913425davinci';
$option =
array (
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'

);

try {
$con = new PDO($dsn,$user,$pass,$option);
$con -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
	catch(PDOException $r) {
		echo "Unknown Error".$r->getMessage();
	}
