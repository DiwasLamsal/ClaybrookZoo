
  <!-- Content Header (Page header) -->
  <div class="content-header" style="padding: 0px;">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6" style="padding: 0px;">
          <div class = "text-left heading-text">
					  <h2 class="text-green divided mb-5"><?php echo $bodyTitle;?></h2>
					</div>
        </div><!-- /.col -->
        <div class="col-sm-6" style="padding: 0px;">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/ZooAssignment/public/Home"><i class = "fas fa-home"></i> Home</a></li>

            <?php
            foreach ($breadcrumbContent as  $bcKey=>$bcVal) {
              if($bcVal!=end($breadcrumbContent))
                echo '<li class="breadcrumb-item"><a href="/ZooAssignment/public/'.$bcKey.'">'.$bcVal.'</a></li>';
              else
                echo '<li class="breadcrumb-item">'.$bcVal.'</a></li>';
            }
            ?>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
