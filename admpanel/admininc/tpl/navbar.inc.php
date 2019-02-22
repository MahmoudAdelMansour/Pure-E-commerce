 <nav class="navbar navbar-inverse">
<span class="fa fa-home fa-3x home-ico"></span><a class="navbar-brand brand-i" href="../index.php"><?php echo language('DASHBOARD'); ?></a>
 <div class="dropdown">

 <button class="dropbtn"><i class="fa fa-user fa-fw"></i><?php userphrase(); ?></button>
 <div class="dropdown-content">
    <a href="members.php?ecshop=edit&id=<?php echo idofuser(); ?>"><i class="fa fa-wrench fa-fw"></i> <?php echo language('EPROFILE'); ?></a>
   <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i> <?php echo language('SETT'); ?></a>
   <a href="logout.php"> <i class="fa fa-sign-out fa-fw"></i> <?php echo language('SIGNOUT'); ?></a>
  </div>
</div>
<div class="button-normal-nav">
<a href="category.php"><button class="normalbut"><i class="fa fa-puzzle-piece fa-fw cate-ico"></i> <?php echo language('SECTION'); ?></button></a>
</div>
<div class="button-normal-nav">
<a href="items.php"><button class="normalbut"><i class="fa fa-shopping-bag fa-fw cate-ico"></i> <?php echo language('ITEM'); ?></button></a>
</div>
<div class="button-normal-nav">
<a href="members.php"><button class="normalbut"><i class="fa fa-users fa-fw cate-ico"></i> <?php echo language('MEM'); ?></button></a>
</div>
<div class="button-normal-nav">
<a href="#"><button class="normalbut"><i class="fa fa-bar-chart fa-fw cate-ico"></i> <?php echo language('STTICS'); ?></button></a>
</div>
<div class="button-normal-nav">
<a href="comments.php"><button class="normalbut"><i class="fa fa-comments fa-fw cate-ico"></i> <?php echo language('COMMENTS'); ?></button></a>
</div>
<div class="button-normal-nav">
<a href="#"><button class="normalbut"><i class="fa fa-pie-chart fa-fw cate-ico"></i> <?php echo language('LOGS'); ?></button></a>
</div>
</nav>
