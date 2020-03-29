<div class="row p-3">
  <?php
  if($animals->rowCount()==0){
    ?>
      <div class = "col text-center"><h2> No Animals Found 😥</h2></div>
    <?php
  }
    while ($animal=$animals->fetch()){
      $image=getImagesByType($animal['aid'],'Cover')->fetch()['aifilename'];
  ?>
    <div class="col-sm-4">
      <div class="card animal-box">
        <div class = "animal-img-holder">
          <div style="background:url('/ZooAssignment/public/<?php echo $image;?>') no-repeat 50% 50%;
                      background-size: cover;
            " class="card-img-top animal-box-img" >
          </div>
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo $animal['aname'];?></p>
          <a href="/ZooAssignment/public/Kiosk/animal/<?php echo $animal['aid'];?>" class="btn bg-gradient-olive">View Animal</a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
