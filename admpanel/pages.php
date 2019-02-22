<?php
/* Categories => [Mange | Edit | Update | Add | Insert | Delete | Stats ] */
// Use Shorten IF Condition  ? True : False
	$shop = '';
		if (isset($_GET['ecshop']))
		{$shop = $_GET['ecshop'];}
		else {$shop = 'dashmange';}
			// Main Page
			if ($shop == 'dashmange'){echo "Welcome mange";}
				elseif($shop == 'add'){echo "Welcome Add";}
				elseif($shop == 'edit'){echo "Welcome Edit";}
				elseif($shop == 'insert'){echo "Welcome Insert";}
					else{echo "Error Not Found 404"; }
