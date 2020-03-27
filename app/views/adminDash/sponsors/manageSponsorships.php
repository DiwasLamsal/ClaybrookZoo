

<div class="row">
  <section class="col-lg-12 connectedSortable">
  <table id="listTable" class="table allTable table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Animal</th>
        <th>Company</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Payment</th>
        <th>Status</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    <?php



    $count = 0;
      while($sponsorship = $sponsorships->fetch()){

        $animal = getAnimalById($sponsorship['said'])->fetch();
        $sponsor = getSponsorById($sponsorship['ssid'])->fetch();

        $animalLink = "<a href = '/ZooAssignment/public/ManageAnimals/all/$animal[aid]' target='_blank'>$animal[aname]</a>";
        $sponsorLink = "<a href = '/ZooAssignment/public/ManageSponsorships/sponsors/$sponsor[sid]' target='_blank'>$sponsor[scompany]</a>";


        $viewIcon = '<a class="tbl-btn btn btn-primary btn-sm"
                        href = "/ZooAssignment/public/ManageSponsorships/'.strtolower($sponsorship['sstatus']).'/'.$sponsorship['sid'].'">
                            <i class="fas fa-folder"></i> View
                        </a>';


        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$animalLink.'</td>
                <td>'.$sponsorLink.'</td>
                <td>'.$sponsorship['sstartdate'].'</td>
                <td>'.$sponsorship['senddate'].'</td>
                <td>'.$sponsorship['spaymentdetails'].'</td>
                <td>'.$sponsorship['sstatus'].'</td>
                <td>'.$viewIcon.'</td>
        ';
      }
    ?>
      </tbody>
    </table>
  </section>
</div>

<?php echo $dataTableCode;?>
