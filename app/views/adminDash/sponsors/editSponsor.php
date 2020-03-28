<div class = "col-md-12">
  <form method="POST" class="sponsorForm" >

<!-- Input addon -->
            <div class="card">
              <div class="card-header bg-gradient-info">
                <h3 class="card-title">Sponsor Details</h3>
              </div>
              <div class="card-body">

                    <label>Company Name:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-ruler-horizontal"></i></span>
                      </div>
                      <input type="text" name="sponsor[scompany]" class="form-control"
                      required placeholder="Company Name" value="<?php echo $sponsor['scompany'];?>">
                    </div>


                      <div class="row">
                          <div class="col">
                            <label>Primary Telephone:</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                              </div>
                              <input type="tel" name="sponsor[sptelephone]" class="form-control" required
                              placeholder="Contact Number" value="<?php echo $sponsor['sptelephone'];?>">
                            </div>
                          </div>
                          <div class="col">
                            <label>Secondary Telephone:</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                              </div>
                              <input type="tel" name="sponsor[sstelephone]" class="form-control"
                               placeholder="Contact Number" value="<?php echo $sponsor['sstelephone'];?>">
                            </div><br>
                          </div>
                        </div>

                      <div class="row">
                        <div class="col">
                        <label>Email Address:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          </div>
                          <input type="text" name="sponsor[semail]" class="form-control"
                           placeholder="Email" value="<?php echo $sponsor['semail'];?>">
                        </div><br>
                      </div>
                      <div class="col">
                        <label>Website Link:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                          </div>
                          <input type="text" name="sponsor[swebsite]" class="form-control"
                           placeholder="Website" value="<?php echo $sponsor['swebsite'];?>">
                        </div><br>
                      </div>
                    </div>

                        <label>Address Details:</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                          </div>
                          <textarea type="text" name="sponsor[saddress]" class="form-control sponsor-textarea"
                          required rows="5"><?php echo $sponsor['saddress'];?></textarea>
                        </div>
                  </div>

                <!-- /input-group -->
                <div class="card-footer">

                  <input class="btn btn-primary"
                  type="submit" value="Update"
                  name="submit" <?php if(!isset($sponsor)){?> id="submission" <?php }?>>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                      <i class="fas fa-trash"></i> Delete
                    </button>

                </div>

              <!-- /.card-body -->
            </div>
  </form>
</div>



  <div class = "col-md-12">
    <form method="POST" class="areaForm" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header bg-gradient-info">
          <h3 class="card-title">Banner</h3>
        </div>
        <div class="card-body">
          <div class = "row">
            <div class = "col ">
              <div class="input-group">
                  <input type="file"  name = "bannerImg" required
                    accept="image/*">
              </div><br>
            </div>
            <div class = "col">
              <?php
                $imgCode = '<img class = "form-banner-image" src=/ZooAssignment/public/'.$sponsor['sbanner'].' alt = "Banner Image">';
                echo $imgCode;
              ?>
              <!-- Image -->
            </div>
          </div>
        </div>
          <div class="card-footer">

            <input class="btn btn-primary"
            type="submit" value="Update Banner"
            name="submitBanner" >

          </div>

        <!-- /.card-body -->
      </div>
    </form>
  </div>

<?php echo $modal;?>
