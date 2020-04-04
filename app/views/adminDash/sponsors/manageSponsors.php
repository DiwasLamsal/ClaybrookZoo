<?php echo $message;?>


<div class="row">
  <section class="col-lg-12 connectedSortable">
  <table id="listTable" class="table allTable table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Company</th>
        <th>Primary Telephone</th>
        <th>Address</th>
        <th>Website</th>
        <th>Banner</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    <?php



    $count = 0;
      while($sponsor = $sponsors->fetch()){

        $viewIcon = '<a class="tbl-btn btn btn-primary btn-sm"
                        href = "/ZooAssignment/public/ManageSponsorships/sponsors/'.$sponsor['sid'].'">
                            <i class="fas fa-folder"></i> View
                        </a>';

        $imgCode = '<img class = "table-banner-image" src=/ZooAssignment/public/'.$sponsor['sbanner'].' alt = "Banner Image">';
        $website = "Not Available";
        if (filter_var($sponsor['swebsite'], FILTER_VALIDATE_URL) !== FALSE) {
          $website = "<a href = '$sponsor[swebsite]' target='_blank'>$sponsor[swebsite]</a>";
        }

        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$sponsor['scompany'].'</td>
                <td>'.$sponsor['sptelephone'].'</td>
                <td>'.$sponsor['saddress'].'</td>
                <td>'.$website.'</td>
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
