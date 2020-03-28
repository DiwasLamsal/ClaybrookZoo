<?php
  $animal = getAnimalById($sponsorship['said'])->fetch();
  $sponsor = getSponsorById($sponsorship['ssid'])->fetch();
  $animalLink = "<a class = 'btn bg-gradient-olive' href = '/ZooAssignment/public/ManageAnimals/all/$animal[aid]' target='_blank'>$animal[aname]</a>";
  $sponsorLink = "<a class = 'btn bg-gradient-olive' href = '/ZooAssignment/public/ManageSponsorships/sponsors/$sponsor[sid]' target='_blank'>$sponsor[scompany]</a>";
?>


<div class="row col-md-12 text-center">
  <div class = "col-md-6">
    <div class="card">
      <div class="card-header bg-gradient-info">
        <h3 class="card-title">Sponsored Animal</h3>
      </div>
      <div class="card-body">
        <?php echo $animalLink;?>
      </div>
    </div>
  </div>

  <div class = "col-md-6">
    <div class="card">
      <div class="card-header bg-gradient-info">
        <h3 class="card-title">Sponsored By</h3>
      </div>
      <div class="card-body">
        <?php echo $sponsorLink;?>
      </div>
    </div>
  </div>
</div>




<div class = "col-md-12">
  <form method="POST" class="sponsorForm" >

<!-- Input addon -->
            <div class="card">
              <div class="card-header bg-gradient-info">
                <h3 class="card-title">Sponsor Details</h3>
              </div>
              <div class="card-body">

            <input type="hidden" name="sponsorship[reviewdate]" class="form-control"  value="<?php echo date("Y-m-d");?>">

            <div class = "row">
              <div class = "col">
                <label>Status: </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hourglass"></i></span>
                  </div>
                  <select name="sponsorship[sstatus]" class="form-control">
                    <option value="Active" <?php if($sponsorship['sstatus']=="Active")echo 'selected';?>>Active</option>
                    <option value="Pending" <?php if($sponsorship['sstatus']=="Pending")echo 'selected';?>>Pending</option>
                    <option value="Expired" <?php if($sponsorship['sstatus']=="Expired")echo 'selected';?>>Expired</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <label>Price: </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-pound-sign"></i></span>
                  </div>
                  <input type="text" value = "<?php echo $sponsorship['sprice'];?>"
                   class="form-control" name="sponsorship[sprice]">
                </div>
              </div>
            </div>


            <div class = "row">
              <div class = "col">
                <label>Signage Area Percentage(Ex: 1/8): </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-compass"></i></span>
                  </div>
                  <input type="text" name="sponsorship[sarea]" class="form-control"
                  placeholder="Sponsorship Area" value = "<?php echo $sponsorship['sarea'];?>">
                </div>
              </div>
              <div class="col">
                <label>Last Reviewed On: </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                  </div>
                  <input type="text" value = "<?php echo $sponsorship['reviewdate'];?>"
                   class="form-control"  disabled>
                </div>
              </div>
            </div>


          <div class = "row">
            <div class = "col">
                <label>Date Start:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                  </div>
                  <input type="date" value = "<?php echo $sponsorship['sstartdate'];?>"
                   min="<?php echo date("Y-m-d");?>" name="sponsorship[sstartdate]" class="form-control"  required>
                </div>
              </div>
              <div class="col">
                <label>Date End:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                  </div>
                  <input type="date" value = "<?php echo $sponsorship['senddate'];?>"
                   min="<?php echo date("Y-m-d");?>" name="sponsorship[senddate]" class="form-control"  required>
                </div>
              </div>
            </div>


            <div class = "row">
              <div class = "col">
                <label>Extra Notes: </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                  </div>
                  <textarea type="text" name="sponsorship[snotes]" class="form-control staff-textarea"
                  required placeholder="Extra Notes" rows="7"><?php echo $sponsorship['snotes'];?></textarea>
                </div>
              </div>
              <div class="col">
                <label>Payment Details: </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-pound-sign"></i></span>
                  </div>
                  <textarea type="text" name="sponsorship[spaymentdetails]" class="form-control staff-textarea"
                  required placeholder="Details About Payment Method" rows="7"><?php echo $sponsorship['spaymentdetails'];?></textarea>
                </div>
              </div>
            </div>




            <div class = "row">
              <div class = "col">
                <label>Payment Recieved: </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hourglass"></i></span>
                  </div>
                  <select name="sponsorship[spaid]" class="form-control">
                    <option value="Yes" <?php if($sponsorship['spaid']=="Yes")echo 'selected';?>>Yes</option>
                    <option value="No" <?php if($sponsorship['spaid']=="No")echo 'selected';?>>No</option>
                  </select>
                </div>
              </div>
            </div>


                </div>

                <!-- /input-group -->
                <div class="card-footer">

                  <input class="btn btn-primary"
                  type="submit" value="Update"
                  name="submit" <?php if(!isset($sponsorship)){?> id="submission" <?php }?>>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                      <i class="fas fa-trash"></i> Delete
                    </button>

                </div>

              <!-- /.card-body -->
            </div>
  </form>
</div>



<?php echo $modal;?>
