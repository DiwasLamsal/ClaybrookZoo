<?php echo $message;?>


<div class="row">
  <section class="col-lg-12 connectedSortable">
  <table id="listTable" class="table allTable table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Area Name</th>
        <th>Area Key</th>
        <th>Area Description</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    <?php



    $count = 0;
      while($area = $areas->fetch()){

        $viewIcon = '<a class="btn btn-success btn-sm" href = "/ZooAssignment/public/ManageAreas/all/'.$area['aid'].'">
                            <i class="fas fa-folder"></i> View
                        </a>';


        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$area['atitle'].'</td>
                <td>'.$area['acode'].'</td>
                <td>'.$area['adescription'].'</td>
                <td>'.$viewIcon.'</td>
        ';
      }
    ?>
      </tbody>
    </table>
  </section>
</div>

<?php echo $dataTableCode;?>
