
<div class = "row">
  <div class = "col-lg-12">
    <div class="card card-solid">
      <div class="card-body">

          <strong style="text-transform:uppercase;">
            <i class="fas fa-compass mr-1"></i>
            Name</strong>&nbsp;
          <span class="text-muted">&nbsp;
            <?php echo $area['atitle'];?>
          </span>
          <br><br>

          <strong style="text-transform:uppercase;">
            <i class="fas fa-key mr-1"></i>
            Area Code</strong>&nbsp;
          <span class="text-muted">&nbsp;
            <?php echo $area['acode'];?>
          </span>
          <br><br>

          <strong style="text-transform:uppercase;">
            <i class="fas fa-sticky-note mr-1"></i>
            Description</strong>&nbsp;
          <span class="text-muted">&nbsp;
            <?php echo $area['adescription'];?>
          </span>
          <br><br>

          <div class = "form-row text-center">
            <div class="col-12">
              <form method="POST" class="animalForm" action="/ZooAssignment/public/Animals/search/">
                <input type="hidden" name="area" value="<?php echo $area['aid'];?>">
                <input class="btn bg-gradient-olive"
                  type="submit" value="View All Animals in This Area"
                  name="search">
              </form>
            </div>
          </div>


      </div>
    </div>
  </div>
</div>



  <div class="row">
  <?php
    while ($location=$locations->fetch()){
  ?>
    <div class="col-sm-4 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Location Code: <?php echo $location['lcode'];?></h5>
          <p class="card-text">Size: <?php echo $location['ldimensions'];?> sq. ft., Capacity: <?php echo $location['lsize'];?></p>
          <a href="/ZooAssignment/public/Areas/locations/<?php echo $location['lid'];?>" class="btn bg-gradient-olive">View Location</a>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
