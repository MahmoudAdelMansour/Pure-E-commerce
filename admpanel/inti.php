<?php
	//DATABASE Connect
	define("CTD","../admpanel/conf.php");
	

// ROUTS INTILAYS ADMIN
	#Language 
	define("LANGUAGE","../admpanel/admininc/lang/");
	#ADMIN CSS ROUTS
	define("CSSROUT","../admpanel/adminlay/css/");
	#ADMIN JS ROUTS
	define("JSROUT","../admpanel/adminlay/js/");
	#TMPLATE ROUT
	define("TPL","../admpanel/admininc/tpl/");
	#Function Rout
	define("FUNC","../admpanel/admininc/func/");
     // CONSTANT
	#PAGE TITLE 
	define("TITLE","Admin Panel");
     //Includes
     include FUNC."ecfunc.php";
     //include LANGUAGE;
     include LANGUAGE."english.php";
     include TPL."header.inc.php";
     include TPL."footer.inc.php";
		///Remove  //NavBar  At Same Page
		if(!isset($enav)){include TPL."navbar.inc.php";}
		///Remove  //sideBar  At Same Page
		if(!isset($snav)){include TPL."sidebar.inc.php";}
