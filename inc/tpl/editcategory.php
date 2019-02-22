<!-- Start Cate HTML Part -->
	<!-- Starting Work -->
<h1 class="text-center edit-phrase">Add New Category</h1>
<form action="?ecshop=update" method="POST">
		<div class="text-center all-form">
		<!-- Start Name Area -->
			<div class="form-all-g">
<i class="fa fa-sitemap fa-fw fa-1x"></i><label class="label-col">Name</label>
				<div class="user-input">
					<input type="hidden" name="cateid" value="<?php echo $cate_id; ?>" />
					<input title="Category Name Dont' Must Be Have A Special Character #$%&*@#!" type="text" name="catename" class="form-user" autocomplete="off" required="required" placeholder="Category Name" value="<?php echo $cate_nam; ?>"/>
				</div>
			</div>
		<!-- END Name Area -->
		<!-- Starting Work -->
		<!-- Start Description Area -->
			<div class="form-all-g">
<i class="fa fa-info-circle fa-fw fa-1x "></i><label class="label-col">Description</label>
			<div class="password-input">
					<input title="The Description Of Category" type="text" name="description" class="form-password" required="required" placeholder="Category Descrip The Category" value="<?php echo $cate_desc; ?>"/>
				</div>
			</div>
		<!-- END Description Area -->
		<!-- Start Ordering Area -->
			<div class="form-all-g">
<i class="fa fa-sort fa-fw fa-1x "></i><label class="label-col">Ordering</label>
				<div class="full-input">
					<input type="number" name="ordering" class="form-fullname" placeholder="Number Of Category" required="required" value="<?php echo $cate_ord; ?>"/>
				</div>
			</div>
		<!-- END Ordering Area -->
		<!-- Start visibility Area -->
			<div class="radio-div">
			<label class="label-col">Visible: </label>
					<?php if ($cate_visi == '0'){ ?>
					<div class="radio-chil-div">
					<input id="visible-yes" type="radio" name="visibility" class="radio-form" value="0" checked />
					<label for="visible-yes">Yes</label>
					</div>
					<div class="radio-chil-div">
					<input id="visible-no" type="radio" name="visibility" class="radio-form" value="1" />
					<label for="visible-no">No</label>
						</div>
					<?php } elseif($cate_visi == '1'){?>
					<div class="radio-chil-div">
					<input id="visible-yes" type="radio" name="visibility" class="radio-form" value="0"/>
					<label for="visible-yes">Yes</label>
					</div>
					<div class="radio-chil-div">
					<input id="visible-no" type="radio" name="visibility" class="radio-form" value="1" checked />
					<label for="visible-no">No</label>
						</div>
						<?php } ?>
			</div>
		<!-- END visibility Area -->
		<!-- Start Commenting Area -->
			<div class="radio-div">
			<label  class="label-col">Allow Comments: </label>
				<?php if ($cate_comm == '0'){ ?>
				<div class="radio-chil-div">
					<input id="com-yes" type="radio" name="comment" class="radio-form" value="0" checked />
					<label for="com-yes">Yes</label>
				</div>
				<div class="radio-chil-div">
					<input id="com-no" type="radio" name="comment" class="radio-form" value="1" />
					<label for="com-no">No</label>
				</div>
				<?php } elseif($cate_comm == '1'){ ?>
					<div class="radio-chil-div">
					<input id="com-yes" type="radio" name="comment" class="radio-form" value="0" />
					<label for="com-yes">Yes</label>
				</div>
				<div class="radio-chil-div">
					<input id="com-no" type="radio" name="comment" class="radio-form" value="1" checked />
					<label for="com-no">No</label>
				</div>
				<?php } ?>
</div>
		<!-- END Commenting Area -->
		<!-- Start Ads Area -->
			<div class="radio-div">
			<label  class="label-col">Allow Ads: </label>
				<?php if ($cate_alad == '0'){ ?>
				<div class="radio-chil-div">
					<input id="ads-yes" type="radio" name="ads" class="radio-form" value="0" checked />
					<label for="ads-yes">Yes</label>
				</div>
			
				<div class="radio-form">
					<input id="ads-no" type="radio" name="ads" class="radio-form" value="1" />
					<label for="ads-no">No</label>
				</div>
				<?php } elseif($cate_alad == '1'){ ?>
					<div class="radio-chil-div">
					<input id="ads-yes" type="radio" name="ads" class="radio-form" value="0"  />
					<label for="ads-yes">Yes</label>
				</div>
			
				<div class="radio-form">
					<input id="ads-no" type="radio" name="ads" class="radio-form" value="1" checked />
					<label for="ads-no">No</label>
				</div>
				<?php } ?>
</div>
		<!-- END Ads Area -->
		<!-- Start submit Area -->
			<div class="form-all-g">
				<div class="save-input">
					<input type="submit" name="addcategory" value="Apply Change" class="form-save"/>
				</div>
			</div>
		<!-- END submit Area -->
		</div>
</form>

