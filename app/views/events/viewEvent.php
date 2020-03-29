<?php
  $banner = '<img style="max-height: 400px; max-width: 95%; object-fit: contain;" src="/ZooAssignment/public/'.$event['ebanner'].'" class="product-image" alt="Banner Image">';
?>


<div class = "row p-0">
  <div class = "col-lg-8 mb-3">
    <div class="card card-solid h-100 rounded-0">
      <div class="card-body">
        <div class="text-center">
          <?php echo $banner; ?>
        </div>
      </div>
    </div>
  </div>


  <div class = "col-lg-4 mb-3 p-0">
    <div class="card card-solid h-100 text-center rounded-0">
      <div class="card-body bg-gradient-olive">
          <strong style="text-transform:uppercase;">
            <?php echo $event['etitle'];?></strong>
          <hr>
            <?php echo $event['edescription'];?>
          <br>
        </div>
        <div class = "card-footer">
          <strong style="text-transform:uppercase;">
            <i class="fas fa-calendar-day mr-1"></i> FROM <?php echo $event['estartdate'];?>
              &rarr; <?php echo $event['eenddate'];?></strong>&nbsp;
          <br>

      </div>
    </div>
  </div>
</div>


<div class = "row">
  <div class = "col-lg-12 mb-4 p-0 pl-2">
    <div class="card-header bg-gradient-olive">
      <h3 class="card-title">
        Other Information</h3>
    </div>
    <div class="card card-solid h-100 rounded-0">
      <div class="card-body">
          <?php echo $event['eticket'];?>
        <br>
      </div>
    </div>
  </div>
</div>
