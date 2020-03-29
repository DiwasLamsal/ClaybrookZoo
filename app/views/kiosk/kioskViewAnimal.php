<?php
  $coverImage = '<img style="max-width: 100%; object-fit: contain;" src="/ZooAssignment/public/'.$coverImage['aifilename'].'" class="product-image" alt="Cover Image">';
?>
<div class = "container p-3">

<h2 class="text-green text-center text-zoo-heading divided mb-5"><?php echo $animal['aname'];?></h2>

<div class = "row">
  <div class = "col-lg-12">
    <div class="card card h-100 p-0 shadow-none"  style="background: none;">
      <div class="card-body p-0" >
        <div class="text-center">
          <?php echo $coverImage; ?>
        </div>
      </div>
    </div>
  </div>

  <div class = "col-lg-4 mb-3">
    <div class="card card bg-gradient-olive h-100">
      <div class="card-header">
        <h3 class="card-title"><?php echo $animal['aid'];?></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <strong style="text-transform:uppercase;">
          <i class="fas fa-paw mr-1"></i>
          Name</strong>&nbsp;
        <span class="text-white">&nbsp;
          <?php echo $animal['aname'];?>
        </span>
        <hr>


        <strong style="text-transform:uppercase;">
          <i class="fas fa-kiwi-bird mr-1"></i>
          Species</strong>&nbsp;
        <span class="text-white">&nbsp;
          <?php echo $animal['aspecies'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <i class="fas fa-calendar-day mr-1"></i>
          Born</strong>&nbsp;
        <span class="text-white">&nbsp;
          <?php echo $animal['adob'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <i class="fas fa-calendar-day mr-1"></i>
          Joined</strong>&nbsp;
        <span class="text-white">&nbsp;
          <?php echo $animal['adateofjoin'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <i class="fas fa-transgender mr-1"></i>
          Gender</strong>&nbsp;
        <span class="text-white">&nbsp;
          <?php echo $animal['agender'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <i class="fas fa-th mr-1"></i>
          Category
          </strong>&nbsp;
        <span class="text-white">
          <?php echo $animal['acategory'];?>
        </span>
        <hr>

        <strong style="text-transform:uppercase;">
          <i class="fas fa-ruler-horizontal mr-1"></i>
          Lifespan</strong>&nbsp;
        <span class="text-white">&nbsp;
          <?php echo $animal['alifespan'];?>
        </span>
        <hr>

      </div>
      <!-- /.card-body -->
    </div>
  </div>

<div class = "col-lg-8 mb-3">
  <div class="card card-solid h-100">
    <div class="card-body">
        <p>
          <b>Natural Habitat:</b></br>
          <?php echo $animal['anaturalhabitat'];?>
        </p>
        <p>
          <b>Global Population:</b></br>
          <?php echo $animal['aglobalpopulation'];?>
        </p>
        <p>
          <b>Size:</b></br>
          <?php echo $animal['asize'];?>
        </p>
    </div>
  </div>
</div>


<?php if($globalImage){ ?>
  <div class = "col-md-12 d-flex pb-0">
    <div class="card h-100  shadow-none" style="width: 100%; background: none;">
      <div class="card-header bg-gradient-olive">
        <h3 class="card-title">Global Distribution Map</h3>
      </div>
      <div class="card-body text-center p-0">
        <?php $img=$globalImage->fetch();?>
        <img style="width: 100%; object-fit: contain;" src="/ZooAssignment/public/<?php echo $img['aifilename'];?>" class="float-left dash-global-img" alt="Global Image">
      </div>
    </div>
  </div>
<?php } ?>
  <div class = "col-md-12 mb-3 d-flex ">
      <div class="card card-solid h-100">
        <div class="card-body">
          <p>
            <b>Diet:</b><br>
            <?php echo $animal['adiet'];?>
          </p>

          <?php
          foreach ($catObj as $key => $value ){
            // Bird
            if($key=="bid"||is_numeric($key)||$key=="baid")
              continue;
            elseif($key=="bnestmethod")
               $key="Nest Construction Method:<br>";
            elseif($key=="bwingspan")
               $key="Wingspan:<br>";
            elseif($key=="bfly")
               $key="Can Fly";
           elseif($key=="bcolours")
              $key="Colour Variants:<br>";

            // Mammal
            if($key=="mid"||is_numeric($key)||$key=="maid")
              continue;
            elseif($key=="mgestational")
               $key="Gestational Period:<br>";
            elseif($key=="mcategory")
               $key="Mammal Category:<br>";
            elseif($key=="maveragetemp")
               $key="Average Body Temperature:<br>";

            // Reptile/Amphibian
            if($key=="raid"||is_numeric($key)||$key=="raaid")
              continue;
            elseif($key=="rareproductiontype")
               $key="Reproduction Type:<br>";
            elseif($key=="raaverageclutchsize")
               $key="Average Size of Clutch:<br>";
            elseif($key=="raaverageoffsprings")
               $key="Average Number of Offsprings:<br>";

            // Fish
            if($key=="fid"||is_numeric($key)||$key=="faid")
              continue;
            elseif($key=="fwatertype")
               $key="Water Type:<br>";
            elseif($key=="fcolour")
               $key="Colour Variants:<br>";
            elseif($key=="faveragetemp")
               $key="Average Body Temperature:<br>";

             echo "<p><b>$key</b> $value</p>";
          }
          ?>
          <p>
            <b>Area:</b>
            <a href="/ZooAssignment/public/Areas/browse/<?php echo $area['aid'];?>" class="text-olive"><?php echo $area['atitle'];?></a>
          </p>
          <p>
            <b>Location:</b>
            <a href="/ZooAssignment/public/Areas/locations/<?php echo $location['lid'];?>" class="text-olive"><?php echo $location['lcode'];?></a>
          </p>



        </div>
      </div>
    </div>
</div>



<div class = "row">
  <div class = "col-md-12">
    <div class="card">
      <div class="card-header bg-gradient-olive">
        <h3 class="card-title">Gallery</h3>
      </div>
      <div class="card-body text-center">
        <div class = "row">
          <?php
          if($galleryImages)
           while($galleryImage=$galleryImages->fetch()){
             echo '<div  class = "col-lg-6 mb-2 mt-2">
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
    <div class="card">
      <!-- <div class="card-header bg-gradient-olive">
        <h3 class="card-title">Sponsorship Information</h3>
      </div> -->
      <div class="card-body text-center">
<?php if ($sponsorship!=false){
  $sponsor=getSponsorById($sponsorship['ssid'])->fetch();
  $banner = '<img class = "form-banner-image" src=/ZooAssignment/public/'.$sponsor['sbanner'].' alt = "Banner Image">';
  if (filter_var($sponsor['swebsite'], FILTER_VALIDATE_URL) !== FALSE) {
    $banner = "<a href = '$sponsor[swebsite]' target='_blank'>$banner</a>";
  }
?>
    <div class = "row">
      <div class = "col-md-6 mb-3 text-center">
        <?php echo $banner;?>
      </div>
      <div class = "col-md-6 mb-3 text-left">
        <br>
        <strong style="text-transform:uppercase;">
          <i class="fas fa-building mr-1"></i>
          Sponsored By</strong>&nbsp;
        <span class="text-muted">&nbsp;
          <?php echo $sponsor['scompany'];?>
        </span><br><hr>
        <strong style="text-transform:uppercase;">
          <i class="fas fa-phone mr-1"></i>
          Contact</strong>&nbsp;
        <span class="text-muted">&nbsp;
          <?php echo $sponsor['sptelephone'];?>
        </span>

      </div>
    </div>

<?php
}else{ ?>
  <br>
        <p class = "text-center">No Sponsors Available.</p>
<?php } ?>
      </div>
    </div>
  </div>
</div>

</div>
