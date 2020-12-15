<?php

if(isset($area)){
  $area=$area->fetch();

?>

<!-- Code for edit area -->

<div class="row">

<?php
  }
?>

    <div class = "col-md-12">
      <form method="POST" class="areaForm" >

    <!-- Input addon -->
                <div class="card card">
                  <div class="card-header  bg-gradient-info">
                    <h3 class="card-title">Area Form</h3>
                  </div>
                  <div class="card-body">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-compass"></i></span>
                      </div>
                      <input type="text" name="area[atitle]" class="form-control"  required <?php if(isset($area))echo 'value="'.$area['atitle'].'"';?> placeholder="Area Name">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      <input type="text" name="area[acode]" class="form-control"  required <?php if(isset($area))echo 'value="'.$area['acode'].'"';?> placeholder="Area Key">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                      </div>
                      <textarea type="text" name="area[adescription]" class="form-control staff-textarea"
                      required placeholder="Area Description" rows="7"><?php if(isset($area))echo $area['adescription'];?></textarea>
                    </div>


                    <!-- /input-group -->
                  </div>

                    <div class="card-footer">


                      <input class="btn btn-primary"
                      type="submit" value="<?php echo isset($area)?'Update':'Submit';?>"
                      name="submit" <?php if(!isset($area)){?> id="submission" <?php }?>>

                      <?php if(isset($area)){ ?>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                          <i class="fas fa-trash"></i> Delete
                        </button>

                      <?php } ?>


                    </div>

                  <!-- /.card-body -->
                </div>
      </form>
    </div>


<?php if(isset($area)){ ?>
  <?php echo $modal;?>
</div>
<?php } ?>
