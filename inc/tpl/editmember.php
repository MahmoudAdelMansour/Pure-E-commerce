<!-- Start Mange HTML Part -->
	<!-- Starting Work -->
<h1 class="text-center edit-phrase">Edit Profile</h1>
<form action="?ecshop=update" method="POST">
	<input type="hidden" name="idchange" value="<?php echo $userid_edit; ?>"/>
		<div class="text-center all-form">
		<!-- Start Username Area -->
			<div class="form-all-g">
<i class="fa fa-user fa-fw fa-1x"></i><label class="label-col">Username</label>
				<div class="user-input">
					<input type="text" name="userchange" value="<?php echo $username_edit ?>" class="form-user" autocomplete="off" required="required"/>
				</div>
			</div>
		<!-- END Username Area -->
		<!-- Starting Work -->
		<!-- Start Password Area -->
			<div class="form-all-g">
<i class="fa fa-lock fa-fw fa-1x "></i><label class="label-col">New Password</label>
			<div class="password-input">
				<input type="hidden" name="oldpassword" value="<?php echo $password_edit ?>"/>
					<input type="password" name="newpassword" class="form-password" autocomplete="new-password" placeholder="Leave Empty If You Don't Change It"/>
				</div>
			</div>
		<!-- END Password Area -->
		<!-- Start FullName Area -->
			<div class="form-all-g">
<i class="fa fa-pencil fa-fw fa-1x "></i><label class="label-col">FullName</label>
				<div class="full-input">
					<input type="text" name="fullnamechange" value="<?php echo $fullname_edit ?>" class="form-fullname" required="required"/>
				</div>
			</div>
		<!-- END FullName Area -->
		<!-- Start Email Area -->
			<div class="form-all-g">
<i class="fa fa-etsy fa-fw fa-1x "></i><label class="label-col">Email</label>
				<div class="email-input">
					<input type="email" name="emailchange" value="<?php echo $email_edit ?>" class="form-email" required="required"/>
				</div>
			</div>
		<!-- END Email Area -->
		<!-- Start submit Area -->
			<div class="form-all-g">
				<div class="save-input">
					<input type="submit" name="save" value="Save" class="form-save"/>
				</div>
			</div>
		<!-- END submit Area -->
		</div>
</form>
