<div class="wrraper">

 <div class="the-container">
	 <div class="dash-phrase">
	 <h1><i class="fa fa-cogs  dash-ico"></i> DashBoard</h1>
	 </div>
	 <div class="col-md-3">
		<div class="stat">
			Total Member <br/>
			<span><a href="members.php"><?php echo countItem('UseriD','users');?></a></span>
		</div>
	 </div>
	  <div class="col-md-3">
		<div class="stat">
			Pending Member <br/>
			<span>
        <a href="members.php?ecshop=dashmange&mbr=pending">
          <?php echo checkDB("RegStatus","users",0);?>
        </a>
        </span>
		</div>
	 </div>
	  <div class="col-md-3">
		<div class="stat">
			 Total Items <br/>
			<span>
        <a href="items.php">
        <?php echo countItem('item_ID','items');?>
          </a>
      </span>
		</div>
	 </div>
	  <div class="col-md-3">
		<div class="stat">
			Total Comments <br/>
			<span>
        <a href="comments.php">
          <?php echo countItem('c_id','comments'); ?>
        </a>
        </span>
		</div>
	 </div>
 </div>
<div class="latest">
 <div class="the-latest-container">
	<div class="col-sm-6">
		<div class="panel panel-default ">
			<div class="panel-heading hp-dash-one panel-toedit">
				<i class="fa fa-users"></i> Latest Registerd Users
        <span class="pull-right toggel-info">
          <i class="fa fa-plus fa-lg"></i>
        </span>
			</div>
			<div class="panel-body hb-dash-one">
				<?php getLatest("*","users","UseriD","5","Username","lastmember");?>
			</div>

		</div>
	</div>
		<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading hp-dash-tow panel-toedit">
				<i class="fa fa-tag"></i> Latest Items
        <span class="pull-right toggel-info">
          <i class="fa fa-plus fa-lg"></i>
        </span>
			</div>
			<div class="panel-body hb-dash-tow">
				<?php
        getLatest("*","items","item_ID","5","Name","lastitems");
        ?>
			</div>
		</div>
	</div>
			<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading hp-dash-three panel-toedit">
				<i class="fa fa-filter"></i> Latest UnActive Users
        <span class="pull-right toggel-info">
          <i class="fa fa-plus fa-lg"></i>
        </span>
			</div>
			<div class="panel-body hb-dash-three">
				<?php getLatest("*","users","UseriD","20","Username","lastpmember");?>
			</div>
		</div>
	</div>
  <div class="col-sm-6">
<div class="panel panel-default">
  <div class="panel-heading hp-dash-three panel-toedit">
    <i class="fa fa-comments"></i> Latest Comments
    <span class="pull-right toggel-info">
      <i class="fa fa-plus fa-lg"></i>
    </span>
  </div>
  <div class="panel-body hb-dash-three">
    <?php getLatest("*","comments","c_id","5","comment","lastcomment");?>
      </div>
      </div>
</div>
</div>
 </div>
</div>
<script type="text/javascript">
var panelita = document.querySelectorAll(".panel-toedit");
for (let i = 0; i < panelita.length; i++) {
  panelita[i].addEventListener("click", function() {
    //this.nextElementSibling.style.display = "block";
    if (this.nextElementSibling.style.display == "block") {
      this.nextElementSibling.style.display = "none";
    } else {
      this.nextElementSibling.style.display = "block";
    }
  });
}
var iconita = document.querySelectorAll(".toggel-info");
for (let i = 0; i < iconita.length; i++) {
  iconita[i].addEventListener("click", function(){
    if(this.firstElementChild.classList.contains("fa-plus")){
      this.firstElementChild.classList.add("fa-minus");
 this.firstElementChild.classList.remove("fa-plus");
    } else {
this.firstElementChild.classList.add("fa-plus");
    this.firstElementChild.classList.remove("fa-minus");
  }
  });
}
</script>
</div>
