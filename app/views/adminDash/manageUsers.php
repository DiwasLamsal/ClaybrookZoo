

<div class="row">
  <section class="col-lg-12 connectedSortable">
  <table id="listTable" class="table allTable table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Role</th>
        <th>Email</th>
        <th>Status</th>
        <th>View</th>
        <th>Disable</th>
      </tr>
    </thead>
    <tbody>
    <?php



    $count = 0;
      while($user = $users->fetch()){

        $viewIcon = '<a class="btn btn-success btn-sm" href = "/ZooAssignment/public/ManageUsers/all/'.$user['uid'].'">
                            <i class="fas fa-folder"></i> View
                        </a>';

        $archiveIcon = '<a class="btn btn-warning btn-sm" href = "/ZooAssignment/public/ManageUsers/archive/'.$user['uid'].'">
                          <i class="fas fa-trash"></i> Change Status
                        </a>';

        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$user['ufullname'].'</td>
                <td>'.$user['uusername'].'</td>
                <td>'.$user['utype'].'</td>
                <td>'.$user['email'].'</td>
                <td>'.$user['ustatus'].'</td>
                <td>'.$viewIcon.'</td>
                <td>'.$archiveIcon.'</td>
        ';

      }
    ?>
      </tbody>
    </table>
  </section>
</div>


<?php echo $dataTableCode;?>
