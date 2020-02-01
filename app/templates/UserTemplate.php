<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<link rel="stylesheet" href="/ZooAssignment/public/css/bootstrap.min.css"/>
	<script src="/ZooAssignment/public/script/jquery.js"></script>
	<script src="/ZooAssignment/public/script/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/ZooAssignment/public/css/userStyle.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/ZooAssignment/public/css/font-awesome.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                 <li><a href="/ZooAssignment/public/">Home</a></li>
                 <li><a href="#">Animals</a></li>
                 <li><a href="#">Areas</a></li>
                 <li><a href="#">About</a></li>
                 <li><a href="#">Contact</a></li>
              </ul>
           </div>
        </nav>

				<h1 class = "header-text">Closed.</h1>
     </header>

	 		<section>
				<div class="content">
           <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
           </p>
           <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
           </p>
        </div>
	 		</section>



		<footer>
			Footer
			&copy; Claybrook Zoo <?php echo date("Y");?>
		</footer>

    </div>
	</main>

</body>
</html>
