<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Head -->
  <head>
    <title>Login To University Portal</title>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="/ZooAssignment/public/css/fontawesome-free/css/all.min.css">
  	<link href="/ZooAssignment/public/css/dataTables.bootstrap4.min.css" rel ="stylesheet">
  	<link rel="icon" href="/ZooAssignment/public/resources/images/favicon.ico" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="/ZooAssignment/public/css/dist/css/adminlte.min.css">
  	<script src="/ZooAssignment/public/script/jquery.min.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "/ZooAssignment/public/css/loginStyle.css">
  </head>
<!-- End of head -->
<!-- Body -->
  <body>
        <div class="row w-100 form-holder p-0">
          <div class = "col-md-4 h-100 text-center">
            <form method="POST" class="loginForm h-100">
            <!-- Input addon -->
                <a href = "/ZooAssignment/public/Home">
                  <img class="mb-5" src = "/ZooAssignment/public/resources/images/logo.jpg" width="100">
                </a>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                    </div>
                    <input class="form-control" type = "text" name = "id" placeholder="Login ID" required>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input class="form-control" type = "password" name = "password" placeholder="Password" required>
                  </div>
                  <p id = "loginValidationText" class = "mb-2" style="font-size: 15px; color: red;">
                    <?php echo $loginText;?>
                    <br>
                  </p>

                  <input class="btn btn-success btn-lg btn-block" type = "submit" name = "submit" value="Submit">
                  <br><a href = "#">Forgot your password?</a>


                <!-- /.card-body -->
            </form>
          </div>
          <div class = "col-md-8"></div>

        </div>

	<script src="/ZooAssignment/public/script/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<!-- End of body -->
</html>
