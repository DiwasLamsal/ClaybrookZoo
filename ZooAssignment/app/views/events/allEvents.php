
<div class="row">

<?php
  while ($event=$events->fetch()){
  $banner = '<img style="max-height: 200px; max-width: 95%; object-fit: contain;" src="/ZooAssignment/public/'.$event['ebanner'].'" class="product-image" alt="Banner Image">';

?>
  <div class="col-lg-6 mb-3">
    <div class="card h-100">
      <div class="card-body">
        <div class = "row">
          <div class = "col-md-4">
            <?php echo $banner;?>
          </div>
          <div class = "col-md-8">
        <h5 class="card-title"><?php echo $event['etitle'];?></h5>
        <p class="card-text"><strong style="text-transform:uppercase;"><br>
          <i class="fas fa-calendar-day mr-1"></i> FROM <?php echo $event['estartdate'];?>
            &rarr; <?php echo $event['eenddate'];?></strong>&nbsp;</p>
        <a href="/ZooAssignment/public/Events/browse/<?php echo $event['eid'];?>" class="btn bg-gradient-olive">View Event</a>
        </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>
