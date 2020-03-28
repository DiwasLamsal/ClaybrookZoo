<?php

if(isset($animal)){
  $animal=$animal->fetch();

  $coverImage = '<img src="/ZooAssignment/public/'.$coverImage['aifilename'].'" class="product-image" alt="Cover Image">';
?>

<!-- Code for edit animal -->



<!-- Default box -->
  <div class = "col-md-12">
     <div class="card card-solid">
       <div class="card-body">
         <div class="row">
           <div class="col-11 col-sm-6">
             <h3 class="d-inline-block d-sm-none"><?php echo $animal['aspecies'];?> - <?php echo $animal['aname'];?></h3>
             <div class="col-12">
               <?php echo $coverImage; ?>
             </div>
             <div class="col-12 product-image-thumbs">
               <?php
               if($galleryImages)
                while($galleryImage=$galleryImages->fetch()){
                  echo '<div class="product-image-thumb">
                          <img src="/ZooAssignment/public/'.$galleryImage['aifilename'].'" class="product-image" alt="Cover Image">
                        </div>';
                }
                else{
                  echo '<p>No Image Available.</p>';
                }
               ?>
             </div>
           </div>
           <div class="col-12 col-sm-6">
             <h3 class="my-3"><?php echo $animal['aname'];?> - <?php echo $animal['aspecies'];?></h3>
             <p>
                 <div class="row">
                    <div class="col-md-5">
                      <b>Animal Code:</b>
                    </div>
                    <div class="col">-
                      <?php echo $animal['aid'];?>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-5">
                     <b>Species:</b>
                   </div>
                   <div class="col">-
                     <?php echo $animal['aspecies'];?>
                   </div>
                  </div>
                  <div class="row">
                   <div class="col-md-5">
                     <b>Name:</b>
                   </div>
                   <div class="col">-
                     <?php echo $animal['aname'];?>
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-md-5">
                    <b>Date of Birth:</b>
                  </div>
                  <div class="col">-
                    <?php echo $animal['adob'];?>
                  </div>
                </div>
                <div class="row">
                   <div class="col-md-5">
                     <b>Date Joined:</b>
                   </div>
                   <div class="col">-
                     <?php echo $animal['adateofjoin'];?>
                   </div>
                </div>
                <div class="row">
                 <div class="col-md-5">
                   <b>Gender:</b>
                 </div>
                 <div class="col">-
                   <?php echo $animal['agender'];?>
                 </div>
               </div>
               <div class="row">
                  <div class="col-md-5">
                    <b>Average Lifespan:</b>
                  </div>
                  <div class="col">-
                    <?php echo $animal['alifespan'];?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                   <b>Level (For Sponsorship):</b>
                 </div>
                 <div class="col">-
                   <?php echo $animal['alevel'];?>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                   <b>Category:</b>
                 </div>
                 <div class="col">-
                   <?php echo $animal['acategory'];?>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                   <b>Status:</b>
                 </div>
                 <div class="col">-
                   <?php echo $animal['astatus'];?>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                   <b>Featured:</b>
                 </div>
                 <div class="col">-
                   <?php echo $animal['afeatured'];?>
                 </div>
                 <br>
                 <br>
                </div>
                <div class="row">
                  <div class="col-md-5"></div>
                  <div class="col">
                   <?php echo $animal['afeatured']=="No"?'
                   <a class="tbl-btn btn btn-info btn-sm" href = "/ZooAssignment/public/ManageAnimals/featured/'.$animal['aid'].'">
                        Set Featured
                   </a>':
                   '';?>
                 </div>
                </div>
             </p>
           </div>
         </div>
         <div class="row mt-4">
           <nav class="w-100">
             <div class="nav nav-tabs" id="product-tab" role="tablist">
               <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Habitat & Population</a>
               <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Size & Diet</a>
               <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Other Information</a>
             </div>
           </nav>
           <div class="tab-content p-3" id="nav-tabContent">
             <div class="tab-pane row fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">

               <?php if($globalImage){ ?>
                <div class = "row ">
                 <div class = "col-md-3">
                   <?php $img=$globalImage->fetch();?>
                       <img src="/ZooAssignment/public/<?php echo $img['aifilename'];?>" class="float-left dash-global-img" alt="Global Image">
                   </div>
                   <div class = "col-md-9">
                  <?php }?>

                 <p>
                   <b>Natural Habitat:</b>
                   <?php echo $animal['anaturalhabitat'];?>
                 </p>
                 <p>
                   <b>Global Population:</b>
                   <?php echo $animal['aglobalpopulation'];?>
                 </p>
                 <?php if($globalImage){ ?>
               </div>
              </div>
             <?php }?>

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
               <p>
                 <b>Size:</b>
                 <?php echo $animal['asize'];?>
               </p>

             </div>
           </div>
         </div>
       </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->
</div>

<div class = "col-md-12">
  <form method="POST" class="userForm" enctype="multipart/form-data">

  <!-- Input addon -->
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Change Cover Image</h3>
      </div>
      <div class="card-body">

        <label>
          <!-- <?php echo $coverImage;?> -->
        </label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-upload"></i></span>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01"
              aria-describedby="inputGroupFileAddon01" name = "coverImg" required
              accept="image/*">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
        </div><br>
        <b>Note:</b> Cover image will be replaced after this action.
      </div>
        <div class="card-footer">
          <input class="btn btn-primary"
          type="submit" value="<?php echo isset($animal)?'Update':'Submit';?>"
          name="submitCoverImage">
        </div>
      <!-- /.card-body -->
    </div>
  </form>
</div>

<div class="row col-md-12">

  <div class = "col-md-6">
    <form method="POST" class="userForm" enctype="multipart/form-data">

    <!-- Input addon -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Change/Upload Global Distribution Map Image</h3>
        </div>
        <div class="card-body">
          <label>
          </label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon03"><i class="fa fa-upload"></i></span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile03"
                aria-describedby="inputGroupFileAddon03" name = "globalImg" required
                accept="image/*">
              <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
            </div>
          </div><br>
          <b>Note:</b> Global image will be replaced after this action.
        </div>
          <div class="card-footer">
            <input class="btn btn-primary"
            type="submit" value="Submit"
            name="submitGlobalImage">
          </div>
        <!-- /.card-body -->
      </div>
    </form>
  </div>

  <div class = "col-md-6">
    <form method="POST" class="userForm" enctype="multipart/form-data">

    <!-- Input addon -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Change/Upload Gallery Images</h3>
        </div>
        <div class="card-body">

          <label>
            <!-- <?php echo $coverImage;?> -->
          </label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-upload"></i></span>
            </div>
            <div class="custom-file">
              <input type="file" multiple="multiple" class="custom-file-input" id="inputGroupFile02"
                aria-describedby="inputGroupFileAddon02" name = "galleryImgs[]"  required
                accept="image/*">
              <label class="custom-file-label" for="inputGroupFile02">Choose files</label>
            </div>
          </div><br>
          <b>Note:</b> Gallery images will be replaced after this action.
        </div>
          <div class="card-footer">
            <input class="btn btn-primary"
            type="submit" value="Submit"
            name="submitGallery">
          </div>
        <!-- /.card-body -->
      </div>
    </form>
  </div>
</div>

<?php
  }
