<?php include 'inti.php'; include CTD; include TPL."header.inc.php"; ?>
<?php  $catename = str_replace("-"," ",$_GET['name']); $cateid = $_GET['catid']; ?>
<div class="container">
  <h1 class="page-head"><?php echo $catename; ?></h1>
  <div class="container">
    <div class="items-boxs">
  <?php
    $items = getrecord_where("*","items","Cat_ID",$cateid,"item_ID");
    foreach ($items as $item) {
      ?>
      <div class="item-box">
        <div class="item-picture">
          <?php echo "<img src=\"https://via.placeholder.com/230x200/\"/>" ?>
        </div>
        <div class="item-name">
          <?php echo $item['Name'];  ?>
        </div>
        <div class="item-desc">
          <?php echo $item['Description'];  ?>
        </div>
        <div class="item-country">
          <?php echo $item['Country_Made']; ?>
        </div>
        <div class="item-price">
          <?php echo "$".$item['Price'];  ?>
        </div>
      </div>
      <?php
    }
   ?>
    </div>
   </div>
</div>
<?php  include TPL."footer.inc.php"; ?>
