
<div class="row">
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
        <h5 class="card-title"><?php echo $animal['aname'];?></h5>
        <p class="card-text"><?php echo $animal['aspecies'].', '.$animal['acategory'];?></p>
        <a href="/ZooAssignment/public/Animals/browse/<?php echo $animal['aid'];?>" class="btn bg-gradient-olive">View Animal</a>
      </div>
    </div>
  </div>
<?php } ?>
</div>
