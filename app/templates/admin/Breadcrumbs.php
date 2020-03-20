
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?php echo $bodyTitle;?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/ZooAssignment/public/UserHome">Home</a></li>

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
