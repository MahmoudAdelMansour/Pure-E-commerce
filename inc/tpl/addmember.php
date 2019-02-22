<!-- Start Mange HTML Part -->
	<!-- Starting Work -->
<h1 class="text-center edit-phrase">Add New Member</h1>
<form action="?ecshop=insert" method="POST">
		<div class="text-center all-form">
		<!-- Start Username Area -->
			<div class="form-all-g">
<i class="fa fa-user fa-fw fa-1x"></i><label class="label-col">Username</label>
				<div class="user-input">
					<input title="Username Dont' Must Be Have A Special Character #$%&*@#!" type="text" name="newusername" class="form-user" autocomplete="off" required="required" placeholder="Member UserName"/>
				</div>
			</div>
		<!-- END Username Area -->
		<!-- Starting Work -->
		<!-- Start Password Area -->
			<div class="form-all-g">
<i class="fa fa-lock fa-fw fa-1x "></i><label class="label-col">Password</label>
			<div class="password-input">
					<i title="Hover Here To Show Password" class="show-password fa fa-eye fa-2x"></i>
					<input title="The Password Must Be Strong And Have A big And Small Character" type="password" name="newuserpassword" class="password form-password" autocomplete="new-password" placeholder="Password Must Be Strong" required="required"/>
				</div>
			</div>
		<!-- END Password Area -->
		<!-- Start FullName Area -->
			<div class="form-all-g">
<i class="fa fa-pencil fa-fw fa-1x "></i><label class="label-col">FullName</label>
				<div class="full-input">
					<input title="The FullName View In Your Profile Make It Really" type="text" name="newuserfullname" class="form-fullname" required="required" placeholder="Member Profile FullName"/>
				</div>
			</div>
		<!-- END FullName Area -->
		<!-- Start Email Area -->
			<div class="form-all-g">
<i class="fa fa-etsy fa-fw fa-1x "></i><label class="label-col">Email</label>
				<div class="email-input">
					<input title="The Email Must Be True To Verification email message" type="email" name="newuseremail"  class="form-email" required="required" placeholder="Member Email"/>
				</div>
			</div>
		<!-- END Email Area -->
		<!-- Start submit Area -->
			<div class="form-all-g">
				<div class="save-input">
					<input type="submit" name="addmember" value="Add Member" class="form-save"/>
				</div>
			</div>
		<!-- END submit Area -->
		</div>
</form>
