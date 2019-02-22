<!-- Start Item HTML Part -->
	<!-- Starting Work -->
<h1 class="text-center edit-phrase">Edit The Item</h1>
<form action="?ecshop=update" method="POST">
		<div class="text-center all-form">
		<!-- Start Name Area -->
			<div class="form-all-g">
			<i class="fa fa-shopping-bag fa-fw fa-1x"></i><label class="label-col">Name</label>
				<div class="name-input">
					<input type="hidden" name="itemid" value="<?php echo $item_id; ?>"/> 
					<input title="Item Name Dont' Must Be Have A Special Character #$%&*@#!"
					 type="text"
					  name="itemname"
					   class="form-user"
					     required="required"
					      placeholder="Item Name"
							value = "<?php echo $item_name; ?>"
					      />
							
				</div>
			</div>
		<!-- END Name Area -->
		<!-- Starting Work -->
		<!-- Start Description Area -->
			<div class="form-all-g">
			<i class="fa fa-info-circle fa-fw fa-1x "></i><label class="label-col">Description</label>
			<div class="descrip-input">
					<input 
					title="The Description Of Item"
					 type="text"
					  name="description"
					   class="form-password" 
					    required="required" 
					     placeholder="Descrip The Item"
							value = "<?php echo $item_desc; ?>"
					     />
				</div>
			</div>
		<!-- END Description Area -->
		<!-- Start Country Of item Area -->
			<div class="form-all-g col-md-6">
			<i class="fa fa-info-circle fa-fw fa-1x "></i><label class="label-col">Made In</label>
			<div class="another-input ">
					<input 
					title="The Country Of Item"
					 type="text"
					  name="madein"
					   class="form-password another-field" 
					    required="required" 
					     placeholder="Country Of The Item"
							value = "<?php echo $item_country; ?>"
					     />
				</div>
			</div>
		<!-- END Country Of item Area Area -->
		<!-- Start Price -->
			<div class="form-all-g col-md-6">
			<label class="label-col price-lable">Price</label>
			<div class="anothertow-input">
					<input 
					title="The Price Of Item"
					 type="number"
					  name="price"
					   class="form-password another-field" 
					    required="required" 
					     placeholder="Price Of The Item"
							value = "<?php echo $item_priceing; ?>"
					     />
				</div>
			</div>
		<!-- END Price -->
		<!-- Start status -->
			<div class="form-all-g col-md-15">
			<div class="anotherthree-input">
					<select class="select-box" name="status">
			<option value="1" <?php if($item_statu == 1){echo "selected";} ?> >New Item</option>
			<option value="2" <?php if($item_statu == 2){echo "selected";} ?> >Like New</option>
			<option value="3" <?php if($item_statu == 3){echo "selected";} ?> >Used</option>
			<option value="4" <?php if($item_statu == 4){echo "selected";} ?> >Like Used</option>
			<option value="5" <?php if($item_statu == 5){echo "selected";} ?> >Old</option>
			<option value="6" <?php if($item_statu == 6){echo "selected";} ?> >Very Old</option>
					</select>
				</div>
			</div>
		<!-- END status -->
		<!-- Start Members -->
			<div class="form-all-g col-md-15">
			<div class="anotherthree-input">
					<select class="select-box" name="imember">
				<?php 
				$members = getvalueDB("*","users");
				foreach($members as $member_select){echo "<option value=\"".$member_select['UseriD']."\"";
					  if($item_member_id == $member_select['UseriD']){echo "selected";}
					echo ">".$member_select['Username']."</option>";}
				?>
					</select>
				</div>
			</div>
		
		<!-- END Members -->
		<!-- Start category -->
			<div class="form-all-g col-md-15">
			<div class="anotherthree-input">
					<select class="select-box" name="icategory">		
				<?php 
				$cate_each = getvalueDB("*","categories");
				foreach($cate_each as $category_select){echo "<option value=\"".$category_select['ID']."\"";
					if($item_cate_id == $category_select['ID']){echo "selected";};
					echo ">".$category_select['Name']."</option>";}
				?>
					</select>
				</div>
			</div>
		<!-- END category -->
		<!-- Start submit Area -->
			<div class="form-all-g">
				<div class="save-input">
					<input type="submit" name="edititem" value="Edit Item" class="form-save"/>
				</div>
			</div>
		<!-- END submit Area -->
		</div>
</form>
