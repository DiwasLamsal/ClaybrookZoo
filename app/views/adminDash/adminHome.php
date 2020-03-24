  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-olive">
          <div class="inner">
            <h3><?php echo getCount('animals'); ?></h3>
            <p>Animals</p>
          </div>
          <div class="icon">
            <i class="fas fa-otter"></i>
          </div>
          <a href="./ManageAnimals/all" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-olive">
          <div class="inner">
            <h3>53</h3>

            <p>Visitors Today</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-olive">
          <div class="inner">
            <h3>20<sup style="font-size: 20px">%</sup></h3>

            <p>Animals on Watchlist</p>
          </div>
          <div class="icon">
            <i class="fas fa-eye"></i>
          </div>
          <a href="./ManageWatchlist/all" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-olive">
          <div class="inner">
            <h3><?php echo getCount('animals'); ?></h3>

            <p>Total Staff</p>
          </div>
          <div class="icon">
            <i class="fas fa-calendar-alt"></i>
          </div>
          <a href="./ManageUsers/all" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->



    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Visitors
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

  <!-- right col -->
  <section class="col-lg-5 connectedSortable">
    <!-- Calendar -->
    <div class="card bg-gradient-success">
      <div class="card-header border-0">

        <h3 class="card-title">
          <i class="far fa-calendar-alt"></i>
          Calendar
        </h3>
        <!-- tools card -->
        <div class="card-tools">
          <!-- button with a dropdown -->
          <div class="btn-group">
            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-bars"></i></button>
            <div class="dropdown-menu float-right" role="menu">
              <a href="#" class="dropdown-item">Add new event</a>
              <a href="#" class="dropdown-item">Clear events</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">View calendar</a>
            </div>
          </div>
          <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body pt-0">
        <!--The calendar -->
        <div id="calendar" style="width: 100%"></div>
      </div>
      <!-- /.card-body -->
    </div>
  </section>

    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
