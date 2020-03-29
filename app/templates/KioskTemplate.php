<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/ZooAssignment/public/css/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="/ZooAssignment/public/css/dist/css/adminlte.min.css">
	<link href="/ZooAssignment/public/css/fa-admin-lte-admin.css" rel="stylesheet">
  <link href="/ZooAssignment/public/css/kioskStyle.css" rel="stylesheet">
	<link rel="icon" href="/ZooAssignment/public/resources/images/favicon.ico" type="image/gif" sizes="16x16">
	<script src="/ZooAssignment/public/script/jquery.min.js"></script>
</head>

<body>



<div class = "row">


  <div class = "nav col-md-3 pt-4 pl-4 pb-4 pr-2">
<!-- Nav -->

<div class="card w-100 h-100 nav-card text-center">
  <div class="card-body transparent-card-body">
      <a href="/ZooAssignment/public/Kiosk/"
      class="btn btn-lg bg-gradient-olive w-100 p-3"><i class = "fas fa-home mr-2"></i> Home</a>
      <br><br>

      <a href="/ZooAssignment/public/Kiosk/allAnimals/"
      class="btn btn-lg bg-gradient-olive w-100 p-3"><i class = "fas fa-otter mr-2"></i> Animals</a>
      <br><br>

      <a href="#"
      class="btn btn-lg bg-gradient-olive w-100 p-3"><i class = "fas fa-utensils mr-2"></i> Food</a>
  </div>
</div>

<img id="monkeyImg" src = "/ZooAssignment/public/resources/images/kiosk/baboon.png">
<img id="foxImg" src = "/ZooAssignment/public/resources/images/kiosk/foxImg.png">
<img id="leoImg" src = "/ZooAssignment/public/resources/images/kiosk/leo.png">
<img id="chimpImg" src = "/ZooAssignment/public/resources/images/kiosk/chimp.png">


  </div>
  <div class = "col-md-9 pt-4 pl-2 pb-4 pr-4 body-container">
<!-- Main Body -->
  <div class="card w-100 h-100 body-card">
    <div class="card-body body-card-body p-0">
      <?php echo $content;?>
    </div>
  </div>


  </div>
</div>


	<script src="/ZooAssignment/public/script/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/ZooAssignment/public/script/dist/js/adminlte.min.js"></script>
</body>
</html>
