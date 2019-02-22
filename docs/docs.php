<?
// CREATS  DB
CREATE TABLE users (UseriD int(11) NOT NULL AUTO_INCREMENT,
Username varchar(255) CHARACTER SET utf8,
Password varchar(255) CHARACTER SET utf8,
Email varchar(255),
FullName varchar(255) CHARACTER SET utf8,
GroupiD int(11) default '0',
TrustStatus int(11) default '0',
RegStatus int(11) ADD DEFAULT ('0'),
PRIMARY KEY(UseriD)
);
// UNIQUED THE UserNAme;

ALTER TABLE users ADD UNIQUE(UserName);
=========================================
CREATE TABLE categories
(
ID SMALLINT NOT NULL AUTO_INCREMENT,
Name varchar(255) CHARACTER SET utf8 UNIQUE,
Description TEXT CHARACTER SET utf8, Ordering int(11),
Visibility TINYINT default '0',
Allow_Comment TINYINT default '0',
Allow_Ads TINYINT default '0',
 PRIMARY KEY(ID));
-------------------------------------------------
CREATE TABLE items
    -> (
    -> item_ID int(11) AUTO_INCREMENT,
    -> Name varchar(255) CHARACTER SET utf8 UNIQUE,
    -> Description TEXT CHARACTER SET utf8,
    -> Price varchar(255) CHARACTER SET utf8,
    -> Add_Date DATE,
    -> Country_Made varchar(255) CHARACTER SET utf8,
    -> Status varchar(255) CHARACTER SET utf8,
    -> Rating SMALLINT,
    -> Cat_ID int(11),
    -> Member_ID int(11),
    -> PRIMARY KEY(item_ID));
