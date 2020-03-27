<?php
  $coverImage = '<img style="max-height: 500px; object-fit: contain;" src="/ZooAssignment/public/'.$coverImage['aifilename'].'" class="product-image" alt="Cover Image">';
?>




<div class = "row">
  <div class = "col-lg-8 mb-3">
    <div class="card card-solid h-100">
      <div class="card-body">
        <div class="text-center">
          <?php echo $coverImage; ?>
        </div>
      </div>
    </div>
  </div>

  <div class = "col-lg-4 mb-3">
    <div class="card card-info h-100">
      <div class="card-header">
        <h3 class="card-title"><?php echo $animal['aid'];?></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <strong style="text-transform:uppercase;">
          <i class="fas fa-paw mr-1"></i>
          Name</strong>&nbsp;
        <span class="text-muted">&nbsp;
          <?php echo $animal['aname'];?>
        </span>
        <hr>


        <strong style="text-transform:uppercase;">
          <i class="fas fa-kiwi-bird mr-1"></i>
          Species</strong>&nbsp;
        <span class="text-muted">&nbsp;
          <?php echo $animal['aspecies'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <i class="fas fa-calendar-day mr-1"></i>
          Born</strong>&nbsp;
        <span class="text-muted">&nbsp;
          <?php echo $animal['adob'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <i class="fas fa-calendar-day mr-1"></i>
          Joined</strong>&nbsp;
        <span class="text-muted">&nbsp;
          <?php echo $animal['adateofjoin'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <i class="fas fa-transgender mr-1"></i>
          Gender</strong>&nbsp;
        <span class="text-muted">&nbsp;
          <?php echo $animal['agender'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <i class="fas fa-th mr-1"></i>
          Category
          </strong>&nbsp;
        <span class="text-muted">
          <?php echo $animal['acategory'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <i class="fas fa-ruler-horizontal mr-1"></i>
          Lifespan</strong>&nbsp;
        <span class="text-muted">&nbsp;
          <?php echo $animal['alifespan'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <a href = "/ZooAssignment/public/Animals/signage/<?php echo $animal['aid'];?>" target="_blank">
          <i class="fas fa-sign mr-1"></i>
          Signage</strong></a>

      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>





<div class = "row">
<?php if($globalImage){ ?>
  <div class = "col-md-4 d-flex align-items-stretch">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Global Distribution Map</h3>
      </div>
      <div class="card-body text-center">
        <?php $img=$globalImage->fetch();?>
        <img style="height: 350px; max-width: 100%; object-fit: contain;" src="/ZooAssignment/public/<?php echo $img['aifilename'];?>" class="float-left dash-global-img" alt="Global Image">
      </div>
    </div>
  </div>
  <div class = "col-md-8 d-flex align-items-stretch">
     <?php }
     else { ?>
  <div class = "col-md-12 d-flex align-items-stretch">
    <?php }?>
    <div class="card card-solid">
      <div class="card-body">

        <div class="row">
          <div class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Habitat & Population</a>
              <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Size & Diet</a>
              <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Other Information</a>
              <a class="nav-item nav-link" id="area-tab" data-toggle="tab" href="#area" role="tab" aria-controls="area" aria-selected="false">Area/Location</a>
            </div>
          </div>
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane row fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <p>
                  <b>Natural Habitat:</b>
                  <?php echo $animal['anaturalhabitat'];?>
                </p>
                <p>
                  <b>Global Population:</b>
                  <?php echo $animal['aglobalpopulation'];?>
                </p>
          </div>

            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
              <p>
                <b>Size:</b>
                <?php echo $animal['asize'];?>
              </p>
              <p>
                <b>Diet:</b>
                <?php echo $animal['adiet'];?>
              </p>
            </div>

            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
              <?php
              foreach ($catObj as $key => $value ){

                // Bird
                if($key=="bid"||is_numeric($key)||$key=="baid")
                  continue;
                elseif($key=="bnestmethod")
                   $key="Nest Construction Method";
                elseif($key=="bwingspan")
                   $key="Wingspan";
                elseif($key=="bfly")
                   $key="Can Fly";
               elseif($key=="bcolours")
                  $key="Colour Variants";

                // Mammal
                if($key=="mid"||is_numeric($key)||$key=="maid")
                  continue;
                elseif($key=="mgestational")
                   $key="Gestational Period";
                elseif($key=="mcategory")
                   $key="Mammal Category";
                elseif($key=="maveragetemp")
                   $key="Average Body Temperature";

                // Reptile/Amphibian
                if($key=="raid"||is_numeric($key)||$key=="raaid")
                  continue;
                elseif($key=="rareproductiontype")
                   $key="Reproduction Type";
                elseif($key=="raaverageclutchsize")
                   $key="Average Size of Clutch";
                elseif($key=="raaverageoffsprings")
                   $key="Average Number of Offsprings";

                // Fish
                if($key=="fid"||is_numeric($key)||$key=="faid")
                  continue;
                elseif($key=="fwatertype")
                   $key="Water Type";
                elseif($key=="fcolour")
                   $key="Colour Variants";
                elseif($key=="faveragetemp")
                   $key="Average Body Temperature";

                 echo "<p><b>$key:</b> $value</p>";
              }
              ?>

            </div>

            <div class="tab-pane fade" id="area" role="tabpanel" aria-labelledby="area">
              <p>
                <b>Area:</b>
                <a href="/ZooAssignment/public/Areas/browse/<?php echo $area['aid'];?>" class="btn btn-primary"><?php echo $area['atitle'];?></a>
              </p>
              <p>
                <b>Location:</b>
                <a href="/ZooAssignment/public/Areas/locations/<?php echo $location['lid'];?>" class="btn btn-primary"><?php echo $location['lcode'];?></a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class = "row">
  <div class = "col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Gallery</h3>
      </div>
      <div class="card-body text-center">
        <div class = "row">
          <?php
          if($galleryImages)
           while($galleryImage=$galleryImages->fetch()){
             echo '<div  class = "col-sm-4 mb-2 mt-2">
                    <img src="/ZooAssignment/public/'.$galleryImage['aifilename'].'"
                      style = "width: 100%; height: 300px; object-fit: contain;" class="img-thumbnail" alt="Cover Image">
                   </div>';
           }
           else{
             echo '<p class = "text-center">No Image Available.</p>';
           }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>


<div class = "row">
  <div class = "col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Sponsorship Information</h3>
      </div>
      <div class="card-body text-center">

        <p class = "text-center">No Sponsors Available.</p><br>
        <a href="/ZooAssignment/public/Animals/sponsor/<?php echo $animal['aid'];?>" class="btn btn-success">
          Sponsor This Animal
        </a>

      </div>
    </div>
  </div>
</div>
