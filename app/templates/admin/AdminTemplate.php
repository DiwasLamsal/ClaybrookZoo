<?php
// For navigation sidebar
$uri = $_SERVER['REQUEST_URI'];

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!isset($_SESSION['loggedin'])||!in_array($_SESSION['loggedin']['utype'], $role)){
	header("Location: /ZooAssignment/public/Logout");
}
$currentUser=$_SESSION['loggedin'];

?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="/ZooAssignment/public/css/adminStyle.css">
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
	<!-- Chart for doughnut -->
	<script src="/ZooAssignment/public/script/Chart.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/ZooAssignment/public/Dashboard" class="nav-link">Home</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Profile</a>
      </li> -->
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-sm-inline-block">
        <a href="/ZooAssignment/public/Logout" class="mr-3 text-secondary">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/ZooAssignment/public/Dashboard" class="brand-link text-left">
      <img src="/ZooAssignment/public/resources/images/logo.jpg" alt="Claybrook Zoo Heading"
      class="brand-image img-circle elevation-3"
           style="opacity: .8; margin-left: 20px;">
      <span class="brand-text font-weight-bold">Claybrook Zoo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/ZooAssignment/public/resources/images/extras/avatar5.png"
               class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a><?php echo $currentUser['ufullname']; ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



<?php if($currentUser['utype']=="Administrator"){ ?>
<!-- Staff Navigation Area -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Staff
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageUsers/all" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>View Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageUsers/add" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add Staff</p>
                </a>
              </li>
              <hr>
            </ul>
          </li>
<!-- End of Staff Navigation Area -->
<?php } ?>
<?php if(in_array($currentUser['utype'],['Administrator','Moderator'])){ //Show only if admin or moderator ?>

<!-- Areas Navigation Area -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-compass"></i>
              <p>
                Areas
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/ZooAssignment/public/ManageAreas/all" class="nav-link">
                <i class="fas fa-binoculars nav-icon"></i>
                <p>View Areas</p>
              </a>
            </li>
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageAreas/add" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Add Area</p>
                </a>
              </li>
              <hr>
            </ul>
          </li>
<!-- End of Areas Navigation Area -->

<!-- Locations Navigation Area -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marked"></i>
              <p>
                Locations
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/ZooAssignment/public/ManageLocations/all" class="nav-link">
                <i class="fas fa-binoculars nav-icon"></i>
                <p>View Locations</p>
              </a>
            </li>
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageLocations/add" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Add Location</p>
                </a>
              </li>
              <hr>
            </ul>
          </li>
<!-- End of Locations Navigation Area -->

<!-- Animals Navigation Area -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hippo"></i>
              <p>
                Animals
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageAnimals/all" class="nav-link">
                  <i class="fas fa-binoculars nav-icon"></i>
                  <p>View Animals</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageAnimals/add" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Add Animal</p>
                </a>
              </li>
						<?php if($currentUser['utype']=="Administrator"){ //Show only if admin ?>
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageAnimals/trash" class="nav-link">
                  <i class="fas fa-trash nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li>
						<?php } ?>
              <hr>
            </ul>
          </li>
<!-- End of Animals Navigation Area -->


<!-- Sponsors Navigation Area -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Sponsorships
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageSponsorships/sponsors" class="nav-link">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Sponsors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageSponsorships/active" class="nav-link">
                  <i class="fas fa-check-square nav-icon"></i>
                  <p>Active Sponsorhips</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageSponsorships/pending" class="nav-link">
                  <i class="fas fa-hourglass-start nav-icon"></i>
                  <p>Pending Sponsorships</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageSponsorships/expired" class="nav-link">
                  <i class="fas fa-exclamation-triangle nav-icon"></i>
                  <p>Expired Sponsorships</p>
                </a>
              </li>
              <hr>
            </ul>
          </li>
<!-- End of Sponsors Navigation Area -->

<?php } ?>

<!-- Watchlist Navigation Area -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Watchlist
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ZooAssignment/public/ManageWatchlist/all" class="nav-link">
                  <i class="fas fa-binoculars nav-icon"></i>
                  <p>View Watchlist</p>
                </a>
              </li>
              <hr>
            </ul>
          </li>
<!-- End of Watchlist Navigation Area -->
<?php if(in_array($currentUser['utype'],['Administrator','Moderator'])){ //Show only if admin or moderator ?>


	<!-- Events Navigation Area -->
	          <li class="nav-item has-treeview">
	            <a href="#" class="nav-link">
	              <i class="nav-icon fas fa-calendar-alt"></i>
	              <p>
	                Events
	                <i class="fas fa-angle-left right"></i>
	                <!-- <span class="badge badge-info right">6</span> -->
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
	              <li class="nav-item">
	                <a href="/ZooAssignment/public/ManageEvents/all" class="nav-link">
	                  <i class="fas fa-binoculars nav-icon"></i>
	                  <p>View Events</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="/ZooAssignment/public/ManageEvents/add" class="nav-link">
	                  <i class="fas fa-calendar-plus nav-icon"></i>
	                  <p>Add Event</p>
	                </a>
	              </li>
	              <hr>
	            </ul>
	          </li>
	<!-- End of Events Navigation Area -->

<!-- Tickets Navigation Area -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Tickets
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
              <hr>
            </ul>
          </li>
<!-- End of Tickets Navigation Area -->

<!-- Vacancies Navigation Area -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Vacancies
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
              <hr>
            </ul>
          </li>
<!-- End of Vacancies Navigation Area -->
<?php } ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <section class="content">

<?php echo $breadcrumb;?>
<?php echo $content;?>

        </section>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

      <!-- Anything you want -->

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y");?> <a target ="_blank" href="/ZooAssignment/public/">Claybrook Zoo</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- Bootstrap 4 -->
<script src="/ZooAssignment/public/script/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/ZooAssignment/public/script/dist/js/adminlte.min.js"></script>

<script>
var uri = window.location.pathname;
$(".nav-link").each(function(index) {
  if(uri.includes($(this).attr('href'))){
    $(this).addClass("active");
    $(this).parent().parent().parent().addClass("menu-open");
    $(this).parent().parent().parent().children("a").addClass("active");
  }
});

//-------------------------------------------------------------------------------------//

</script>

</body>
</html>
