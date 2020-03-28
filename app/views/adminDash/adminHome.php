  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-info">
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
        <div class="small-box bg-gradient-info">
          <div class="inner">
            <h3>0</h3>

            <p>Upcoming Events</p>
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
        <div class="small-box bg-gradient-info">
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
        <div class="small-box bg-gradient-info">
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
          <div class="card-header bg-gradient-info ">
            <h3 class="card-title">
              <i class="fas fa-calendar mr-2"></i>
              Events
            </h3>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart"
                   style="position: relative; height: 300px;">
                  <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
               </div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
              </div>
            </div>
          </div><!-- /.card-body -->
        </div>
      </section>

    <section class="col-lg-5 connectedSortable mb-3">
      <div class="card card h-100">
        <div class="card-header bg-gradient-info ">
          <h3 class="card-title"><i class="fas fa-chart-pie mr-2"></i>Animal Health Condition</h3>
        </div>
        <div class="card-body">
          <canvas id="donutChart" style="min-height: 280px; height: 280px; max-height: 280px; max-width: 100%; ">
          </canvas>
        </div>
        <!-- /.card-body -->
      </div>
    </section>

    <!-- /.row (main row) -->
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