-----------------------------------------------
ALTER TABLE items
ADD CONSTRAINT number_1
FORIGN KEY(member_ID)
REFERENCES users(usersID)
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=
ALTER TABLE comments
 ADD CONSTRAINT item_comment
 FOREIGN KEY(item_id) REFERENCES items(item_id)
 ON UPDATE CASCADE ON
 DELETE CASCADE;
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=
// No Navbar
In First We make A Variable At  A PAge We don't Need To navbar at It'
$nonve = "";
After that we make if statment To Check If variable  $nonve = ""; isset or no If isset Don't include the nav' If no Include it
when use ( ! NOT opertor )
if (!isset($nonve){
	include 'navbar.php';
	}
////////////////////////////////////
// Make Function To Get Page Titile
in first we make a variable in all pages have a title of the page
$pageTitle = "login or another name"
we make a function To get title like that
function getTitle(){
	global $pageTitle;
		if(isset($pageTitle)){echo $pageTitle;}
			else {echo 'DShop'}
	}
///////////////////////////////////////////
// Edit Member trick ..
// We Say If Session == The Id Start The Edit ;)
{$usereditid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
					// If Edit = id=? != The Session Display The Form
					if($usereditid == $_SESSION['useridshop']){
						////
						//TO Work Java
						<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
						// Design
<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="small-device.css" />
/* Check Items Function
 ** Function to check item in database
 ** $select = item to select row [User , item ,]
 ** $from = The Table To Select [users,categories]
 ** $value = The Value Of Select [1,admin]
 */
function checkDB($select,$from,$value){
	global $con;
	$statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");
	$statement->execute(array($value));
	$countfunc = $statement->rowCount();
	return $countfunc;
	}
//////////////////////////////////////////////////
--- EXPLAN EDIT FORM TRIKS --------
like
SELECT * FROM users WHERE Username = 'Mahmoud' AND UseriD != 2;
Or
in First We Make Tow Function
First Tow Check If Value Exists Or No
Second To Update The Value

-----------------------------------
/* Check Items Function
 ** Function to check item in database
 ** $select = item to select row [User , item ,]
 ** $from = The Table To Select [users,categories]
 ** $value = To Search At DB
 */
function checkDB($select,$from,$value){
	global $con;
	$statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");
	$statement->execute(array($value));
	$countfunc = $statement->rowCount();
	return $countfunc;
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
/* Fetch Value Function V! */
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
	$fetcheditpage = $statement->fetch();
	$countfunc 	   = $statement->rowCount();
	$username_func	= $fetcheditpage['Username'];
	$userid_func  	= $fetcheditpage['UseriD'];
	$fullname_func  = $fetcheditpage['FullName'];
	$email_func    	= $fetcheditpage['Email'];
	$password_func 	= $fetcheditpage['Password'];
		// Record the Info To Print It
		if($return_value == 'id'){return $userid_func;}
		if($return_value == 'password'){return $password_func;}
		if($return_value == 'email'){return $email_func;}
		if($return_value == 'fullname'){return $fullname_func;}
	return $username_func;


//UpDate The UserName
		// If The value of input Was Changed
			if($form_user !== featchDB(idofuser(),"username")){
				// If Changed We Check The DB
							$form_check_count = checkDB("Username","users",$form_user);
							// If Have User Name Or Same Value At DB Say The Value Already Exsits
							if($form_check_count > 0){
								$form_err = "Username Already Exsits";
							}
							// If No Record At DB We Make Our Query
							else{
									$form_count  = updateDB("users","Username","UseriD",idofuser(),$form_user);
									// If Query Are DONE we Say DOne
										if($form_count == 1){
											$form_success = "Sucsses Update Your Information";}
												else{$form_err = "You Just Update Your Information";}
								}}

/////////////////////////////////////////////////////////////////////
/* FOR ADMIN YOU MuST USE THE ID AT FORM
 * ======================================
 						//UpDate The UserName
						$user_name = featchDB(idofuser(),"username");
						if($form_user !== $user_name){
							$form_check_count = checkDB("Username","users",$form_user);
							if($form_check_count == 1){
								$field_error = "Username Already Exsits";
								}
								else{
								$user_check_count  = updateDB("users","Username","UseriD",idofuser(),$form_user);
									if($user_check_count > 0){
										$form_success = "Sucsses Update Your Information";}
											else{$field_error = "You Just Update Your Information";}
								}
							}
							//UpDate The Email
							$email = featchDB(idofuser(),"email");
						if($form_email !== $email){
							$form_check_count = checkDB("Email","users",$form_email);
							if($form_check_count > 0){
								$field_error = "Email Already Exsits";
								}
								else{
								$user_check_count  = updateDB("users","Email","UseriD",idofuser(),$form_email);
									if($user_check_count > 0){
										$form_success = "Sucsses Update Your Information";}
											else{$form_err = "You Just Update Your Information";}
								}
							}
							//UpDate The FullName
							$full_name = featchDB(idofuser(),"fullname");
						if($form_fullname !== $full_name){
							$form_check_count = checkDB("FullName","users",$form_fullname);
							if($form_check_count == 1){
								$form_err = "FullName Already Exsits";
								}
								else{
								$user_check_count  = updateDB("users","FullName","UseriD",idofuser(),$form_fullname);
									if($user_check_count > 0){
										$form_success = "Sucsses Update Your Information";}
											else{$form_err = "You Just Update Your Information";}
								}
							}
							* ================= ANOTHER WAY TO DO THAT ================================ *
							* //Update UserName
								$user_fetcher = featchDB($id_to_change,"username");
								$counter_user_DB = checkDB("Username","users",$form_user);
								if($counter_user_DB == 0 && $form_user !== $user_fetcher){
									$user_check_count  = updateDB("users","Username","UseriD",$id_to_change,$form_user);
									if($user_check_count > 0){
										$form_success = "Sucsses Update Your Information";
									}
								}
								elseif($form_user == $user_fetcher){$form_success = "You'r Information's Complated";}
								else{$field_error = "UserName Alerady Exist";}
							//Update Email
								$email_fetcher 		= featchDB($id_to_change,"email");
								$counter_email_DB 	= checkDB("Email","users",$form_email);
								if($counter_email_DB == 0 && $form_email !== $email_fetcher){
									$email_check_count  = updateDB("users","Email","UseriD",$id_to_change,$form_email);
									if($email_check_count > 0){
										$form_success = "Sucsses Update Your Information";
									}
								}
								elseif($form_email == $email_fetcher){$form_success = "You'r Information's Complated";}
								else{$field_error = "Email Alerady Exist";}
							//Update FullName
								$fullname_fetcher = featchDB($id_to_change,"fullname");
								$counter_name_DB  = checkDB("FullName","users",$form_fullname);
								if($counter_name_DB == 0 && $form_fullname !== $fullname_fetcher){
									$name_check_count  = updateDB("users","FullName","UseriD",$id_to_change,$form_fullname);
									if($name_check_count > 0){
										$form_success = "Sucsses Update Your Information";
									}
								}
								elseif($form_fullname == $fullname_fetcher){$form_success = "You'r Information's Complated";}
								else{$field_error = "Fullname Alerady Exist";}
*/
///////////////////////////////////////////////////////////////////////////////
to Get A Pending member

$another_q = "";
				if(isset($_GET['pending'])){
				$another_q = "AND RegStatus = 0"
		//id we have a request we Made Thi's query
				}
				// To get all member with out admin
				$stmt = $con->prepare("SELECT * FROM users WHERE GroupiD != 1 $another_q");
				$stmt->execute();
-------------------------
/* FILTER FUNCTION */
function filter_form($fusername){
	$fusername = strip_tags($fusername);
	$fusername = trim($fusername);
	$fusername = filter_var($fusername,FILTER_SANITIZE_STRING);
	$fusername = filter_var($fusername,FILTER_SANITIZE_SPECIAL_CHARS);
	$fusername = filter_var($fusername,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$fusername = html_entity_decode($fusername);
	    return($fusername);}
//////////////////////////////////////////
/* بحث عن كل الاعضاء او تشيك معادا اليوزر الـ انا فيه علشان ميقوليش يوزر موجود وانا مش محدث اليوزر */
SELECT * FROM users WHERE username = $user AND userid != $user_id
