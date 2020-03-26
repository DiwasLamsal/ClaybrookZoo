
<div class = "row">
  <div class = "col-lg-12">
    <div class="card card-solid">
      <div class="card-body">

          <strong style="text-transform:uppercase;">
            <i class="fas fa-key mr-1"></i>
            Code</strong>&nbsp;
          <span class="text-muted">&nbsp;
            <?php echo $location['lcode'];?>
          </span>
          <br><br>

          <strong style="text-transform:uppercase;">
            <i class="fas fa-compass mr-1"></i>
            Zoo Area </strong>&nbsp;
          <span class="text-muted">&nbsp;
            <a href="/ZooAssignment/public/Areas/browse/<?php echo $area['aid'];?>" class="btn btn-primary">
              <?php echo $area['atitle'];?>
            </a>
          </span>
          <br><br>

          <strong style="text-transform:uppercase;">
            <i class="fas fa-cube mr-1"></i>
            Dimensions</strong>&nbsp;
          <span class="text-muted">&nbsp;
            <?php echo $location['ldimensions'];?> sq. ft.
          </span>
          <br><br>

          <strong style="text-transform:uppercase;">
            <i class="fas fa-clock mr-1"></i>
            Feeding Time</strong>&nbsp;
          <span class="text-muted">&nbsp;
            <?php echo $location['lfeedingtime'];?>
          </span>
          <br><br>

          <strong style="text-transform:uppercase;">
            <i class="fas fa-carrot mr-1"></i>
            Food</strong>&nbsp;
          <span class="text-muted">&nbsp;
            <?php echo $location['lfood'];?>
          </span>
          <br><br>

          <strong style="text-transform:uppercase;">
            <i class="fas fa-arrows-alt-h mr-1"></i>
            Capacity</strong>&nbsp;
          <span class="text-muted">&nbsp;
            <?php echo $location['lsize'];?>
          </span>
          <br><br>

          <div class = "form-row text-center">
            <div class="col-12">
              <form method="POST" class="animalForm" action="/ZooAssignment/public/Animals/search/">
                <input type="hidden" name="area" value="<?php echo $location['lid'];?>">
                <input class="btn btn-success"
                  type="submit" value="View All Animals in This Location"
                  name="search">
              </form>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
