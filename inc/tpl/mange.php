<!-- STart Mange System -->
<h1 class="text-center edit-phrase">Mange Members</h1>
<div class="container">
<div class="table-responsive">
	<table class="mange-table table table-bordered text-center">
	<tr class="tr">
		<td class="td">#ID</td>
		<td class="td">Username</td>
		<td class="td">Email</td>
		<td class="td">FullName</td>
		<td class="td">Registerd Date</td>
		<td class="td">Control</td>
	</tr>
	<?php
		// $rows => member.php To Fetch All Data 
		foreach($rows as $row_info){
        echo "<tr class=\"tr\">";
		echo "<td class=\"td\">".$row_info['UseriD']."</td>";
		echo "<td class=\"td\">".$row_info['Username']."</td>";
		echo "<td class=\"td\">". $row_info['Email']."</td>";
		echo "<td class=\"td\">".$row_info['FullName']."</td>";
		echo "<td class=\"td\">".$row_info['Date']."</td>";
		echo "<td class=\"td\"><a href=\"members.php?ecshop=edit&id=".$row_info['UseriD']."\"class=\"btn btn-success\"><i class=\"fa fa-edit fa-fw\"></i>Edit</a> 
		<a href=\"members.php?ecshop=delete&id=".$row_info['UseriD']."\"class=\"btn btn-danger confirm\"><i class=\"fa fa-close fa-fw\"></i>Delete</a> ";
		if($row_info['RegStatus'] == 0){
			echo "<a href=\"members.php?ecshop=activate&id=".$row_info['UseriD']."\"class=\"btn btn-info confirm-a\"><i class=\"fa fa-check\"></i> Activate</a></td>"; }
	echo"</tr>";}?>
	</table>
</div>
</div>

