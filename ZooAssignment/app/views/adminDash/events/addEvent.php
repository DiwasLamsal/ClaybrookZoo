<?php

if(isset($event)){
  $event=$event->fetch();

?>

<!-- Code for edit area -->

<div class="row">

<?php
  }
?>

    <div class = "col-md-12">
      <form method="POST" class="eventForm" enctype="multipart/form-data">

    <!-- Input addon -->
                <div class="card card">
                  <div class="card-header  bg-gradient-info">
                    <h3 class="card-title">Event Form</h3>
                  </div>
                  <div class="card-body">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      </div>
                      <input type="text" name="event[etitle]" class="form-control"  required <?php if(isset($event))echo 'value="'.$event['etitle'].'"';?> placeholder="Event Title">
                    </div>


                    <div class="row">
                        <div class="col">
                          <label>Start Date:</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                            </div>
                            <input type="date" name="event[estartdate]" class="form-control"  required <?php if(isset($event))echo 'value="'.$event['estartdate'].'"';?> placeholder="Date Event Starts">
                          </div>
                        </div>
                        <div class="col">
                          <label>End Date:</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                            </div>
                            <input type="date" name="event[eenddate]" class="form-control"  required <?php if(isset($event))echo 'value="'.$event['eenddate'].'"';?> placeholder="Date Event Ends">
                          </div>
                        </div>
                      </div>

          <?php if(!isset($event)){ ?>
                    <label>Event Banner Image:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-upload"></i></span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                          aria-describedby="inputGroupFileAddon01" name = "eventImg"  required
                          accept="image/*">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    </div><br>
          <?php }?>

                    <label>Event Description:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                      </div>
                      <textarea type="text" name="event[edescription]" class="form-control staff-textarea"
                      required placeholder="Event Description" rows="7"><?php if(isset($event))echo $event['edescription'];?></textarea>
                    </div>

                    <label>Ticket and Cost Information:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                      </div>
                      <textarea type="text" name="event[eticket]" class="form-control staff-textarea"
                      required placeholder="Event Ticket Information" rows="7"><?php if(isset($event))echo $event['eticket'];?></textarea>
                    </div>

                    <!-- /input-group -->
                  </div>

                    <div class="card-footer">


                      <input class="btn btn-primary"
                      type="submit" value="<?php echo isset($event)?'Update':'Submit';?>"
                      name="submit" <?php if(!isset($event)){?> id="submission" <?php }?>>

                      <?php if(isset($event)){ ?>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                          <i class="fas fa-trash"></i> Delete
                        </button>

                      <?php } ?>

                    </div>
                  <!-- /.card-body -->
                </div>
      </form>
    </div>


  <?php if(isset($event)){ ?>

    <div class = "col-md-12">
      <form method="POST" class="eventForm" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header bg-gradient-info">
            <h3 class="card-title">Event Banner</h3>
          </div>
          <div class="card-body">
            <div class = "row">
              <div class = "col ">
                <div class="input-group">
                    <input type="file"  name = "eventImg" required
                      accept="image/*">
                </div><br>
              </div>
              <div class = "col">
                <?php
                  $imgCode = '<img class = "form-banner-image" src=/ZooAssignment/public/'.$event['ebanner'].' alt = "Banner Image">';
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
</div>
<?php } ?>


<script>

// Ionică Bizău - https://stackoverflow.com/questions/48613992/bootstrap-4-file-input-doesnt-show-the-file-name
// Change file name on upload
  $('#inputGroupFile01').on('change',function(){
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

</script>
