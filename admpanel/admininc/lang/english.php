<?php
function language($phrase){
		 static $lang = array(
		   'DASHBOARD' 	=> 	'DShop',
		   'USERNAME' 	=> 	'Guest',
		   'SECTION' 		=> 	'Categories',
		   'ITEM'				=>	'The Items',
		   'MEM'				=>	'Members',
		   'STTICS'			=>	'Statistics',
			 'COMMENTS' 	=> 	'Comments',
		   'LOGS'				=>	'The Logs',
	     'EPROFILE' 	=> 	'Edit Profile',
		   'SETT' 			=> 	'Settings',
		   'SIGNOUT' 		=> 	'Logout'
		   /* '' => '',
		   '' => '',
		   '' => '',
		   '' => ''
		   */
		 );
		return $lang[$phrase];

	}