?>

    <div class = "col-md-12">
      <form method="POST" class="animalForm" enctype="multipart/form-data">

    <!-- Input addon -->

                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Animal Form</h3>
                  </div>
                  <div class="card-body">

                    <label>Name: </label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-paw"></i></span>
                      </div>
                      <input type="text" name="animal[aname]" class="form-control"  required <?php if(isset($animal))echo 'value="'.$animal['aname'].'"';?> placeholder="Animal Name">
                    </div>


                    <div class="row">
                        <div class="col">
                          <label>Species:</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-kiwi-bird"></i></span>
                            </div>
                            <input type="text" name="animal[aspecies]" class="form-control"  required <?php if(isset($animal))echo 'value="'.$animal['aspecies'].'"';?> placeholder="Animal Species">
                          </div>
                        </div>
                        <div class="col">
                          <label>Lifespan:</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-ruler-horizontal"></i></span>
                            </div>
                            <input type="text" name="animal[alifespan]" class="form-control"  required <?php if(isset($animal))echo 'value="'.$animal['alifespan'].'"';?> placeholder="Animal Lifespan">
                          </div>
                        </div>
                      </div>


                    <div class="row">
                        <div class="col">
                          <label>Date of Birth:</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                            </div>
                            <input type="date" name="animal[adob]" class="form-control"  required <?php if(isset($animal))echo 'value="'.$animal['adob'].'"';?> placeholder="Date of Birth">
                          </div>
                        </div>
                        <div class="col">
                          <label>Date Animal Joined the Zoo:</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                            </div>
                            <input type="date" name="animal[adateofjoin]" class="form-control"  required <?php if(isset($animal))echo 'value="'.$animal['adateofjoin'].'"';?> placeholder="Date Animal Joined the Zoo">
                          </div>
                        </div>
                      </div>


                    <div class="row">
                        <div class="col">
                          <label>Gender: </label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-transgender"></i></span>
                            </div>
                            <select name="animal[agender]" class="form-control">
                              <option value="Male" <?php if(isset($animal) && $animal['agender']=="Male")echo 'selected';?>>Male</option>
                              <option value="Female" <?php if(isset($animal) && $animal['agender']=="Female")echo 'selected';?>>Female</option>
                              <option value="Other" <?php if(isset($animal) && $animal['agender']=="Other")echo 'selected';?>>Other</option>
                            </select>
                          </div><br>
                        </div>
                        <div class="col">
                          <label>Sponsorship Level: </label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                            </div>
                            <select name="animal[alevel]" class="form-control" id = "levelSelect">
                              <option value="A" <?php if(isset($animal) && $animal['alevel']=="A")echo 'selected';?>>A - 2500</option>
                              <option value="B" <?php if(isset($animal) && $animal['alevel']=="B")echo 'selected';?>>B - 2000</option>
                              <option value="C" <?php if(isset($animal) && $animal['alevel']=="C")echo 'selected';?>>C - 1500</option>
                              <option value="D" <?php if(isset($animal) && $animal['alevel']=="D")echo 'selected';?>>D - 1000</option>
                              <option value="E" <?php if(isset($animal) && $animal['alevel']=="E")echo 'selected';?>>E - 500</option>
                            </select>
                          </div><br>
                        </div>
                      </div>


