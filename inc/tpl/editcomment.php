<!-- Start Comment HTML Part -->
	<!-- Starting Work -->
<h1 class="text-center edit-phrase">Edit Comment</h1>
<form action="?ecshop=update" method="POST">
		<div class="text-center all-form">
		<!-- Start Name Area -->
			<div class="form-all-g">
<i class="fa fa-sitemap fa-fw fa-1x"></i><label class="label-col">Comment</label>
				<div class="user-input">
					<input
					type="hidden"
					 name="comment_id"
					  value="<?php echo $comment_id; ?>" />
					<textarea title="Inssert Comment"
           type="text"
            name="comment"
             class="form-user" autocomplete="off"
              required="required"
               placeholder="The Comment"
                ><?php echo $comment_des; ?></textarea>
				</div>
			</div>
      <!-- Start submit Area -->
        <div class="form-all-g">
          <div class="save-input">
            <input
						type="submit"
						 name="editcomment"
						  value="Apply Change"
							 class="form-save"/>
          </div>
        </div>
      <!-- END submit Area -->
      </div>
  </form>
