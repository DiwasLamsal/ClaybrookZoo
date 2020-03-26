
<div class="row">

<?php
  while ($area=$areas->fetch()){
?>
  <div class="col-sm-4 mb-3">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title"><?php echo $area['atitle'];?></h5>
        <p class="card-text"><?php echo $area['adescription'];?></p>
        <a href="/ZooAssignment/public/Areas/browse/<?php echo $area['aid'];?>" class="btn btn-primary">View Area</a>
      </div>
    </div>
  </div>
<?php } ?>
</div>