<?php if(!isset($animal)){ ?>
                      <label>Animal Cover Image:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-upload"></i></span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01" name = "coverImg"  required
                            accept="image/*">
                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                      </div><br>
<?php }?>


                    <div class="row">
                        <div class="col">
                          <label>Category: </label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-th"></i></span>
                            </div>
                            <select name="animal[acategory]" class="form-control" id = "typeSelect" <?php if(isset($animal))echo'disabled';?>>
                              <option value="Bird" <?php if(isset($animal) && $animal['acategory']=="Bird")echo'selected';?>>Bird</option>
                              <option value="Fish" <?php if(isset($animal) && $animal['acategory']=="Fish")echo 'selected';?>>Fish</option>
                              <option value="Mammal" <?php if(isset($animal) && $animal['acategory']=="Mammal")echo 'selected';?>>Mammal</option>
                              <option value="Reptile or Amphibian" <?php if(isset($animal) && $animal['acategory']=="Reptile or Amphibian")echo 'selected';?>>Reptile or Amphibian</option>
                            </select>
                          </div><br>
                        </div>
                        <div class="col">
                          <label>Location: </label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-map-marked"></i></span>
                            </div>
                            <select name="animal[alid]" class="form-control" id = "locationSelect">
                              <?php
                                  while($location = $locations->fetch()){
                                ?>
                                  <option value="<?php echo $location['lid'];?>"
                                      <?php if(isset($animal)&& $animal['alid']==$location['lid'])echo 'selected';?>>
                                      <?php echo $location['lcode'];?>
                                  </option>
                              <?php }?>
                            </select>
                          </div><br>
                        </div>
                      </div>



                    <div class="row">
                        <div class="col">
                          <label>Animal Diet Requirements:</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-carrot"></i></span>
                            </div>
                            <textarea type="text" name="animal[adiet]" class="form-control staff-textarea"
                            required rows="5"><?php if(isset($animal))echo $animal['adiet'];?></textarea>
                          </div>
                        </div>
                        <div class="col">
                          <label>Natural Habitat Description:</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-home"></i></span>
                            </div>
                            <textarea type="text" name="animal[anaturalhabitat]" class="form-control staff-textarea"
                            required rows="5"><?php if(isset($animal))echo $animal['anaturalhabitat'];?></textarea>
                          </div>
                        </div>
                      </div>



                    <div class="row">
                        <div class="col">
                          <label>Global Population Distribution:</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-globe-europe"></i></span>
                            </div>
                            <textarea type="text" name="animal[aglobalpopulation]" class="form-control staff-textarea"
                            required rows="5"><?php if(isset($animal))echo $animal['aglobalpopulation'];?></textarea>
                          </div>
                        </div>
                        <div class="col">
                          <label>Animal Size Description (Height, Weight):</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-weight"></i></span>
                            </div>
                            <textarea type="text" name="animal[asize]" class="form-control staff-textarea"
                            required rows="5"><?php if(isset($animal))echo $animal['asize'];?></textarea>
                          </div>
                        </div>
                      </div><hr>



