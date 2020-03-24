<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="/ZooAssignment/public/css/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/ZooAssignment/public/css/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="/ZooAssignment/public/css/fa-admin-lte-admin.css" rel="stylesheet">
	<!-- Bootstrap Data Table -->
	<link href="/ZooAssignment/public/css/dataTables.bootstrap4.min.css" rel ="stylesheet">
	<link rel="icon" href="/ZooAssignment/public/resources/images/favicon.ico" type="image/gif" sizes="16x16">
	<!-- jQuery -->
	<script src="/ZooAssignment/public/script/jquery.min.js"></script>
	<link rel="stylesheet" href="/ZooAssignment/public/css/userStyle.css"/>
	<script src = "/ZooAssignment/public/script/script.js"></script>
</head>

<body>
	<!--################### -LOADER SECTION- #################-->
	<!--################### -MUST NOT BE EDITED- #################-->
	  <div class="load">
	  	<div class = "loader">
		  	<div class ="firstBar bar"></div>
		  	<div class ="secondBar bar"></div>
		  	<div class ="thirdBar bar"></div>
		  	<div class ="fourthBar bar"></div>
		  	<div class ="fifthBar bar"></div>
		  	<div class ="sixthBar bar"></div>
		  	<div class ="seventhBar bar"></div>
		  	<div class ="eighthBar bar"></div>
	  	</div>
	  </div>



	<main>

		<div class="wrapper">
     <header>
        <nav>
           <div class="menu-icon">
              <i class="fa fa-bars fa-2x"></i>
           </div>
           <div class="logo">
					 	<a href = "/ZooAssignment/public/">
							<img id = "nav-logo" src = "/ZooAssignment/public/resources/images/logo.jpg" alt = "logo">
							<span id = "nav-logo-text">&nbsp; Claybrook Zoo</span>
						</a>
           </div>
           <div class="menu">
              <ul>
                 <li>
									 <a class = "nav-link <?php if($selected=="Home")echo'active';?>" href="/ZooAssignment/public/">
										 <i class="fas fa-home nav-icon"></i> &nbsp;Home
									 </a>
								 </li>
                 <li>
									 <a class = "nav-link <?php if($selected=="Animals")echo'active';?>" href="/ZooAssignment/public/Animals">
										 <i class="fas fa-horse nav-icon"></i> &nbsp;Animals
									 </a>
								 </li>
                 <li>
									 <a class = "nav-link <?php if($selected=="Areas")echo'active';?>" href="/ZooAssignment/public/Areas">
										 <i class="nav-icon fas fa-compass"></i> &nbsp;Areas
									 </a>
								 </li>
                 <li>
									 <a class = "nav-link <?php if($selected=="Contact")echo'active';?>" href="/ZooAssignment/public/Contact">
										 <i class="nav-icon fas fa-address-book"></i> &nbsp;Contact
									 </a>
								 </li>
								 <li>
									 <a class = "nav-link <?php if($selected=="Kids")echo'active';?>" href="/ZooAssignment/public/Kids">
										 <i class="nav-icon fas fa-gamepad"></i> &nbsp;Kids
									 </a>
								 </li>
								 <li>
									 <a class = "nav-link <?php if($selected=="Vacancies")echo'active';?>" href="/ZooAssignment/public/Vacancies">
										 <i class="nav-icon fas fa-user-md"></i> &nbsp;Vacancies
									 </a>
								 </li>
              </ul>
           </div>
        </nav>

				<h1 class = "header-text">Open.</h1>
     </header>


	 		<section class = "main-content-section">
				<div class="content">

					<div class = "text-center heading-text">
					  <h2 class="text-green divided mb-5"><?php echo $heading;?></h2>
					</div>


					<!-- Content body goes here -->
           <?php echo $content;?>
        </div>
	 		</section>

		<footer>
			&copy; Claybrook Zoo <?php echo date("Y");?>
			&nbsp; | &nbsp; <a href="#">Login to Dashboard</a>
		</footer>

    </div>
	</main>

	<!-- Bootstrap 4 -->
	<script src="/ZooAssignment/public/script/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="/ZooAssignment/public/script/dist/js/adminlte.min.js"></script>
</body>
</html>
