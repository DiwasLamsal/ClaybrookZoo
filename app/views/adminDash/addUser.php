<?php

if(isset($user)){
  $user=$user->fetch();

?>

<!-- Code for edit user -->

<div class="row">
    <div class="col-md-4 mb-3">
      <!-- Widget: user widget style 2 -->
      <div class="card card-widget widget-user-2 h-100">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-gradient-warning">
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="/ZooAssignment/public/resources/images/extras/avatar5.png" alt="User Avatar">
          </div>
          <!-- /.widget-user-image -->
          <h3 class="widget-user-username"><b>&nbsp;<?php echo $user['ufullname'];?></b></h3>
        </div>
        <div class="card-footer p-0 h-100">
          <ul class="nav flex-column">
            <li class="nav-item">

            </li>
            <li class="nav-item">
              <span class="nav-link">
                <b>User ID </b><span class="float-right"><?php echo $user['uid'];?></span>
              </span>
            </li>
            <li class="nav-item">
              <span class="nav-link">
                <b>Email </b><span class="float-right"><?php echo $user['email'];?></span>
              </span>
            </li>
            <li class="nav-item">
              <span class="nav-link">
                <b>Type </b><span class="float-right"><?php echo $user['utype'];?></span>
              </span>
            </li>
            <li class="nav-item">
              <span class="nav-link">
                <b>Status </b><span class="float-right"><?php echo $user['ustatus'];?></span>
              </span>
            </li>
            <li class="nav-item">
              <span class="nav-link">
                <b>Delete </b><span class="float-right">
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                    <i class="fas fa-trash"></i>
                  </button>
                </span>
              </span>
            </li>
          </ul>
        </div>
        <div class="card-footer">
          <br>
        </div>
      </div>
      <!-- /.widget-user -->
    </div>
    <!-- /.col -->

<?php echo $modal;?>

<?php
  }
?>

    <div class = "col-md-<?php echo isset($user)?'8':'12';?> mb-3">
      <form method="POST" class="userForm h-100" >

<!-- Input addon -->
        <div class="card h-100">
          <div class="card-header  bg-gradient-info">
            <h3 class="card-title">User Form</h3>
          </div>
          <div class="card-body">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="user[ufullname]" class="form-control"  required <?php if(isset($user))echo 'value="'.$user['ufullname'].'"';?> placeholder="Full Name">
            </div>

            <!-- <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
              </div>
              <input type="text" name="user[uusername]" class="form-control"  required <?php if(isset($user))echo 'value="'.$user['uusername'].'"';?> placeholder="Username">
            </div> -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" name="user[email]" required <?php if(isset($user))echo 'value="'.$user['email'].'"';?> class="form-control" placeholder="Email">
            </div>
<?php if(!isset($user)){?>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" onkeyup="checkPassword()" name="user[upassword]" id="password" class="form-control"  required placeholder="Password">
            </div>
            <p id="passtest" style="font-size: 15px; color: red; margin-bottom: 20px;">Passwords must contain more than
                8 characters</p>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" onkeyup="checkPassword()" name="confirmpassword" id="confirmpassword" required class="form-control" placeholder="Confirm Password">
            </div>
            <p id="confirmpasstest" style="font-size: 14px; color: red; margin-bottom: 10px;">Passwords must match</p>

<?php } ?>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user-md"></i></span>
              </div>
              <select name="user[utype]" class="form-control" id = "typeSelect" <?php if(isset($user) && $user['utype']=="Administrator" && checkLastAdministrator())echo 'disabled';?>>
                  <option value="Administrator" <?php if(isset($user) && $user['utype']=="Administrator")echo 'selected';?>>Administrator</option>
                  <option value="Moderator" <?php if(isset($user) && $user['utype']=="Moderator")echo 'selected';?>>Moderator
                  </option>
                  <option value="Zookeeper" <?php if(isset($user) && $user['utype']=="Zookeeper")echo 'selected';?>>Zookeeper
                  </option>
              </select>
            </div>

            <?php if(isset($user) && $user['utype']=="Administrator" && checkLastAdministrator()){?><br>
              <b>Note:</b> There needs to be at least one active administrator in the system.
            <?php } ?>

            <!-- /input-group -->
          </div>

            <div class="card-footer">
              <input class="btn btn-primary"
              type="submit" value="<?php echo isset($user)?'Update':'Submit';?>"
              name="submit" <?php if(!isset($user)){?> id="submission" <?php }?>>
            </div>
          <!-- /.card-body -->
        </div>
      </form>
    </div>
<?php if(isset($user)){ ?>
</div>

<div class="row">
  <div class="col-md-12">
    <form method="POST" class="userForm" >
    <div class="card">
            <div class="card-header bg-gradient-info">
              <h3 class="card-title">Update Password</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" onkeyup="checkPassword()" name="user[upassword]" id="password" class="form-control"  required placeholder="Password">
              </div>
              <p id="passtest" style="font-size: 15px; color: red; margin-bottom: 20px;">Passwords must contain more than
                  8 characters</p>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" onkeyup="checkPassword()" name="confirmpassword" id="confirmpassword" required class="form-control" placeholder="Confirm Password">
              </div>
              <p id="confirmpasstest" style="font-size: 14px; color: red; margin-bottom: 10px;">Passwords must match</p>

            </div>
            <div class="card-footer">
              <input class="btn btn-primary" type="submit" value="Update Password"  id="submission" name="submitPassword">
            </div>
            <!-- /.card-body -->
          </div>

        </form>
  </div>
</div>
<?php } ?>


<script>

function checkPassword(){
  var pass = document.getElementById('password');
  var passChecker = document.getElementById('passtest');
  var submit = document.getElementById('submission');
  var confirmPass = document.getElementById('confirmpassword');
  var confirmPassChecker = document.getElementById('confirmpasstest');

  submit.disabled = true;
  if(pass.value != confirmPass.value){
    confirmPassChecker.style.color = "red";
    confirmPassChecker.innerHTML = "Passwords do not match.";
    submit.disabled = true;
  }

  if(pass.value.length<9){
    passtest.style.color = "red";
    passtest.innerHTML = "Password too short.";
  }
  else if(pass.value.length > 8 && pass.value.length < 17){
    passtest.style.color = "green";
    passtest.innerHTML = "Valid password!";
  }

  if(pass.value == confirmPass.value){
    confirmPassChecker.style.color = "green";
    confirmPassChecker.innerHTML = "Passwords Match!";
  }

  if(confirmPass.value == " " || confirmPass.value == "" || pass.value ==""){
    submit.disabled = true;
  }

  if(passtest.style.color == "green" && confirmPassChecker.style.color == "green"){
    submit.disabled = false;
  }
}

</script>
