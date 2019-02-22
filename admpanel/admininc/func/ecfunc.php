<?php
/* File Collect  All Website Function
 *  First Function To Get Page Title To More Info Go To Docs.php */
function pageTitle(){
	global $pageTitle;
		if(isset($pageTitle)){echo $pageTitle;}
			else {echo 'DShop';}}
 /* Function To Echo User Name */
function userphrase(){
	global $userphrase;
		if(isset($_SESSION['usernameshop']))
			{$userphrase = $_SESSION['usernameshop']; echo $userphrase;}
				else {echo "Guest";} }
 /* Function To Echo User ID */
function idofuser(){
		if(isset($_SESSION['useridshop']))
			{$userofid = $_SESSION['useridshop']; return($userofid);}}
/* Filter Function */
function filter_form($fusername){
	$fusername = strip_tags($fusername);
	$fusername = trim($fusername);
	$fusername = filter_var($fusername,FILTER_SANITIZE_STRING);
	$fusername = filter_var($fusername,FILTER_SANITIZE_SPECIAL_CHARS);
	$fusername = filter_var($fusername,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$fusername = html_entity_decode($fusername);
	    return($fusername);}
/*Redirct Error Function*/
// Function Have 2 parmeter $url = Null To Home Or [back] To last page
function redirection($theMsg = "",$url = null,$seconds = 3){
	if ($url == null) {
		$url = 'index.php';
		$link= 'Home Page';
	}
		if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){$url = $_SERVER['HTTP_REFERER']; $link = 'Previous Page';}
	else{$url = 'index.php'; $link= 'Home Page';}
	echo $theMsg;
	echo "<div class=\"alert alert-info text-center text-warr\">You Will Be Redirect To $link After $seconds Seconds</div>";
	header("refresh:$seconds;url=$url");
	exit();
	}
/* Check Items Function
 ** Function to check item in database
 ** $select = item to select row [User , item ,]
 ** $from = The Table To Select [users,categories]
 ** $value = The Value Of Select [1,admin]
 V-1 */
function checkDB($select,$from,$value){
	global $con;
	$statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");
	$statement->execute(array($value));
	$countfunc = $statement->rowCount();
	return $countfunc;
	}
/* Check Function v2 */
	function checkvalueDB($select,$from,$where,$value){
	global $con;
	$statement = $con->prepare("SELECT $select FROM $from WHERE $where = ?");
	$statement->execute(array($value));
	$countfunc = $statement->rowCount();
	return $countfunc;
	}
	/* Get All Function v2 */
	function getvalueDB($select,$from){
	global $con;
	$statement = $con->prepare("SELECT $select FROM $from ");
	$statement->execute();
	$fetchfunc = $statement->fetchAll();
	return $fetchfunc;
	}
/*  Update Items Function
 ** Function to Update item in database
 * ("UPDATE $table SET $field = ? WHERE $where_field = ?");
 ** $table = table I Select To Update
 ** $field = The Field I'need Like Username Or Thing
 ** $value = The Value I'set Into field
 * 	$where_field = WHERE [ id =]
 *  $where_value = Value Of WHERE id = [0,1,3,4]
 */
	function updateDB($table,$field,$where_field,$where_value,$value){
	global $con;
	$statement = $con->prepare("UPDATE $table SET $field = ? WHERE $where_field = ?");
	$statement->execute(array($value,$where_value));
	$countfunc = $statement->rowCount();
	return $countfunc;
	}
/* Fetch User Value Function V! */
	function featchDB($func_userid,$return_value = "username"){
	global $con;
	global $username_func;
	global $userid_func;
	global $fullname_func;
	global $email_func;
	global $password_func;
		// Statment To Get Info
	$statement = $con->prepare("SELECT * FROM users WHERE UseriD = ? LIMIT 1");
	$statement->execute(array($func_userid));
	$fetcheditpage 	= $statement->fetch();
	$countfunc 		= $statement->rowCount();
	$username_func = $fetcheditpage['Username'];
	$userid_func   = $fetcheditpage['UseriD'];
	$fullname_func = $fetcheditpage['FullName'];
	$email_func    = $fetcheditpage['Email'];
	$password_func = $fetcheditpage['Password'];
		// Record the Info To Print It
		if($return_value == 'id'){return $userid_func;}
		if($return_value == 'password'){return $password_func;}
		if($return_value == 'email'){return $email_func;}
		if($return_value == 'fullname'){return $fullname_func;}
	return $username_func;
		}
