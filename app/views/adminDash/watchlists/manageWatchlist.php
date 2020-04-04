<?php echo $message;?>


<div class="row">
  <section class="col-lg-12 connectedSortable">
  <table id="listTable" class="table allTable table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Animal</th>
        <th>Condition</th>
        <th>Level</th>
        <th>Record Date</th>
        <th>End Date</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    <?php



    $count = 0;
      while($watchlist = $watchlists->fetch()){

        $animal = getAnimalById($watchlist['waid'])->fetch();

        $animalLink = "<a href = '/ZooAssignment/public/Animals/browse/$animal[aid]' target='_blank'>$animal[aname]</a>";

        $viewIcon = '<a class="tbl-btn btn btn-primary btn-sm"
                        href = "/ZooAssignment/public/ManageWatchlist/all/'.$watchlist['wid'].'">
                            <i class="fas fa-folder"></i> View
                        </a>';

        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$animalLink.'</td>
                <td>'.$watchlist['wcondition'].'</td>
                <td>'.$watchlist['wlevel'].'</td>
                <td>'.$watchlist['wrecorddate'].'</td>
                <td>'.$watchlist['wenddate'].'</td>
                <td>'.$viewIcon.'</td>
        ';
      }
    ?>
      </tbody>
    </table>
  </section>
</div>

<?php echo $dataTableCode;?>
