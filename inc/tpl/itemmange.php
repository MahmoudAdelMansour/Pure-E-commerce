<!-- STart Mange System -->
<h1 class="text-center edit-phrase">Mange Items</h1>
<div class="container">
<div class="table-responsive">
	<table class="mange-table table table-bordered text-center">
	<tr class="tr">
		<td class="td">#ID</td>
		<td class="td">Name</td>
		<td class="td">Description</td>
		<td class="td">Price</td>
		<td class="td">Member</td>
		<td class="td">Category</td>
		<td class="td">Added Date</td>
		<td class="td">Control</td>
	</tr>
	<?php
		// $rows => member.php To Fetch All Data 
		foreach($items_fetch as $items){
        echo "<tr class=\"tr\">";
		echo "<td class=\"td\">".$items['item_ID']."</td>";
		echo "<td class=\"td\">".$items['Name']."</td>";
		echo "<td class=\"td\">". $items['Description']."</td>";
		echo "<td class=\"td\">"."$".$items['Price']."</td>";
		$member_name = fetchItemT("*","users","UseriD",$items['Member_ID']);
		echo "<td class=\"td\">".$member_name['Username']."</td>";
		$category_name = fetchItemT("*","categories","ID",$items['Cat_ID']);
		echo "<td class=\"td\">".$category_name['Name']."</td>";
		echo "<td class=\"td\">".$items['Add_Date']."</td>";
		echo "<td class=\"td\"><a href=\"items.php?ecshop=edit&id=".$items['item_ID']."\"class=\"btn btn-success\"><i class=\"fa fa-edit fa-fw\"></i>Edit</a> 
		<a href=\"items.php?ecshop=delete&id=".$items['item_ID']."\"class=\"btn btn-danger confirm-item\"><i class=\"fa fa-close fa-fw\"></i>Delete</a> ";
		if($items['Approve'] == 0){
			echo "<a href=\"items.php?ecshop=approve&id=".$items['item_ID']."\"class=\"btn btn-info approve-item\"><i class=\"fa fa-check fa-fw\"></i>Approve</a></td>"; }
	echo"</tr>";}?>
	</table>
</div>
</div>