/** Function To COUNT Items From DB
 ** $row The Row When I'need To Count
 **	$table THe Table When Choose Item From it
 */
  function countItem($item,$table){
	  global $con;
	  $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");
	  $stmt2->execute();
	  $num = $stmt2->fetchColumn();
	  return $num;
	  }
/** Function To Get Latest Item From DB
 ** $seletor The Row When I'need To Count
 **	$table THe Table When Choose Item From it
 ** $limit = Limit of item i nedd like (5,3,4)
 *  $order : Order By What ?
 * $needing = What I'need To Loop
 */
 function getLatest($selector,$table,$order,$limit = 5,$each_elemnt = 'Username',$needing,$message = "there's No Record") {
	 global $con;
	 $gstmt = $con->prepare("SELECT $selector FROM $table ORDER BY $order DESC LIMIT $limit");
	 $gstmt->execute();
	 $item_row = $gstmt->fetchAll();
	 if(!empty($item_row)){
	 //Get Last Members
	 if($needing == 'lastmember'){
		  foreach($item_row as $latest){
			 echo "<a href=\"members.php?ecshop=edit&id=".$latest['UseriD']."\">"."<div class=\"latest-func\">".$latest[$each_elemnt]."</div></a>";
		 }
		 return $item_row;
		 }
		//GET Last Comments
		if($needing == 'lastcomment'){
			foreach($item_row as $lastcomm){
				if($lastcomm['status'] == 1){
				echo "<a href=\"comments.php?ecshop=edit&id=".$lastcomm['c_id']."\">"."<div class=\"container-comm\">
			          <span class=\"tip-comm tip-lef-comm\"></span>
			          <div class=\"message-com\">
			            <span>".
			            $lastcomm[$each_elemnt]
			            ."</span>
			          </div>
							</div>
						</a>";
				}
					if($lastcomm['status'] == 0){
					echo "<a href=\"comments.php?ecshop=activate&id=".$lastcomm['c_id']."\">"."<div class=\"container-comm un-a\">
				          <span class=\"tip-comm tip-lef-comm\"></span>
				          <div class=\"message-com\">
				            <span>".
				          $lastcomm[$each_elemnt]
				            ."</span>
				          </div>
								</div>
							</a>";
					}
			}
return $lastcomm;
		}
		// Last Pendig Member
	 if($needing == 'lastpmember'){
		foreach ($item_row as $lastpmember) {

			if($lastpmember['RegStatus'] == '0'){
				$pres = '1';
				echo "<a href=\"members.php?ecshop=activate&id=".$lastpmember['UseriD']."\">"."<div class=\"latest-func un-a\">".$lastpmember[$each_elemnt]."</div></a>";
			}
		}
		if($pres == '0'){echo $message;}
return $lastpmember;
	 }
	 //Get Latest Item
			if($needing == 'lastitems'){

							foreach($item_row as $lastitem){

							if($lastitem['Approve'] == 1){
							echo "<a href=\"items.php?ecshop=edit&id=".$lastitem['item_ID']."\">"."<div class=\"latest-func\">".$lastitem[$each_elemnt]."</div></a>";
							}
								if($lastitem['Approve'] == 0){
								echo "<a href=\"items.php?ecshop=approve&id=".$lastitem['item_ID']."\">"."<div class=\"latest-func un-a\">".$lastitem[$each_elemnt]."</div></a>";
								}

							}
					return $item_row;

			}
	}

	else{echo $message;}

}
/* Function To Fetch Items
 * $selector = The Row I'need To Select
 * $table = The Table I'need Value From
 * $ordering Table
 * $sorting = DESC Tnazloy 10-9-8 OR ASC Tsa3ody 8-9-10

 * */
 function fetchItem($selector,$table,$ordering = "Ordering",$sorting) {
	 global $con;
	 $fstmt = $con->prepare("SELECT $selector FROM $table ORDER BY $ordering $sorting");
	 $fstmt->execute();
	 $featching = $fstmt->fetchAll();
	 return $featching;
	 }
 function fetchItemT($selector,$table,$where,$wvalue){
			global $con;
			$stmt = $con->prepare("SELECT $selector FROM $table WHERE $where = ?");
			$stmt->execute(array($wvalue));
			$fetch_page= $stmt->fetch();
			$count_edit = $stmt->rowCount();
			return $fetch_page;
	 }
