<?php echo $message;?>


<div class="row">
  <section class="col-lg-12 connectedSortable">
  <table id="listTable" class="table allTable table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Code</th>
        <th>Area</th>
        <th>Dimensions</th>
        <th>Feeding Time</th>
        <th>Food</th>
        <th>Capacity</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    <?php



    $count = 0;
      while($location = $locations->fetch()){

        $viewIcon = '<a class="btn btn-success btn-sm" href = "/ZooAssignment/public/ManageLocations/all/'.$location['lid'].'">
                            <i class="fas fa-folder"></i> View
                        </a>';


        $area=getAreaById($location['larea'])->fetch();
        $areaLink = '<a href = "/ZooAssignment/public/ManageAreas/all/'.$location['larea'].'" target="_blank">
                        '.$area['atitle'].'
                    </a>';

        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$location['lcode'].'</td>
                <td>'.$areaLink.'</td>
                <td>'.$location['ldimensions'].'</td>
                <td>'.$location['lfeedingtime'].'</td>
                <td>'.$location['lfood'].'</td>
                <td>'.$location['lsize'].'</td>
                <td>'.$viewIcon.'</td>
        ';
      }
    ?>
      </tbody>
    </table>
  </section>
</div>

<?php echo $dataTableCode;?>
