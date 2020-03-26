
<?php
  $featured=$featured->fetch();
  $image=getImagesByType($featured['aid'],'Cover')->fetch()['aifilename'];
?>

<div class="row">
  <div class="col-md-7 mb-3">
    <div class="card featured-box h-100">
      <div class="ribbon-wrapper ribbon-lg">
        <div class="ribbon bg-danger text-lg">
          Featured
        </div>
      </div>
      <div class = "featured-img-holder">
        <div style="background:url('/ZooAssignment/public/<?php echo $image;?>') no-repeat 50% 50%;
                    background-size: cover;
          " class="card-img-top featured-box-img" >
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title"><?php echo $featured['aname'];?></h5>
        <p class="card-text"><?php echo $featured['aspecies'].', '.$featured['acategory'];?></p>
        <a href="/ZooAssignment/public/Animals/browse/<?php echo $featured['aid'];?>" class="btn btn-primary">View Animal</a>
      </div>
    </div>
  </div>

  <div class="col-md-5 mb-3">
    <div class="card card-info h-100">
      <div class="card-header">
        <h3 class="card-title">Search</h3>
      </div>
      <div class="card-body">
        <form method="POST" class="animalForm" action="/ZooAssignment/public/Animals/search/">

          <label>Name: </label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-paw"></i></span>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Animal Name">
          </div>

          <label>Category: </label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-th"></i></span>
            </div>
            <select name="category" class="form-control" id = "typeSelect" style="max-height: 80px;">
              <option value="">--- Select Category ---</option>
              <option value="Bird">Bird</option>
              <option value="Fish">Fish</option>
              <option value="Mammal">Mammal</option>
              <option value="Reptile or Amphibian">Reptile or Amphibian</option>
            </select>
          </div><div style="height: 13px;"></div>

          <label>Location: </label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-map-marked"></i></span>
            </div>
            <select name="location" class="form-control" id = "locationSelect" style="max-height: 80px;">
              <option value="">--- Select Location ---</option>
              <?php
                  while($location = $locations->fetch()){
                ?>
                  <option value="<?php echo $location['lid'];?>">
                      <?php echo $location['lcode'];?>
                  </option>
              <?php }?>
            </select>
          </div><div style="height: 13px;"></div>

          <b>Area: </b>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-compass"></i></span>
            </div>
            <select name="area" class="form-control" id = "typeSelect">
              <option value="">--- Select Area ---</option>
              <?php
                  while($area = $areas->fetch()){
                ?>
                  <option value="<?php echo $area['aid'];?>">
                      <?php echo $area['atitle'];?>
                  </option>
              <?php }?>
            </select>
          </div>



        </div>
        <div class="card-footer">
          <input class="btn btn-primary"
          type="submit" value="Search"
          name="search">
        </div>
      </div>
    </form>
  </div>

</div>


<div class="row">

<?php
  $count = 0;
  while ($animal=$animals->fetch()){
    if($count>=3)break;
    $count++;
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
        <a href="/ZooAssignment/public/Animals/browse/<?php echo $animal['aid'];?>" class="btn btn-primary">View Animal</a>
      </div>
    </div>
  </div>

<?php } ?>

</div>


<div class = "form-row text-center">
  <div class="col-12">
    <form method="POST" class="animalForm" action="/ZooAssignment/public/Animals/search/">
      <input class="btn btn-success"
        type="submit" value="View All Animals in the Zoo"
        name="search">
    </form>
  </div>
</div>
