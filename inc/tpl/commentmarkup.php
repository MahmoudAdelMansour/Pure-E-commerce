<!-- STart Mange Comment Page -->
<h1 class="text-center edit-phrase">Mange Comments</h1>
<div class="container">
<div class="table-responsive">
	<table class="mange-table table table-bordered text-center">
		<tr class="tr">
				<!-- Tables Head -->
				<td class="td">#ID</td>
				<td class="td">Comment</td>
				<td class="td">Item Name</td>
				<td class="td">User</td>
				<td class="td">Added Date</td>
				<td class="td">Control</td>
		</tr>
	<?php
		// $rows => member.php To Fetch All Data
		foreach($comments_values as $comments){
	    echo "<tr class=\"tr\">";
			echo "<td class=\"td\">".$comments['c_id']."</td>";
			echo "<td class=\"td\">".$comments['comment']."</td>";
			// Fetch Data With Function fetchItemT --\\--
			$user_comment = fetchItemT("*","users","UseriD",$comments['user_id']);
			$item_comment = fetchItemT("*","items","item_ID",$comments['item_id']);
			echo "<td class=\"td\">".$item_comment['Name']."</td>";
			echo "<td class=\"td\">".$user_comment['Username']."</td>";
			echo "<td class=\"td\">".$comments['comment_date']."</td>";
			// Control Buttons
			echo "<td class=\"td\">
	    <a href=\"comments.php?ecshop=edit&id=".$comments['c_id']."\"class=\"btn btn-success\">
	    <i class=\"fa fa-edit fa-fw\"></i>
	    Edit
	    </a>
			<a href=\"comments.php?ecshop=delete&id=".$comments['c_id']."\"class=\"btn btn-danger confirm\">
	    <i class=\"fa fa-close fa-fw\"></i>
	    Delete
	    </a> ";
			// Approve Button
			if($comments['status'] == 0){
					echo "<a href=\"comments.php?ecshop=activate&id=".$comments['c_id']."\"class=\"btn btn-info confirm-a\">
		      <i class=\"fa fa-check\"></i>
		       Activate
		       </a>
		        </td>";
				}
			echo"</tr>";
		}?>
	</table>
</div>
</div>
