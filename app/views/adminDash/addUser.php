<?php

if(isset($user)){
  $user=$user->fetch();

?>

<!-- Code for edit user -->


<?php
}
?>

<form method="POST" class="userForm">

  <!-- Input addon -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Add User Form</h3>
                </div>
                <div class="card-body">

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="user[ufullname]" class="form-control"  required <?php if(isset($user))echo 'value='.$user['ufullname'];?> placeholder="Full Name">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                    </div>
                    <input type="text" name="user[uusername]" class="form-control"  required <?php if(isset($user))echo 'value='.$user['uusername'];?> placeholder="Username">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="user[email]" required <?php if(isset($user))echo 'value='.$user['email'];?> class="form-control" placeholder="Email">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" onkeyup="checkPassword()" name="user[upassword]" id="password" class="form-control"  required placeholder="Password">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" onkeyup="checkPassword()" name="confirmpassword" id="confirmpassword" required class="form-control" placeholder="Confirm Password">
                  </div>


                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user-md"></i></span>
                    </div>
                    <select name="user[utype]" class="form-control" id = "typeSelect">
                        <option value="Administrator" <?php if(isset($user) && $user['utype']=="Administrator")echo 'selected';?>>Administrator</option>
                        <option value="Moderator" <?php if(isset($user) && $user['utype']=="Moderator")echo 'selected';?>>Moderator
                        </option>
                        <option value="Zookeeper" <?php if(isset($user) && $user['utype']=="Zookeeper")echo 'selected';?>>Zookeeper
                        </option>
                    </select>
                  </div>


                  <!-- /input-group -->
                </div>

                                  <div class="card-footer">
                                    <input class="btn btn-primary" type="submit" value="Submit" name="submit" <?php if(!isset($user)){?> id="submission" <?php }?>>
                                  </div>
                <!-- /.card-body -->
              </div>



</form>
