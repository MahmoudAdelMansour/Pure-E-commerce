<?php
//include connect
include 'conf.php';
// Start Login (FORM)
//Start Session
session_start();
	 // Error message
	$errmsg = "";
	// User name Message

// Isset Session
if(isset($_SESSION['usernameshop'])){
   header('Location: dashboard.php');
}
	//Filter Function
	function filtering($fusername){
	$fusername = strip_tags($fusername);
	$fusername = trim($fusername);
	$fusername = filter_var($fusername,FILTER_SANITIZE_STRING);
	$fusername = filter_var($fusername,FILTER_SANITIZE_SPECIAL_CHARS);
	$fusername = filter_var($fusername,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	    return($fusername);}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		// Recorde A Values
		$username = $_POST['user'];
	    $pass = $_POST['pass'];
	    // Final sanitize username
	    $fiusername = filtering($username);
			// Rulls To Security
			if(strlen($fiusername) < 3 || empty($fiusername) || strlen($fiusername) > 19){
			$errmsg = "Error 100 Username Or Password";
			}
	   // Hashing Password
	    $passwordw = password_hash($pass,PASSWORD_DEFAULT);
	    // SQL Query
		$stmt = $con->prepare("SELECT Password FROM users WHERE Username = ? ");
		$stmt->execute(array($fiusername));
		// Fetch password As Array
		$result = $stmt->fetchAll(PDO::FETCH_NUM);
		   //Check if fetchAll Have Values Or no
			if($result == TRUE){
				// GET A password At Varible
				$finalpass = $result[0][0];
					//Check If Value From FetchAll Is Correct As Password OR No
					if(password_verify($pass,$finalpass) == TRUE){
						//Make A Main Query To Acces If True
						$stmt = $con->prepare("SELECT UseriD,Username,Password FROM users WHERE Username = ? AND Password = ? AND GroupiD = 1 LIMIT 1");
						// Execute The Query As 2 variable
						$stmt->execute(array($fiusername,$finalpass));
						//Fetch All
						$fetchinfo = $stmt->fetch();
						//Get User ID
					    $userid = $fetchinfo['UseriD'];
						// Count The Fields From DB
						$count = $stmt->rowCount();
						echo $count;
							//IF Have A Values Or No ..
							if($count == 1){
							  // Create Session
									$_SESSION['usernameshop'] = $fiusername;
									$_SESSION['useridshop'] = $userid;
									sleep(1);
									header('Location: dashboard.php');
							}
							else {
						$errmsg = "Error 104 Username Or Password";

							}

					} else {
						$errmsg = "Error 103 Wrong Username Or Password";

							}

			}
			else {
				$errmsg = "Error 102 Cant Found Username Or Password";

				}
}
