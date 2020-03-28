<?php
  $animal = getAnimalById($watchlist['waid'])->fetch();
  $animalLink = "<a href = '/ZooAssignment/public/Animals/browse/$animal[aid]' target='_blank'>$animal[aname]</a>";
?>


<div class="col-md-12 mb-3">
  <div class="card h-100">
    <div class="card-header bg-gradient-info">
      <h3 class="card-title">Animal Watchlist Info</h3>
    </div>
    <div class="card-body">

      <div class="row">
         <div class="col-md-3">
           <b>Animal: </b>
         </div>
         <div class="col">-
           <?php echo $animalLink;?>
         </div>
       </div><br>

       <div class="row">
          <div class="col-md-3">
            <b>Condition/Disease: </b>
          </div>
          <div class="col">-
            <?php echo $watchlist['wcondition'];?>
          </div>
        </div><br>


         <div class="row">
            <div class="col-md-3">
              <b>Seriousness Level: </b>
            </div>
            <div class="col">-
              <?php echo $watchlist['wlevel'];?>
            </div>
          </div><br>

          <div class="row">
             <div class="col-md-3">
               <b>Date Recorded: </b>
             </div>
             <div class="col">-
               <?php echo $watchlist['wrecorddate'];?>
             </div>
           </div><br>

           <div class="row">
              <div class="col-md-3">
                <b>Date Ended: </b>
              </div>
              <div class="col">-
                <?php echo $watchlist['wenddate']=="0000-00-00"?"Not ended yet.":$watchlist['wenddate'];?>
              </div>
            </div><br>

            <div class="row">
               <div class="col-md-3">
                 <b>Other Details: </b>
               </div>
               <div class="col">-
                 <?php echo $watchlist['wdetails'];?>
               </div>
             </div>


    </div>
  </div>
</div>

<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
 if(in_array($_SESSION['loggedin']['utype'],['Administrator','Moderator'])){ //Show only if admin or moderator ?>


      <div class="col-md-12 mb-3">
        <div class="card h-100">
          <div class="card-header bg-gradient-info">
            <h3 class="card-title">Edit Watchlist</h3>
          </div>
          <div class="card-body">
            <form method="POST" class="animalForm">

              <label>Condition: (Ex: Avian influenza)</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-biohazard"></i></span>
                </div>
                <input type="text" name="watchlist[wcondition]" class="form-control" placeholder="Animal Condition"
                value="<?php if(isset($watchlist)) echo $watchlist['wcondition'];?>">
              </div>

              <div class = "row">
                <div class = "col">
                  <label>Date Ended: </label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                    </div>
                    <input type="date" name="watchlist[wenddate]"
                    class="form-control" placeholder="Animal Name"
                    value="<?php if(isset($watchlist)) echo $watchlist['wenddate'];?>">
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
                type="submit" value="Update Watchlist"
                name="watchlistSubmit">

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                  <i class="fas fa-trash"></i> Delete
                </button>

              </div>
          </div>
        </form>
      </div>
    <?php echo $modal;?>


<?php } ?>
