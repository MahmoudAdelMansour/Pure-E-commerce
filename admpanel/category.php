<?php
/*
 ===================================================*
 *== Category Page
 * =================================================*/
ob_start();
	// Start Session
	session_start();
	// page Title
$pageTitle = "Categories";
//Error Msg
$form_err = "";
//Redirct Error
$redirect_err = "";
//Error Msg
$form_success = "";
//error Field
$field_error = "";
//Message
$message = "<h1 class=\"empty-message\">No Categories</h1>";
if(isset($_SESSION['usernameshop'])){
	include 'inti.php';
	// Include The Connect
	include CTD;
		//Get Method
		$shopedit = '';
			if (isset($_GET['ecshop']))
				{$shopedit = $_GET['ecshop'];}
					else {$shopedit = 'catemange';}
			//*Main Mange Page
			if($shopedit == 'catemange')
			{ $check_cate = getvalueDB("*","categories");
				if(!empty($check_cate)){
				include TPL."categorymange.php";
				}
				else{
					echo $message;
				}
			}
			//*Add Member Form Page
			elseif($shopedit == 'add')
			{include TPL."addcategory.php";}
			//*Add Member Insert Page
			elseif($shopedit == 'insert')
			{if($_SERVER['REQUEST_METHOD'] == 'POST'){
						//Security Error
						$security_msg 	= '';
						$security_value = '0';
						//Recorde a Values
						$cate_name 			= filter_form($_POST['catename']);
						$cate_description	 	= filter_form($_POST['description']);
						$cate_order 			= $_POST['ordering'];
						$cate_visible			= $_POST['visibility'];
						$cate_comment			= $_POST['comment'];
						$cate_ads				= $_POST['ads'];
						// Check Validate \\
							//Category Name Validate
							if(empty($cate_name)){$security_msg = "You Cant Set Category Name As Empty"; $security_value = '1';}
							if(strlen($cate_name) < 1 || strlen($cate_name) > 19)
								{$security_msg = "Error Category Name Less Than 3 Character Or More Than 19 Character"; $security_value = '1';}
							if(empty($cate_description)){$security_msg = "Cant't Set Category Description As Empty"; $security_value = '1';}
						//If no error => Update Database
						if(empty($security_msg) && $security_value == '0')
						{
							//Check Name At Database
							$cate_check 		= checkDB("Name","categories",$cate_name);
							if ($cate_check == 1){$form_err = "<div class=\"alert-danger text-one-error\">"."Thi's Category Already Exist"."</div>"; redirection($form_err);}
							else{
								//Insert User into The DataBase
								$stmt = $con->prepare("INSERT INTO categories(Name,Description,Ordering,Visibility,Allow_Comment,Allow_Ads) VALUES(:name,:ndesc,:norder,:nvisible,:ncomment,:nads)");
								$stmt->execute(array(
								'name' 		=> $cate_name,
								'ndesc' 	=> $cate_description,
								'norder'	=> $cate_order,
								'nvisible' 	=> $cate_visible,
								'ncomment'	=> $cate_comment,
								'nads'		=> $cate_ads
								));
								$newcate_count 	= $stmt->rowCount();
							if($newcate_count == 1){ $form_success = "<div class=\"alert-success text-succses\">"."Success Add New Category "."</div>"; redirection($form_success);}
						else{$form_err = "<div class=\"alert-danger text-one-error\">"."Member Already Added"."</div>"; redirection($form_err);}
							}
						}
						}else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."Error 404 Page Not Found"."</div>";redirection($redirect_err,4);}
					}
			//*edit Profile Page
			elseif($shopedit == 'edit')
			{$cate_edit_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
					// If Edit = id=? != The Session Display The Form
						// Statment To Get Info
						// = fetchItem("*","categories","Ordering","ASC","ID",$cate_edit_id,"where");
						$fetch_cate = fetchItemT("*","categories","ID",$cate_edit_id);
						$count_cate_edit = checkvalueDB("*","categories","ID",$cate_edit_id);
								if($count_cate_edit > 0){
								// Record the Info To Print It
								$cate_id  = $fetch_cate['ID'];
								$cate_nam  = $fetch_cate['Name'];
								$cate_desc =  $fetch_cate['Description'];
								$cate_ord  =  $fetch_cate['Ordering'];
								$cate_visi =  $fetch_cate['Visibility'];
								$cate_comm =  $fetch_cate['Allow_Comment'];
								$cate_alad = $fetch_cate['Allow_Ads'];

								// Include The Form
								include TPL."editcategory.php";
							} 		// If Any One Change The Id
								else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."There's No Such Category ID"."</div>"; redirection($redirect_err);};
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
					 $id_ch_cate		= $_POST['cateid'];
					 $name_ch_cate		= filter_form($_POST['catename']);
					 $desc_ch_cate	 	= filter_form($_POST['description']);
					 $order_ch_cate 	= $_POST['ordering'];
					 $visi_ch_cate 		= $_POST['visibility'];
					 $alcom_ch_cate 	= $_POST['comment'];
					 $ads_ch_cate 		= $_POST['ads'];
					 // Check Validate \\
					    $security_msg = array();
						if(empty($name_ch_cate)){$security_msg[] = "You Cant Set Category Name As Empty"; $security_value = '1';}
						if(strlen($name_ch_cate) < 1 || strlen($name_ch_cate) > 19)
								{$security_msg[] = "Error Category Name Less Than 3 Character Or More Than 19 Character"; $security_value = '1';}
						if(empty($desc_ch_cate)){$security_msg[] = "You Cant Set Description Of Category As Empty"; $security_value = '1';}
						if(empty($order_ch_cate)){$security_msg[] = "You Forget Ordering The Category"; $security_value = '1';}
						foreach($security_msg as $smsg_error ){echo "<div class=\"alert-danger text-error\"><strong>".$smsg_error."</strong></div>";}
						//If no error Update Database
						if(empty($security_msg) && $security_value == '0')
						{
							$security_cate_msg = "";
							$other_success = "";
							//Update Name
								$check_cate_name  = checkDB("Name","categories",$name_ch_cate);
								$check_cate_value = fetchItemT("Name","categories","ID",$id_ch_cate);
								if($check_cate_name > 0){
									if($name_ch_cate !== $check_cate_value['Name']){
										echo $security_cate_msg = "<div class=\"alert-danger text-one-error\">"."Category Name Already Exist"."</div>";
									}
									if($name_ch_cate == $check_cate_value['Name']){

										echo $security_cate_msg  = "<div class=\"alert-success text-succses\">"."Done!"."</div>";
									}
								}
								if($check_cate_name == 0){
									$cate_name_update  = updateDB("categories","Name","ID",$id_ch_cate,$name_ch_cate);
										if($cate_name_update > 0){

									echo $security_cate_msg  = "<div class=\"alert-success text-succses\">"."Success Update Category"."</div>";
										}
								}
								sleep(1);
								//Update Description | Order | Visibility | Update Comments | Update Ads
									$stmt = $con->prepare("UPDATE categories SET
									Description = ?,
									Ordering = ?,
									Visibility = ?,
									Allow_Comment = ?,
									Allow_Ads = ?
									WHERE ID = ?
									");
									$stmt->execute(array(
									$desc_ch_cate,
									$order_ch_cate,
									$visi_ch_cate,
									$alcom_ch_cate,
									$ads_ch_cate,
									$id_ch_cate
									));
									$form_count = $stmt->rowCount();
									if($form_count > 0){
									$other_success  = "<div class=\"alert-success text-succses\">"."Success Update Category Information  "."</div>"; redirection($other_success);
									}
									redirection();
						}
				}
			}
			//---*Delete Page---
			elseif($shopedit == 'delete')
			{			$cate_delete_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
							$count_delete = checkDB("ID","categories",$cate_delete_id);
						if($count_delete > 0){
							$stmt = $con->prepare("DELETE FROM categories WHERE ID = :deletecate");
							$stmt->bindParam(":deletecate",$cate_delete_id);
							$stmt->execute();
							$cate_delete_count = $stmt->rowCount();
								if($cate_delete_count > 0)
								{$form_success  = "<div class=\"alert-success text-succses\">"."Success Deleted Thi's Category "."</div>"; redirection($form_success);}
								else{$form_err = "<div class=\"alert-danger text-one-error\">"."Cant Delete Thi's Category"."</div>"; redirection($form_err);}
						}
						else {$redirect_err = "<div class=\"alert-danger text-one-error\">"."Cant Find Thi's Category"."</div>"; redirection($redirect_err);}}
			else{$redirect_err = "<div class=\"alert-danger text-one-error\">"."Error 404 Not Found"."</div>"; redirection($redirect_err);}
}
// If Any One Enter With Out Session
else{header('Location: index.php'); exit();}
ob_end_flush();
?>
