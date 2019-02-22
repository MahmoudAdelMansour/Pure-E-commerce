<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"  />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php pageTitle() ?></title>
<link rel="stylesheet" href="<?php echo CSSROUT;?>font-awesome.min.css"/>
<link rel="stylesheet" href="<?php echo CSSROUT;?>bootstrap.min.css"/>
<link rel="stylesheet" href="<?php echo CSSROUT;?>front.css"/>
</head>
<body>
  <!-- Upper Bar -->
  <div class="upper-bar">
    Project
  </div>
    <!-- Nav Bar -->
  <nav class="navbar navbar-inverse">
 <span class="fa fa-home fa-3x home-ico"></span><a class="navbar-brand brand-i" href="index.php"><?php echo language('DASHBOARD'); ?></a>
  <div class="dropdown">
  <button class="dropbtn"><i class="fa fa-user fa-fw"></i><?php userphrase(); ?></button>
  <div class="dropdown-content">
     <a href=""><i class="fa fa-wrench fa-fw"></i> <?php echo language('EPROFILE'); ?></a>
    <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i> <?php echo language('SETT'); ?></a>
    <a href="logout.php"> <i class="fa fa-sign-out fa-fw"></i> <?php echo language('SIGNOUT'); ?></a>
   </div>
 </div>
 <?php
 //Variables
  $categories = getrecord("*","categories","ID");
foreach($categories as $cats){
  $catestr = str_replace(" ","-",$cats['Name']);
   ?>
   <div class="button-normal-nav">
   <a
   href="categories.php?catid=<?php echo $cats['ID']; ?>&name=<?php echo $catestr; ?>">
     <button class="normalbut">
       <i class="fa fa-puzzle-piece fa-fw cate-ico"></i>
     <?php echo $cats['Name']; ?>
   </button>
  </a>
   </div>
   <?php
 };
 ?>

 </nav>
