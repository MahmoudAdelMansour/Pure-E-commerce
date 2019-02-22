<?php
session_start();
include 'check.php';
 // Don't Include Nav
 $enav = "";
 $snav= "";
 // To Get Page Title
 $pageTitle = "Admin Login";
 include 'inti.php';
 include 'conf.php';
 // END  PHP
 ?>
 <!-- START HTML -->
		<!-- Start Body -->
 <form class="form-bb-login" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
<i class="ico-bb-phrase fa fa-user-circle fa-2x fa-fw"></i><h2 class="admin-bb-phrase">Admin Panel</h2>
<br/>
<i class="ico-bb-user fa fa-user fa-fw"></i>
<input class="form-bb-ctrl" type="text" name="user" placeholder="UserName" autocomplete="off"/>
	<br/>
	<i class="ico-bb-pass fa fa-key fa-fw"></i>
<input class="form-bb-ctrl" type="password" name="pass" placeholder="Password" autocomplete="new-password"/>
	<br/>
<input class="login-bb-ctrl" type="submit" name="submit" value="login"/>
</form>

 <!-- END HTML -->
 <!-- Start Error Zone-->

 <?php
 if(!empty($errmsg)){
	 ?>
	  <i class ="alert-bb-ico fa fa-exclamation-triangle fa-3x"></i><div class="error-alert">
		  <?php
		  echo $errmsg;
}
 ?>
 </div>
 <!-- end Error Zone-->
 <?php
//START PHP
 //Include footer
 include TPL."footer.inc.php";
 ?>