<!-- ###################################### ACCORDING TO TYPE ###################################### -->

<div class = "animalCategory" id = "acc-to-type">
  <h5 class = "text-center" id = "acc-to-type-heading"></h5>
  <br>
  <div class = "content" id = "display-remaining-form">
    <!-- ###################################### ADD CONTENT BY JAVASCRIPT ###################################### -->
  </div>
</div>



<!-- ###################################### END OF FORM ###################################### -->


                    <!-- /input-group -->
                  </div>

                    <div class="card-footer">


                      <input class="btn btn-primary"
                      type="submit" value="<?php echo isset($animal)?'Update':'Submit';?>"
                      name="submit" <?php if(!isset($animal)){?> id="submission" <?php }?>>



                    </div>

                  <!-- /.card-body -->
                </div>
      </form>
    </div>


<!-- ###################################### EXTRA FORM ELEMENTS ###################################### -->

    <div id = "extraFormElements">

    <!-- ###################################### REPTILE_AMPHIBIANS ###################################### -->

              <div class = "animalCategory" id = "reptile-amphibians">
                <h4 class = "text-center"><i class="fas fa-frog"></i> Other Reptile/Amphibian Details</h4>
                <br>

                <div class="row">
                    <div class="col">
                      <label>Type of Reproduction:</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-times"></i></span>
                        </div>
                        <input type="text" name="reptile_amphibian[rareproductiontype]" class="form-control"  required <?php if(isset($reptile_amphibian))echo 'value="'.$reptile_amphibian['rareproductiontype'].'"';?> placeholder="Reproduction Type">
                      </div>
                    </div>
                    <div class="col">
                      <label>Average Clutch Size:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-ruler-combined"></i></span>
                        </div>
                        <input type="text" name="reptile_amphibian[raaverageclutchsize]" class="form-control"  required <?php if(isset($reptile_amphibian))echo 'value="'.$reptile_amphibian['raaverageclutchsize'].'"';?> placeholder="Average Size of Clutch">
                      </div><br>
                    </div>
                  </div>

                  <label>Average Number of Oppsprings:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                    </div>
                    <input type="number" min="1" name="reptile_amphibian[raaverageoffsprings]" class="form-control"  required <?php if(isset($reptile_amphibian))echo 'value="'.$reptile_amphibian['raaverageoffsprings'].'"'; else echo 'value="1"';?> placeholder="Average Offspring Number">
                  </div>
              </div>



    <!-- ###################################### FISH ###################################### -->

              <div class = "animalCategory" id = "Fish">
                <h4 class = "text-center"><i class="fas fa-fish"></i> Other Fish Details</h4>
                <br>

                <div class="row">
                    <div class="col">
                      <label>Average Body Temperature:</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-thermometer-half"></i></span>
                        </div>
                        <input type="text" name="fish[faveragetemp]" class="form-control"  required <?php if(isset($fish))echo 'value="'.$fish['faveragetemp'].'"';?> placeholder="Average Temperature">
                      </div>
                    </div>
                    <div class="col">
                      <label>Water Type:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-water"></i></span>
                        </div>
                        <input type="text" name="fish[fwatertype]" class="form-control"  required <?php if(isset($fish))echo 'value="'.$fish['fwatertype'].'"';?> placeholder="Water Type">
                      </div><br>
                    </div>
                  </div>

                  <label>Fish Colour Variants:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-palette"></i></span>
                    </div>
                    <textarea type="text" name="fish[fcolour]" class="form-control staff-textarea"
                    required rows="4"><?php if(isset($fish))echo $fish['fcolour'];?></textarea>
                  </div>

              </div>


    <!-- ###################################### BIRDS ###################################### -->

            <div class = "animalCategory" id = "Bird">
              <h4 class = "text-center"><i class="fas fa-dove"></i> Other Bird Details</h4>
              <br>

                <label>Nest Construction Method:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                  </div>
                  <textarea type="text" name="bird[bnestmethod]" class="form-control staff-textarea"
                  required rows="4"><?php if(isset($bird))echo $bird['bnestmethod'];?></textarea>
                </div>

              <div class="row">
                  <div class="col">
                    <label>Wingspan:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-arrows-alt-h"></i></span>
                      </div>
                      <input type="text" name="bird[bwingspan]" class="form-control"  required <?php if(isset($bird))echo 'value="'.$bird['bwingspan'].'"';?> placeholder="Wingspan">
                    </div>
                  </div>
                  <div class="col">
                    <label>Can Fly:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-fly"></i></span>
                      </div>
                      <select name="bird[bfly]" class="form-control" id = "flySelect">
                        <option value="Yes" <?php if(isset($bird) && $bird['bfly']=="Yes")echo 'selected';?>>Yes</option>
                        <option value="No" <?php if(isset($bird) && $bird['bfly']=="No")echo 'selected';?>>No</option>
                      </select>
                    </div><br>
                  </div>
                </div>

                <label>Bird Colour Variants:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-palette"></i></span>
                  </div>
                  <textarea type="text" name="bird[bcolours]" class="form-control staff-textarea"
                  required rows="4"><?php if(isset($bird))echo $bird['bcolours'];?></textarea>
                </div>

            </div>


    <!-- ###################################### MAMMALS ###################################### -->

              <div class = "animalCategory" id = "Mammal">
                <h4 class = "text-center"><i class="fas fa-hippo"></i> Other Mammal Details</h4>
                <br>

                <div class="row">
                    <div class="col">
                      <label>Average Body Temperature:</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-thermometer-full"></i></span>
                        </div>
                        <input type="text" name="mammal[maveragetemp]" class="form-control"
                        required <?php if(isset($mammal))echo 'value="'.$mammal['maveragetemp'].'"';?>
                        placeholder="Average Temperature">
                      </div>
                    </div>
                    <div class="col">
                      <label>Gestational Period:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-clock"></i></span>
                        </div>
                        <input type="text" name="mammal[mgestational]" class="form-control"
                        required <?php if(isset($mammal))echo 'value="'.$mammal['mgestational'].'"';?>
                        placeholder="Gestation Period">
                      </div><br>
                    </div>
                  </div>

                  <label>Category:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-table"></i></span>
                    </div>
                    <input type="text" name="mammal[mcategory]" class="form-control"
                    required <?php if(isset($mammal))echo 'value="'.$mammal['mcategory'].'"';?>
                    placeholder="eg. Prototheria/Metatheria/Eutheria">
                  </div>

              </div>
    <!-- ###################################### END OF CATEGORY COMPONENTS ###################################### -->
    </div>


