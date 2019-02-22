<?php
/*
 ===================================================*
 *== Items Page
 * =================================================*/
ob_start();
	// Start Session
	session_start();
	// page Title
$pageTitle = "Items";
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
			{	$items_fetch = getvalueDB("*","items");
				if(!empty($items_fetch)){
				include TPL.'itemmange.php';
			}
			else {
				echo $message;

				}
			}
			//*Add Items Form Page
			elseif($shopedit == 'add')
			{include TPL."additems.php";}
			//*Insert Items Insert Page
			elseif($shopedit == 'insert')
			{if($_SERVER['REQUEST_METHOD'] == 'POST'){
						//Security Error
						$security_msg 	= '';
						$security_value = '0';
						//Recorde a Values
						$item_name 				= filter_form($_POST['itemname']);
						$item_description	 	= filter_form($_POST['description']);
						$item_madein 			= $_POST['madein'];
						$item_price 			= $_POST['price'];
						$item_status			= $_POST['status'];
						$item_member			= $_POST['imember'];
						$item_category			= $_POST['icategory'];
						// Check Validate \\
							//Item Validate
							$item_err = array();
							if(empty($item_name)){$item_err[] = "Cant Set Item Name Empty"; $security_value = '1';}
							if(strlen($item_name) < 3 || strlen($item_name) > 20){$item_err[] = "Error Item Name LessThan 3 Character Or More Than 20 Character";$security_value = '1';}
							if(empty($item_description)){$item_err[] = "Can't Set Item Description Empty"; $security_value = '1';}
							if(empty($item_madein)){$item_err[] = "You Must Set Country Of Item"; $security_value = '1';}
							if(empty($item_price)){$item_err[] = "The Item Must Be Have A Price"; $security_value = '1';}
							if(strlen($item_price) < 1 ){$item_err[] = "The Item Must Be Have A Price"; $security_value = '1';}
							if(strlen($item_price) > 100000 ){$item_err[] = "Price Not Avilable"; $security_value = '1';}
							if($item_status == 0 ){$item_err[] = "You Must Choose The Item Status"; $security_value = '1';};
						foreach($item_err as $smsg_error ){echo "<div class=\"alert-danger text-error\"><strong>".$smsg_error."</strong></div>";}
						//If no error => Update Database
						if(empty($item_err) && $security_value == '0')
						{
								//Insert User into The DataBase
								$stmt = $con->prepare("INSERT INTO items(
								Name,Description,Price,Add_Date,Country_Made,Status,Member_ID,Cat_ID)
								VALUES
								(:iname,:idesc,:iprice,now(),:icountry,:istatus,:imember,:icategory)");
								$stmt->execute(array(
								'iname' 	=> 	$item_name,
								'idesc' 	=> 	$item_description,
								'iprice'	=> 	$item_price,
								'icountry' 	=> 	$item_madein,
								'istatus'	=> 	$item_status,
								'imember'	=> 	$item_member,
								'icategory'	=>	$item_category
								));
								$newitem_count 	= $stmt->rowCount();
							if($newitem_count == 1){ $form_success = "<div class=\"alert-success text-succses\">"."Success Add New Item"."</div>"; redirection($form_success);}
						else{$form_err = "<div class=\"alert-danger text-one-error\">"."Item Already Added"."</div>"; redirection($form_err);}

						}
						}
					else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."Error 404 Page Not Found"."</div>";redirection($redirect_err,4);}
					}
			//*edit item Page
			elseif($shopedit == 'edit')
			{
				$item_edit_id =  isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id'])  : '0';
					// If Edit = id=? != The Session Display The Form
						// Statment To Get Info
						// = fetchItem("*","categories","Ordering","ASC","ID",$cate_edit_id,"where");
						$count_item_edit = checkvalueDB("item_ID","items","item_ID",$item_edit_id);
							if($count_item_edit > 0){
								$fetch_item = fetchItemT("*","items","item_ID",$item_edit_id);
								// Record the Info To Print It
								$item_id  			= 	$fetch_item['item_ID'];
								$item_name 			= 	$fetch_item['Name'];
								$item_desc  		= 	$fetch_item['Description'];
								$item_country 	=  	$fetch_item['Country_Made'];
								$item_priceing  =  	$fetch_item['Price'];
								$item_statu 		=  	$fetch_item['Status'];
								$item_member_id	=  	$fetch_item['Member_ID'];
								$user_name			=	fetchItemT("Username","users","UseriD",$item_member_id);
								$item_cate_id 	= 	$fetch_item['Cat_ID'];
								$cate_name			=	fetchItemT("Name","categories","ID",$item_cate_id);

								// Include The Form
								include TPL."edititems.php";
							} 		// If Any One Change The Id
								else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."There's No Such Item ID"."</div>"; redirection($redirect_err);};

				}
			//---*Update Page---
			elseif($shopedit == 'update')
			{
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$security_value = 0;
					$item_err = 0;
						//Collect Info From Inputs
						$item_form_id 		= $_POST['itemid'];
						$item_form_name 	= filter_form($_POST['itemname']);
						$item_form_desc 	= filter_form($_POST['description']);
						$item_form_coun		= $_POST['madein'];
						$item_form_price	= $_POST['price'];
						$item_form_statue	= $_POST['status'];
						$item_form_member	= $_POST['imember'];
						$item_form_category	= $_POST['icategory'];
							// Check And Validate The Inputs
							//Item Validate
								$item_err = array();
								if(empty($item_form_name)){$item_err[] = "Cant Set Item Name Empty"; $security_value = '1';}
								if(strlen($item_form_name) < 3 || strlen($item_form_name) > 20){$item_err[] = "Error Item Name LessThan 3 Character Or More Than 20 Character";$security_value = '1';}
								if(empty($item_form_desc)){$item_err[] = "Can't Set Item Description Empty"; $security_value = '1';}
								if(empty($item_form_coun)){$item_err[] = "You Must Set Country Of Item"; $security_value = '1';}
								if(empty($item_form_price)){$item_err[] = "The Item Must Be Have A Price"; $security_value = '1';}
								if(strlen($item_form_price) < 1 ){$item_err[] = "The Item Must Be Have A Price"; $security_value = '1';}
								if(strlen($item_form_price) > 100000 ){$item_err[] = "Price Not Avilable"; $security_value = '1';}
								if($item_form_statue == 0 ){$item_err[] = "You Must Choose The Item Status"; $security_value = '1';};
							foreach($item_err as $smsg_error ){echo "<div class=\"alert-danger text-error\"><strong>".$smsg_error."</strong></div>";}
							//--If No Erros Insert Value
							if(empty($item_err) && $security_value == 0){
								//Update User into The DataBase
								$stmt =	$con->prepare("UPDATE items SET
								Name = ?,
								Description = ?,
								Price = ?,
								Country_Made = ?,
								Status = ?,
								Member_ID = ?,
								Cat_ID = ?
									WHERE item_ID = ?");
								$stmt->execute(array(
								$item_form_name,
								$item_form_desc,
								$item_form_price,
								$item_form_coun,
								$item_form_statue,
								$item_form_member,
								$item_form_category,
								$item_form_id));
								//Count Rows
									$item_up_count = $stmt->rowCount();
										if($item_up_count == 1){
											$form_success = "<div class=\"alert-success text-succses\">"."Success Edit The Item"."</div>"; redirection($form_success);
										}else{$form_err = "<div class=\"alert-danger text-one-error\">"."Item Already Edited"."</div>"; redirection($form_err);}
							}

				}
				else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."Page Not Found 404"."</div>"; redirection($redirect_err);};
			}
			//---*Delete Page---
			elseif($shopedit == 'delete')
			{
			$item_delete = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
							$count_delete = checkDB("item_ID ","items",$item_delete);
						if($count_delete > 0){
							$stmt = $con->prepare("DELETE FROM items WHERE item_ID = :deleteitem");
							$stmt->bindParam(":deleteitem",$item_delete);
							$stmt->execute();
							$item_delete_count = $stmt->rowCount();
								if($item_delete_count > 0)
								{$form_success  = "<div class=\"alert-success text-succses\">"."Success Delete Thi's Item "."</div>"; redirection($form_success);}
								else{$form_err = "<div class=\"alert-danger text-one-error\">"."Cant Delete Thi's Item"."</div>"; redirection($form_err);}
						}
						else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."Cant Find Thi's Item.!"."</div>"; redirection($redirect_err);}
				}
			//*Activate Items PAge
			elseif($shopedit == 'approve')
			{
			$item_approve = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
			$count_approve = checkDB("item_ID","items",$item_approve);
						if($count_approve > 0){
							$stmt = $con->prepare("UPDATE items SET Approve = 1 WHERE item_ID = :approveitem");
							$stmt->bindParam(":approveitem",$item_approve);
							$stmt->execute();
							$item_approve_count = $stmt->rowCount();
								if($item_approve_count > 0)
								{$form_success  = "<div class=\"alert-success text-succses\">"."Success Approve Thi's Item"."</div>"; redirection($form_success);}
								else{$form_err = "<div class=\"alert-danger text-one-error\">"."Cant Approve Thi's Item"."</div>"; redirection($form_err);}
				}
			}
			else{$redirect_err = "<div class=\"alert-danger text-one-error\">"."Error 404 Not Found"."</div>"; redirection($redirect_err);}
}
// If Any One Make Any Thing...
else{header('Location: index.php'); exit();}
ob_end_flush();
?>
