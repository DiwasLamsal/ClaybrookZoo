<?php

if(isset($location)){
  $location=$location->fetch();

?>

<!-- Code for edit location -->

<div class="row">

<?php
  }
?>

    <div class = "col-md-12">
      <form method="POST" class="locationForm" >

    <!-- Input addon -->
                <div class="card card">
                  <div class="card-header  bg-gradient-info">
                    <h3 class="card-title">Location Form</h3>
                  </div>
                  <div class="card-body">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      <input type="text" name="location[lcode]" class="form-control"  required <?php if(isset($location))echo 'value="'.$location['lcode'].'"';?> placeholder="Location Code">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-cube"></i></span>
                      </div>
                      <input type="text" name="location[ldimensions]" class="form-control"  required <?php if(isset($location))echo 'value="'.$location['ldimensions'].'"';?> placeholder="Location Dimensions (Square Feet)">
                    </div>


                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-carrot"></i></span>
                      </div>
                      <input type="text" name="location[lfood]" class="form-control"  required <?php if(isset($location))echo 'value="'.$location['lfood'].'"';?> placeholder="Food for Animals">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                      </div>
                      <input type="text" name="location[lfeedingtime]" class="form-control"  required <?php if(isset($location))echo 'value="'.$location['lfeedingtime'].'"';?> placeholder="Time to Feed">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-arrows-alt-h"></i></span>
                      </div>
                      <input type="number" min="1" name="location[lsize]" class="form-control"  required <?php if(isset($location))echo 'value="'.$location['lsize'].'"';?> placeholder="Maximum Number of Animals">
                    </div>

                    <b>Area: </b>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-compass"></i></span>
                      </div>
                      <select name="location[larea]" class="form-control" id = "typeSelect">

                        <?php
                            while($area = $areas->fetch()){
                          ?>
                            <option value="<?php echo $area['aid'];?>"
                                <?php if(isset($location)&& $location['larea']==$area['aid'])echo 'selected';?>>
                                <?php echo $area['atitle'];?>
                            </option>
                        <?php }?>

                      </select>
                    </div>



                    <!-- /input-group -->
                  </div>

                    <div class="card-footer">


                      <input class="btn btn-primary"
                      type="submit" value="<?php echo isset($location)?'Update':'Submit';?>"
                      name="submit" <?php if(!isset($location)){?> id="submission" <?php }?>>

                      <?php if(isset($location)){ ?>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                          <i class="fas fa-trash"></i> Delete
                        </button>

                      <?php } ?>


                    </div>

                  <!-- /.card-body -->
                </div>
      </form>
    </div>


<?php if(isset($location)){ ?>
  <?php echo $modal;?>
</div>
<?php } ?>
