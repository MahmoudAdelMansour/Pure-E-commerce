<?php
	//DATABASE Connect
	define("CTD","conf.php");
// ROUTS INTILAYS ADMIN
	#Language
	define("LANGUAGE","inc/lang/");
	#ADMIN CSS ROUTS
	define("CSSROUT","lay/css/");
	#ADMIN JS ROUTS
	define("JSROUT","lay/js/");
	#TMPLATE ROUT
	define("TPL","inc/tpl/");
	#Function Rout
	define("FUNC","inc/func/");
     // CONSTANT
	#PAGE TITLE
	define("TITLE","Ecommerce Home");
     //Includes
     include FUNC."ecfunc.php";
     //include LANGUAGE;
     include LANGUAGE."english.php";
     include TPL."footer.inc.php";
