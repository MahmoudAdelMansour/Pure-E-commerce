<div class="wrraper">
 <div class="the-container">
	 <div class="main-phrase">
	 <h1><i class="fa fa-sitemap fa-fw dash-ico"></i>Mange Categories</h1>
	 </div>
	<div class="width-panel panel panel-default">
		<div class="hp-cate hp-main panel-heading">
		<i class="fa fa-puzzle-piece fa-fw"></i>Mange The Categories

		</div>
		<div class="cate-div">
		<div class="hb-cate hb-main panel-body">
			<?php
			$sorting = "ASC";
			$sortinga = array("ASC","DESC");
			if(isset($_GET['sort']) && in_array($_GET['sort'],$sortinga))
        {$sorting = $_GET['sort'];}
			if(!isset($_GET['sort']) || $_GET['sort'] == 'ASC')
        {echo "<div class=\"sorting\"><a href=\"?sort=DESC\"><i class=\"fa fa-list-ul sort-ico\"></i></a></div>";}
			elseif($_GET['sort'] == 'DESC')
        {echo "<div class=\"sorting\"><a href=\"?sort=ASC\"><i class=\"fa fa-list-ol sort-ico\"></i></a></div>";}
			$cate = fetchItem("*","categories","Ordering",$sorting);
			foreach($cate as $categories){
				echo "<div class=\"category\"><h3><i class=\"fa fa-chevron-right fa-fw\"></i>".$categories['Name']."</h3><br/>";
				echo "<div class=\"cate-button\">"."<a href=\"category.php?ecshop=edit&id=".$categories['ID']."\" class=\"btn btn-success\"><i class=\"fa fa-edit fa-fw\"></i>Edit</a>".
		"<a href=\"category.php?ecshop=delete&id=".$categories['ID']."\" class=\"btn btn-danger confirm-cate\"><i class=\"fa fa-close fa-fw\"></i>Delete</a>"."</div>";
				echo "<p>".$categories['Description']."</p>"."<br/>";
				if($categories['Visibility'] == 1)
						{echo "<span class=\"cate-hidden public-span\">Hidden</span>";}
							else{echo "<span class=\"aparent public-span\">Aparent</span>";}
				if($categories['Allow_Comment'] == 1){
						echo "<span class=\"comdisaple public-span\">Comments Disabled</span>";}
							else{echo "<span class=\"comallow public-span\">Comments Allowed</span>";}
				if($categories['Allow_Ads'] == 1)
						{echo "<span  class=\"addisable public-span\">Ads Disabled</span>";}
							else{echo "<span class=\"adallow public-span\">Ads Allowed</span>";}

			echo "<br/></div><hr/>";
				}

			?>

			</div>
		</div>
	</div>
 </div>
</div>
