<?php
/*
====================================================
= Mange Comments Page                               |
= Edit & Delete & Approve  : The Comments From Here |
====================================================
*/
ob_start();
session_start();
//Page Title
$pageTitle    = "Mange Comments";
//Error Msg
$form_err     = "";
//Redirct Error
$redirect_err = "";
//Error Msg
$form_success = "";
//error Field
$field_error  = "";
$message = "<h1 class=\"empty-message\">No Comments</h1>";
// Session Check 'usernameshop'
if(isset($_SESSION['usernameshop'])){
  // Include INTI FILE AND CONNECTION FILE
  include 'inti.php';
  include CTD;
  // GET REQUEST ecshop
  $shopedit = isset($_GET['ecshop']) ? $_GET['ecshop'] : "commentmange";

    //Mange Page
    if($shopedit == "commentmange")
      { $comments_values = getvalueDB("*","comments");
        if(!empty($comments_values)){
        //Include HTML COmment Mange Page
        include TPL."commentmarkup.php";}
        else {echo $message;}
      }
    //Edit With Get Request
    elseif($shopedit == 'edit')
    {
      $comm_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
      // Get Comment Value From DB useing Id From $comm_id
      $ch_comm = checkDB("c_id","comments","$comm_id");
      //If Check is True And FOund A ID In Get Request;
      if ($ch_comm > 0){
        $comments_values = fetchItemT("*","comments","c_id",$comm_id);
          $comment_id   = $comments_values['c_id'];
          $comment_des  = $comments_values['comment'];
          $commentAP    = $comments_values['status'];
          $comment_i    = $comments_values['item_id'];
          $comment_ui   = $comments_values['user_id'];
        include TPL."editcomment.php";
      }
      else {$redirect_err =
        "<div class=\"alert-danger text-one-error\">".
        "There's No Such Comment ID".
        "</div>";
        redirection($redirect_err);}
    }
    // Update Comment Data In DB
    elseif($shopedit == 'update'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Validate Security Variables
            $security_value = 0 ;
            $comm_err       = 0 ;
            //Collect Info From Inputs
            $comment_write = filter_form($_POST['comment']);
            $comment_id    = is_numeric($_POST['comment_id']) ? intval($_POST['comment_id']) : '0';
            $comm_err = array();
            if(empty($comment_write)){$comm_err[] = "Cant Set Comment Empty Write Some Thing Or Delete It"; $security_value = '1';}
            if(strlen($comment_write) < 3 || strlen($comment_write) > 150){$comm_err[] = "Error Comment LessThan 3 Or More Than 150 Char ";$security_value = '1';}
              //Display Errors
              foreach ($comm_err as $comment_error ) {
            redirection("<div class=\"alert-danger text-error\"><strong>".$comment_error."</strong></div>");
              }
              //If No Errors
                if(empty($comm_err) && $security_value == 0 ){
                  //Update User into The DataBase
                  $stmt = $con->prepare("UPDATE comments SET comment = ? WHERE c_id = ?");
                  $stmt->execute(array($comment_write,$comment_id));
                  //Count Rows
                    $comment_row_count = $stmt->rowCount();
                      if($comment_row_count == 1){
                        $form_success = "<div class=\"alert-success text-succses\">"."Success Edit The comment"."</div>"; redirection($form_success);
                      }else{$form_err = "<div class=\"alert-danger text-one-error\">"."Comment Already Edited"."</div>"; redirection($form_err);}
                    }

                }
          }
          //Approve It Comments
      elseif($shopedit == 'activate'){
        $comment_approve  = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
        $count_comment_db = checkDB("c_id","comments",$comment_approve);
        if($count_comment_db > 0) {
            $stmt = $con->prepare("UPDATE comments SET status = 1 WHERE c_id = :commentid");
            $stmt->bindParam(":commentid",$comment_approve);
	          $stmt->execute();
            $count_c_row = $stmt->rowCount();
            if($count_c_row > 0){
              $form_success  = "<div class=\"alert-success text-succses\">"."Success Approve Thi's Comment"."</div>"; redirection($form_success);}
              else{$form_err = "<div class=\"alert-danger text-one-error\">"."Cant Approve Thi's Comment"."</div>"; redirection($form_err);}
            }
        }
          //Delete Comments
        elseif($shopedit == 'delete'){
          $comment_delete   = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '0';
          $count_comment_db = checkDB("c_id","comments",$comment_delete);
            if($count_comment_db > 0 ){
              $stmt = $con->prepare("DELETE FROM comments WHERE c_id = :comment_delete");
              $stmt->bindParam(":comment_delete",$comment_delete);
              $stmt->execute();
              $count_delete = $stmt->rowCount();
              if($count_delete > 0 ){
                $form_success  = "<div class=\"alert-success text-succses\">"."Success Delete Thi's Comment"."</div>"; redirection($form_success);}
                else{$form_err = "<div class=\"alert-danger text-one-error\">"."Cant Delete Thi's Comment"."</div>"; redirection($form_err);} }
        }
          }



// Exit Application When Isset Session Has False Value
else { header('Location: index.php'); exit();  }
ob_end_flush();
