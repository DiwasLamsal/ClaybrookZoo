  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-gray">
          <div class="inner">
            <h3><?php echo getCount('animals'); ?></h3>
            <p>Animals</p>
          </div>
          <div class="icon">
            <i class="fas fa-otter"></i>
          </div>
          <!-- <a href="./ManageAnimals/all" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-gray">
          <div class="inner">
            <h3><?php echo getCount('events');?></h3>

            <p>Events</p>
          </div>
          <div class="icon">
            <i class="fas fa-calendar"></i>
          </div>
          <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-gray">
          <div class="inner">
            <h3><?php echo getCount('watchlists');?><sup style="font-size: 20px"></sup></h3>

            <p>Animals on Watchlist</p>
          </div>
          <div class="icon">
            <i class="fas fa-eye"></i>
          </div>
          <!-- <a href="./ManageWatchlist/all" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-gray">
          <div class="inner">
            <h3><?php echo getCount('users'); ?></h3>

            <p>Total Staff</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <!-- <a href="./ManageUsers/all" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->



  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable mb-3">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="card h-100">
        <div class="card-header bg-gradient-gray ">
          <h3 class="card-title">
            <i class="fas fa-video mr-2"></i>
            Claybrook Zoo
          </h3>
        </div><!-- /.card-header -->
        <div class="card-body p-0">

        <iframe style="width:100%; height: 100%;" src="https://www.youtube.com/embed/F5UPc8dya-M" frameborder="0"
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
          Zoo Video
        </iframe>


        </div><!-- /.card-body -->
      </div>
    </section>

    <section class="col-lg-5 connectedSortable mb-3">
      <div class="card card h-100">
        <div class="card-header bg-gradient-gray ">
          <h3 class="card-title"><i class="fas fa-chart-pie mr-2"></i>Animal Health Condition</h3>
        </div>
        <div class="card-body">
          <canvas id="donutChart" style="min-height: 280px; height: 280px; max-height: 280px; max-width: 100%; ">
          </canvas>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
  </div>
    <!-- /.row (main row) -->


<div class = "row">

  <div class="col-lg-5 mb-3">

<?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $loggedin=$_SESSION['loggedin'];
    if($loggedin['utype']!='Zookeeper'){
?>

      <div class="card card-widget widget-user h-100">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-gradient-gray">
            <h3 class="widget-user-username"><?php echo $loggedin['ufullname'];?></h3>
            <h5 class="widget-user-desc"><?php echo $loggedin['utype'];?></h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="/ZooAssignment/public/resources/images/extras/avatar5.png" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-12">
                <div class="description-block">
                  <span class="description-text">Email</span>
                  <h5 class="description-header"><?php echo $loggedin['email'];?></h5>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
    </div>

  <section class="col-lg-7 connectedSortable">
    <form method="POST" enctype="multipart/form-data">
    <div class="card h-100">
      <div class="card-header bg-gradient-gray ">
        <h3 class="card-title"><i class="fas fa-image mr-2"></i>Change Header Image</h3>
      </div>
      <div class="card-body">
        <div class = "row">
          <div class = "col mb-3 text-center">
            <img style="max-width: 95%;" class = "form-banner-image" src="/ZooAssignment/public/resources/images/header/header.jpg."
                  alt = "Header Image">
          </div>
          <div class = "col form-inline">
            <div class="input-group">
                <input type="file" name="headerImg" required accept="image/*">
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <input class="btn btn-primary"
        type="submit" value="Submit"
        name="submitHeader" >
      </div>

      <!-- /.card-body -->
    </div>
  </form>
  </section>

</div>

<?php } ?>

</div><!-- /.container-fluid -->

<script>

    //-------------
    //- DONUT CHART - AdminLTE donut chart
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Critical',
          'Severe',
          'Substantial',
          'Moderate',
          'Low',
          'Healthy',

      ],
      datasets: [
        {//Get healthy and sick animals
          data: [<?php echo getWatchListCount('Critical');?>,
                 <?php echo getWatchListCount('Severe');?>,
                 <?php echo getWatchListCount('Substantial');?>,
                 <?php echo getWatchListCount('Moderate');?>,
                 <?php echo getWatchListCount('Low');?>,
                 <?php echo getCount('animals')-getCount('watchlists');?>
              ],
          backgroundColor : ['#DC143CA1','#F0E68CA1','#66CDAAA1','#32CD32A1','#00a65aA1','#008000A1'],
        }
      ]

    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

</script>
