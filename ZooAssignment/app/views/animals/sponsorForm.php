<?php

if(isset($animal)){
  $image=getImagesByType($animal['aid'],'Cover')->fetch()['aifilename'];
?>


<div class="row">


    <div class = "col-md-12">
      <form method="POST" class="areaForm" enctype="multipart/form-data">

    <!-- Input addon -->
                <div class="card card-basic">
                  <div class="card-header">
                    <h3 class="card-title">Sponsorship Form</h3>
                  </div>
                  <div class="card-body">

                    <div class="col-md-6 text-center">
                        <img alt = "cover image" src = "/ZooAssignment/public/<?php echo $image;?>"
                        class="img-thumbnail" style="max-height: 150px; object-fit: contain;">
                    </div>

                    <div class="row">
                      <div class="col">
                        <label>Animal: </label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-kiwi-bird"></i></span>
                          </div>
                          <select name="animal" class="form-control" disabled>
                            <option value="<?php echo $animal['aid'];?>" selected><?php echo $animal['aname'];?></option>
                          </select>
                        </div>

                      </div>
                        <input type="hidden" name="sponsorship[sprice]" class="form-control" value="<?php echo getSponsorshipPrice($animal['alevel']);?>">
                      <div class="col">
                        <label>Sponsorship Level: </label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                          </div>
                          <select name="sponsorship[sprice]" class="form-control" disabled>
                            <option value = "<?php echo getSponsorshipPrice($animal['alevel']);?>"selected>
                              <?php echo $animal['alevel'];?> - £<?php echo getSponsorshipPrice($animal['alevel']);?>
                               Per Year
                             </option>
                          </select>
                        </div><br>

                      </div>
                    </div>


                      <div class="row">
                        <div class="col">
                          <label>Existing Customer: </label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-th"></i></span>
                            </div>
                            <select name="existing" class="form-control" id = "existing-select">
                              <option value="Yes">Yes</option>
                              <option value="No" selected>No</option>
                            </select>
                          </div><br>
                        </div>
                        <div class = "col" id = "comp-name-select">
                          <!-- Company name or select will go here according to previous selection -->
                        </div>
                      </div>


                      <div id = "show-existing"></div>

<hr><br>

                    <label>Signage Area Percentage(Ex: 1/8): </label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-compass"></i></span>
                      </div>
                      <input type="text" name="sponsorship[sarea]" class="form-control" placeholder="Sponsorship Area">
                    </div>



                <div class = "row">
                  <div class = "col">
                    <label>Extra Notes: </label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                      </div>
                      <textarea type="text" name="sponsorship[snotes]" class="form-control staff-textarea"
                      required placeholder="Extra Notes" rows="7"></textarea>
                    </div>
                  </div>
                  <div class="col">
                    <label>Payment Details: </label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pound-sign"></i></span>
                      </div>
                      <textarea type="text" name="sponsorship[spaymentdetails]" class="form-control staff-textarea"
                      required placeholder="Details About Payment Method" rows="7"></textarea>
                    </div>
                  </div>
                </div>

                <input type="hidden" name="sponsorship[ssigndate]" class="form-control"  value="<?php echo date("Y-m-d");?>">


                      <label>Year of Sponsorship:</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                        </div>

<?php
$newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y"))) . " + 1 year"));
$year = date("Y", strtotime($newEndingDate));
?>

                        <input type="number" value = "<?php echo $year;?>"
                         min="<?php echo $year;?>" max = "<?php echo ($year+10);?>" name="year" class="form-control"  required>
                      </div>

<p>
  <br>
  <ol style="border: 1px solid lightgrey; padding: 40px;">
    By signing the agreement, you are confirming the following to be true:-
  <li> I agree to sponsor the above named animal(s) for the period specified above.
  </li><li> I understand that the sponsorship fee is due in full by the 30th November 2010 and I will ensure that this fee is paid to Claybrook Zoo Ltd by this date.
  </li><li> I understand that all sponsorship fees are non-refundable.
  </li><li> I agree with the above signage layout/dimensions and understand these cannot be changed once the agreement has started.
</li></ol>
</p>



                  <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                          I Agree to these terms and conditions
                        </label>
                        <div class="invalid-feedback">
                          You must agree before submitting.
                        </div>
                      </div>
                    </div>



                    <!-- /input-group -->
                  </div>

                    <div class="card-footer">


                      <input class="btn btn-primary"
                      type="submit" value="Submit"
                      name="submit" >


                    </div>

                  <!-- /.card-body -->
                </div>
      </form>
    </div>





<!-- ###################################### IF NOT EXISTING (Hidden content) ###################################### -->
<div id = "hidden" class = "d-none">

  <div id = "company-select">
    <label>Company Name:</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-ruler-horizontal"></i></span>
      </div>
      <select name="sponsorship[ssid]" class="form-control" required>
        <?php
            while($sponsor = $sponsors->fetch()){
          ?>
            <option value="<?php echo $sponsor['sid'];?>">
                <?php echo $sponsor['scompany'];?>
            </option>
        <?php }?>
      </select>
      </select>
    </div>
  </div>

  <div id = "company-name">
    <label>Company Name:</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-ruler-horizontal"></i></span>
      </div>
      <input type="text" name="sponsor[scompany]" class="form-control"  required placeholder="Company Name">
    </div>
  </div>


    <div id = "existing-sponsor">
      <div class="row">
          <div class="col">
            <label>Primary Telephone:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="tel" name="sponsor[sptelephone]" class="form-control" required
              placeholder="Contact Number">
            </div>
          </div>
          <div class="col">
            <label>Secondary Telephone:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="tel" name="sponsor[sstelephone]" class="form-control"
               placeholder="Contact Number">
            </div><br>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label>Banner:</label>
            <div class="input-group">
                <input type="file"  name = "bannerImg" required
                  accept="image/*">
            </div><br>
           </div>
            <div class="col">
              <label>Website Link:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-globe"></i></span>
                </div>
                <input type="text" name="sponsor[swebsite]" class="form-control"
                 placeholder="Website">
              </div><br>
            </div>
          </div>

          <label>Email Address:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="text" name="sponsor[semail]" class="form-control"
             placeholder="Email">
          </div><br>

        <label>Address Details:</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-address-book"></i></span>
          </div>
          <textarea type="text" name="sponsor[saddress]" class="form-control sponsor-textarea"
          required rows="5"></textarea>
        </div><br>
    </div>
</div>










<?php } else {?>
  <h1> Error! The Page You Were Looking For Was Not Found. 😥
<?php } ?>



<script>
// Display Relevant form according to company
function formManipulate() {
  var e = document.getElementById("existing-select");
  var selected = e.options[e.selectedIndex].value;
  $("#show-existing").empty();
  $('#comp-name-select').empty();
  if(selected=="No"){
    $("#existing-sponsor").clone().appendTo("#show-existing");
    $("#company-name").clone().appendTo("#comp-name-select");
  }
  else{
    $("#company-select").clone().appendTo("#comp-name-select");
  }
};
formManipulate();

$("#existing-select").on('change',function(){
  formManipulate();
});
</script>
