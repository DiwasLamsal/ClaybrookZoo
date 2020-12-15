<?php echo $message;?>


<div class="row">
  <section class="col-lg-12 connectedSortable">
  <table id="listTable" class="table allTable table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Event Title</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Banner</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    <?php



    $count = 0;
      while($event = $events->fetch()){

        $viewIcon = '<a class="tbl-btn btn btn-primary btn-sm"
                        href = "/ZooAssignment/public/ManageEvents/all/'.$event['eid'].'">
                            <i class="fas fa-folder"></i> View
                        </a>';

        $imgCode = '<img class = "table-banner-image" src=/ZooAssignment/public/'.$event['ebanner'].' alt = "Banner Image">';

        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$event['etitle'].'</td>
                <td>'.$event['estartdate'].'</td>
                <td>'.$event['eenddate'].'</td>
                <td>'.$imgCode.'</td>
                <td>'.$viewIcon.'</td>
        ';
      }
    ?>
      </tbody>
    </table>
  </section>
</div>

<?php echo $dataTableCode;?>