<?php if(isset($animal)){ ?>

      <div class="col-md-12 mb-3">
        <div class="card card-info h-100">
          <div class="card-header">
            <h3 class="card-title">Animal Watchlist</h3>
          </div>
          <div class="card-body" style="padding-bottom: 0px; padding-top: 10px;">



        <?php
        $watchlist=checkAnimalContainsWatchlist($animal['aid']);
        if($watchlist){ ?>
        <div class = "col-md-12 text-center">
          <br><h3>Animal Already in Watchlist</h3><br>
          <a target="_blank" href="/ZooAssignment/public/ManageWatchlist/all/<?php echo $watchlist->fetch()['wid'];?>" class="btn btn-primary">
            View Watchlist
          </a><br><br><br>
        </div>
      </div>
      <?php
        }
        else{ ?>




            <form method="POST" class="animalForm" action="/ZooAssignment/public/ManageWatchlist/add/<?php echo $animal['aid'];?>">

              <label>Condition: (Ex: Avian influenza)</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-biohazard"></i></span>
                </div>
                <input type="text" name="watchlist[wcondition]" class="form-control" placeholder="Animal Condition">
              </div>

              <div class = "row">
                <div class = "col">
                  <label>Threat Level: </label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-exclamation-triangle"></i></span>
                    </div>
                    <select name="watchlist[wlevel]" class="form-control">
                      <option value="Low" <?php if(isset($watchlist) && $watchlist['wlevel']=="Low")echo 'selected';?>>Low</option>
                      <option value="Moderate" <?php if(isset($watchlist) && $watchlist['wlevel']=="Moderate")echo 'selected';?>>Moderate</option>
                      <option value="Substantial" <?php if(isset($watchlist) && $watchlist['wlevel']=="Substantial")echo 'selected';?>>Substantial</option>
                      <option value="Severe" <?php if(isset($watchlist) && $watchlist['wlevel']=="Severe")echo 'selected';?>>Severe</option>
                      <option value="Critical" <?php if(isset($watchlist) && $watchlist['wlevel']=="Critical")echo 'selected';?>>Critical</option>
                    </select>
                  </div>
                </div>
                <div class = "col">
                  <label>Date Recorded: </label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                    </div>
                    <input type="date" name="watchlist[wrecorddate]"
                    class="form-control" placeholder="Animal Name"
                    value="<?php if(isset($watchlist)) echo $watchlist['wrecorddate'];?>">
                  </div>
                </div>
              </div>

              <label>Other Details: </label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                </div>
                <textarea type="text" name="watchlist[wdetails]" class="form-control staff-textarea"
                required rows="5"><?php if(isset($watchlist))echo $watchlist['wdetails'];?></textarea>
              </div>

            </div>
              <div class="card-footer">
                <input class="btn btn-primary"
                type="submit" value="Add to Watchlist"
                name="watchlistSubmit">
              </div>
          </div>
        </form>
      </div>


<?php } } ?>



<script>

// Ionică Bizău - https://stackoverflow.com/questions/48613992/bootstrap-4-file-input-doesnt-show-the-file-name
// Change file name on upload
  $('#inputGroupFile01, #inputGroupFile03').on('change',function(){
      var fileName = $(this).val();
      var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
      if(cleanFileName.length<50)
        $(this).next('.custom-file-label').html(cleanFileName);
      else
        $(this).next('.custom-file-label').html("File Name Too Long");
  });

  $('#inputGroupFile02').on('change',function(){
      $(this).next('.custom-file-label').html("Image Files Are Selected...");
  });


// Display Relevant form according to animal Type (Fish, Mammal, Bird, Reptiles and Amphibians)
function formManipulate() {
  var e = document.getElementById("typeSelect");
  var selected = e.options[e.selectedIndex].value;
  $("#display-remaining-form").empty();
  if(selected=="Reptile or Amphibian"){
    $("#reptile-amphibians").clone().appendTo("#display-remaining-form");
  }
  else{
    $("#"+selected).clone().appendTo("#display-remaining-form");
  }
};
formManipulate();

$("#typeSelect").on('change',function(){
  formManipulate();
});


</script>
