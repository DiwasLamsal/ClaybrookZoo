

<div class="row">
  <section class="col-lg-12 connectedSortable">
  <table id="listTable" class="table table-striped table-bordered" style="width:100%">
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

        $viewIcon = '<a href = "/ZooAssignment/public/ManageUsers/browse/'.$user['uid'].'">
                          <i class="fas fa-eye"></i>
                        </a>';

        $archiveIcon = '<a href = "/ZooAssignment/public/ManageUsers/archive/'.$user['uid'].'">
                          <i class="fas fa-trash"></i>
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



<script src="/ZooAssignment/public/script/jquery-3.3.1.js"></script>
<script src="/ZooAssignment/public/script/jquery.dataTables.min.js"></script>
<script src="/ZooAssignment/public/script/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#listTable').DataTable({
      "scrollX": true
    });
    $('#listTable').css("max-width","100%;");
});
</script>
