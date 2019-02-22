<?php
/*
 ===================================================*
 *== Mange Member Page 	  .
 *== Edit | Delete | Add .
 * =================================================*/
ob_start();
	// Start Session
	session_start();
	// page Title
$pageTitle = "Members";
//Error Msg
$form_err = "";
//Redirct Error
$redirect_err = "";
//Error Msg
$form_success = "";
//error Field
$field_error = "";
//Message
$message = "<h1 class=\"empty-message\">No Items</h1>";
if(isset($_SESSION['usernameshop'])){
	include 'inti.php';
	// Include The Connect
	include CTD;
		//Get Method
		$shopedit = '';
			if (isset($_GET['ecshop']))
				{$shopedit = $_GET['ecshop'];}
					else {$shopedit = 'dashmange';}
			//*Main Mange Page
			if($shopedit == 'dashmange')
			{	//Pendig Member
				$another_q = "";
				if(isset($_GET['mbr']) && $_GET['mbr'] == 'pending'){
				$another_q = "AND RegStatus = 0";
				}
				$stmt = $con->prepare("SELECT * FROM users WHERE GroupiD != 1 $another_q");
				$stmt->execute();
				//Asign To Variable
			$rows 		= $stmt->fetchAll();
			$count_mem = $stmt->rowCount();
			if(!empty($count_mem)){
				include TPL."mange.php";
			}
			else { echo "message"; }
			}
			//*Add Member Form Page
			elseif($shopedit == 'add')
			//INCLUDE ADD MEMBER
				{include TPL."addmember.php";}
				//*Add Member Insert Page
				elseif($shopedit == 'insert'){
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						//Security Error
						$security_msg 	= '';
						$security_value = '0';
						//Recorde a Values
						$newuser_username 		= filter_form($_POST['newusername']);
						$newuser_fullname	 		= filter_form($_POST['newuserfullname']);
						$newuser_email 				= filter_var($_POST['newuseremail'],FILTER_SANITIZE_EMAIL);
						$newuser_password			= $_POST['newuserpassword'];
						$newuser_hpassword 		= password_hash($_POST['newuserpassword'],PASSWORD_DEFAULT);
						// Check Validate \\
					    $security_msg = array();
							//UserName Validate
							if(empty($newuser_username)){$security_msg[] = "You Cant Set UserName As Empty"; $security_value = '1';}
							if(strlen($newuser_username) < 3 || strlen($newuser_username) > 19)
								{$security_msg[] = "Error Username Less Than 3 Character Or More Than 19 Character"; $security_value = '1';}
							//Email Validate
							if(empty($newuser_email)){$security_msg[] = "You Cant Set Email As Empty"; $security_value = '1';}
							//Password Validate
							if(strlen($newuser_password) < 3 || strlen($newuser_password) > 19)
								{$security_msg[] = "Password Field Less Than 3 Character Or More Than 19 Character"; $security_value = '1';}
							if(empty($newuser_password)){$security_msg[] = "You Cant Set Password As Empty"; $security_value = '1';}
							//FullName ValiDate
							if(empty($newuser_fullname)){$security_msg[] 		= "You Cant Set Full Name As Empty"; $security_value = '1';}
							if(strlen($newuser_fullname) < 3){$security_msg[] = "Error Full Name Less Than 3 Character"; $security_value = '1';}
							//Loop All Error
							foreach($security_msg as $smsg_error ){echo "<div class=\"alert-danger text-error\"><strong>".$smsg_error."</strong></div>";}
						//If no error Update Database
						if(empty($security_msg) && $security_value == '0')
						{
							//Check User At Database
							$check 			= checkDB("Username","users",$newuser_username);
							$check_tow 	= checkDB("Email","users",$newuser_email);
							if ($check == 1 || $check_tow == 1){
								$form_err = "<div class=\"alert-danger text-one-error\">"."Thi's Username Or Email Already Exist"."</div>"; redirection($form_err);}
							else{
						//Insert User into The DataBase
						$stmt = $con->prepare("INSERT INTO users(Username,Password,Email,FullName,RegStatus,Date) VALUES(:nuser,:npass,:nemail,:nfullname,1,NOW())");
						$stmt->execute(array(
						'nuser' 		=> $newuser_username,
						'npass' 		=> $newuser_hpassword,
						'nemail'		=> $newuser_email,
						'nfullname' => $newuser_fullname));
						$newuser_count 	= $stmt->rowCount();
						if($newuser_count == 1){ $form_success = "<div class=\"alert-success text-succses\">"."Success Add New Member "."</div>"; redirection($form_success);}
						else{$form_err = "<div class=\"alert-danger text-one-error\">"."Member Already Added"."</div>"; redirection($form_err);}
							}
						}
						}
			else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."Error 404 Page Not Found"."</div>";redirection($redirect_err,4);}
			}
					//*edit Profile Page
					elseif($shopedit == 'edit')
						{$usereditid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
					// If Edit = id=? != The Session Display The Form
					if($usereditid == $usereditid){
						// Statment To Get Info
						$stmt = $con->prepare("SELECT * FROM users WHERE UseriD = ? LIMIT 1");
						$stmt->execute(array($usereditid));
						$fetcheditpage= $stmt->fetch();
						$countedit = $stmt->rowCount();
							if($countedit > 0){
								// Record the Info To Print It
								$username_edit = $fetcheditpage['Username'];
								$userid_edit   = $fetcheditpage['UseriD'];
								$fullname_edit = $fetcheditpage['FullName'];
								$email_edit    = $fetcheditpage['Email'];
								$password_edit = $fetcheditpage['Password'];
								// Include The Form
								include TPL."editmember.php";
							} 		// If Any One Change The Id
								else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."There's No ID"."</div>"; redirection($redirect_err);};
						// If Any one Play On GET FUNCTION
						} else{$redirect_err = "<div class=\"alert-danger text-one-error\">"."No Such ID"."</div>"; redirection($redirect_err);};
					}
				//---*Update Page---
				elseif($shopedit == 'update')
				{
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
					//Security Error
					$security_msg 	= '';
					$security_value = '0';
					//Recorde a Values
					 $id_to_change			= $_POST['idchange'];
					 $form_user 				= filter_form($_POST['userchange']);
					 $form_fullname	 		= filter_form($_POST['fullnamechange']);
					 $form_email 				= filter_var($_POST['emailchange'],FILTER_SANITIZE_EMAIL);
					 $oldpassword_edit 	= $_POST['oldpassword'];
					 $newpassword_edit 	= $_POST['newpassword'];
					 // Check Validate \\
					    $security_msg = array();
						if(empty($form_user)){$security_msg[] = "You Cant Set UserName As Empty"; $security_value = '1';}
						if(strlen($form_user) < 3 || strlen($form_user) > 19)
							{$security_msg[] = "Error Username Less Than 3 Character Or More Than 19 Character"; $security_value = '1';}
						if(empty($form_email)){$security_msg[] 					= "You Cant Set Email As Empty"; $security_value = '1';}
						if(empty($form_fullname)){$security_msg[] 			= "You Cant Set Full Name As Empty"; $security_value = '1';}
						if(strlen($form_fullname) < 3){$security_msg[] 	= "Error Full Name Less Than 3 Character"; $security_value = '1';}
						foreach($security_msg as $smsg_error ){echo "<div class=\"alert-danger text-error\"><strong>".$smsg_error."</strong></div>";}
					 	// Password Method
						$new_password_edit = empty($newpassword_edit) ? $oldpassword_edit : password_hash($newpassword_edit,PASSWORD_DEFAULT);
						//If no error Update Database
						if(empty($security_msg) && $security_value == '0')
						{
							//Other Info
							$stmt = $con->prepare("UPDATE users SET Password = ? WHERE UseriD = ?");
							$stmt->execute(array($new_password_edit,$id_to_change));
							$form_count = $stmt->rowCount();
							 if($form_count > 0){
							 $form_success  = "<div class=\"alert-success text-succses\">"."Success Update You'r Information "."</div>"; redirection($form_success);}
						 }
						 else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."Error 404 No Page Found."."</div>";redirection($redirect_err);}

						 //Update UserName
							 $user_fetcher = featchDB($id_to_change,"username");
							 $counter_user_DB = checkDB("Username","users",$form_user);
							 if($counter_user_DB == 0 && $form_user !== $user_fetcher){
								 $user_check_count  = updateDB("users","Username","UseriD",$id_to_change,$form_user);
								 if($user_check_count > 0){
										$form_success = "<div class=\"alert-success text-succses\">"."Success Update You'r Information "."</div>"; redirection($form_success);
								 }
							 }
							 elseif($form_user == $user_fetcher){$form_success = "<div class=\"alert-success text-succses\">"."You'r Information is Complete."."</div>"; redirection($form_success);}
							 else{$field_error = "<div class=\"alert-danger text-one-error\">"."Username Already Exist"."</div>"; redirection($field_error);}
						 //Update Email
							 $email_fetcher 		= featchDB($id_to_change,"email");
							 $counter_email_DB 	= checkDB("Email","users",$form_email);
							 if($counter_email_DB == 0 && $form_email !== $email_fetcher){
								 $email_check_count  = updateDB("users","Email","UseriD",$id_to_change,$form_email);
								 if($email_check_count > 0){
									 $form_success = "<div class=\"alert-success text-succses\">"."Success Delete Thi's Member "."</div>"; redirection($form_success);
								 }
							 }
							 elseif($form_email == $email_fetcher){$form_success  = "<div class=\"alert-success text-succses\">"."You'r Information's Complete."."</div>"; redirection($form_success);}
							 else{$field_error = "<div class=\"alert-danger text-one-error\">"."Email Already Exist"."</div>"; redirection($field_error);}
						 //Update FullName
							 $fullname_fetcher = featchDB($id_to_change,"fullname");
							 $counter_name_DB  = checkDB("FullName","users",$form_fullname);
							 if($counter_name_DB == 0 && $form_fullname !== $fullname_fetcher){
								 $name_check_count  = updateDB("users","FullName","UseriD",$id_to_change,$form_fullname);
								 if($name_check_count > 0){
									 $form_success =  "<div class=\"alert-success text-succses\">"."Succses Update You'r Information."."</div>"; redirection($form_success);
								 }
							 }
							 elseif($form_fullname == $fullname_fetcher){$form_success  = "<div class=\"alert-success text-succses\">"."You'r Infromation's Complete"."</div>"; redirection($form_success);}
							 else{$field_error = "<div class=\"alert-danger text-one-error\">"."Fullname Already Exist"."</div>"; redirection($field_error);}


				}
			}
				//---*Delete Page---
				elseif($shopedit == 'delete'){
					$userdeleteid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
							$count_delete = checkDB("UseriD","users",$userdeleteid);
						if($count_delete > 0){
							$stmt = $con->prepare("DELETE FROM users WHERE UseriD = :deleteuser");
							$stmt->bindParam(":deleteuser",$userdeleteid);
							$stmt->execute();
							$member_delete_count = $stmt->rowCount();
								if($member_delete_count > 0)
								{$form_success  = "<div class=\"alert-success text-succses\">"."Success Delete Thi's Member "."</div>"; redirection($form_success);}
								else{$form_err 	= "<div class=\"alert-danger text-one-error\">"."Cant Delete Thi's Member"."</div>"; redirection($form_err);}
						}
						else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."Cant Find Thi's Member.!"."</div>"; redirection($redirect_err);}
				}
				//*Activate Member PAge
				elseif($shopedit == 'activate'){
						$user_active_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
						$count_active = checkDB("UseriD","users",$user_active_id);
						if($count_active > 0){
							$stmt = $con->prepare("UPDATE users SET RegStatus = 1 WHERE UseriD = :activeuser");
							$stmt->bindParam(":activeuser",$user_active_id);
							$stmt->execute();
							$member_delete_count = $stmt->rowCount();
								if($member_delete_count > 0)
								{$form_success  = "<div class=\"alert-success text-succses\">"."Success Activate Thi's Member "."</div>"; redirection($form_success);}
								else{$form_err = "<div class=\"alert-danger text-one-error\">"."Cant Avtivate Thi's Member"."</div>"; redirection($form_err);}
				}}
					// If Any One Change GET Method
					else{$redirect_err = "<div class=\"alert-danger text-one-error\">"."Error 404 Not Found"."</div>"; redirection($redirect_err);}


}
// If Any One Change Get Request
else{header('Location: index.php'); exit();}
ob_end_flush();
?>
