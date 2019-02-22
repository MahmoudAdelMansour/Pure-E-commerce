<!-- Start Item HTML Part -->
	<!-- Starting Work -->
<h1 class="text-center edit-phrase">Add New Item</h1>
<form action="?ecshop=insert" method="POST">
		<div class="text-center all-form">
		<!-- Start Name Area -->
			<div class="form-all-g">
			<i class="fa fa-shopping-bag fa-fw fa-1x"></i><label class="label-col">Name</label>
				<div class="name-input">
					<input title="Item Name Dont' Must Be Have A Special Character #$%&*@#!"
					 type="text"
					  name="itemname"
					   class="form-user"
					     required="required"
					      placeholder="Item Name"/>
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
					     placeholder="Descrip The Item"/>
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
					     placeholder="Country Of The Item"/>
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
					     placeholder="Price Of The Item"/>
				</div>
			</div>
		<!-- END Price -->
		<!-- Start status -->
			<div class="form-all-g col-md-15">
			<div class="anotherthree-input">
					<select class="select-box" name="status">
			<option value="0">Item Status</option>
			<option value="1">New Item</option>
			<option value="2">Like New</option>
			<option value="3">Used</option>
			<option value="4">Like Used</option>
			<option value="4">Old</option>
			<option value="4">Very Old</option>
					</select>
				</div>
			</div>
		<!-- END status -->
		<!-- Start Members -->
			<div class="form-all-g col-md-15">
			<div class="anotherthree-input">
					<select class="select-box" name="imember">
					<option value="0">Choose Memeber</option>
				<?php 
				$members = getvalueDB("*","users");
				foreach($members as $member_select){echo "<option value=\"".$member_select['UseriD']."\">".$member_select['Username']."</option>";}
				?>
					</select>
				</div>
			</div>
		
		<!-- END Members -->
		<!-- Start category -->
			<div class="form-all-g col-md-15">
			<div class="anotherthree-input">
					<select class="select-box" name="icategory">
					<option value="0">Category Of Item</option>
				<?php 
				$cate_each = getvalueDB("*","categories");
				foreach($cate_each as $category_select){echo "<option value=\"".$category_select['ID']."\">".$category_select['Name']."</option>";}
				?>
					</select>
				</div>
			</div>
		<!-- END category -->
		<!-- Start submit Area -->
			<div class="form-all-g">
				<div class="save-input">
					<input type="submit" name="additem" value="Add Item" class="form-save"/>
				</div>
			</div>
		<!-- END submit Area -->
		</div>
</form>
