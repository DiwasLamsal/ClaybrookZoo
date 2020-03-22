

<div class="row">
  <section class="col-lg-12 connectedSortable">
  <table id="listTable" class="table allTable table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Code</th>
        <th>Location</th>
        <th>Name</th>
        <th>Species</th>
        <th>Category</th>
        <th>Image</th>
        <th>Status</th>
        <th>View</th>
        <th>Archive</th>
        <?php if($type=="archive"){?><th>Delete</th><?php }?>
      </tr>
    </thead>
    <tbody>
    <?php



    $count = 0;
      while($animal = $animals->fetch()){

        $viewIcon = '<a class="tbl-btn btn btn-primary btn-sm" href = "/ZooAssignment/public/ManageAnimals/all/'.$animal['aid'].'">
                            <i class="fas fa-folder"></i> View
                        </a>';


        if($type=="archive"){
          $deleteIcon = '<td><a class="tbl-btn btn btn-danger btn-sm" href = "/ZooAssignment/public/ManageAnimals/delete/'.$animal['aid'].'">
                            <i class="fas fa-trash"></i> Delete
                          </a></td>';
          $archiveText = '<i class="fas fa-check-circle"></i> Make Active';
          $btn="success";

        }
        else{
          $deleteIcon="";
          $btn="warning";
          $archiveText = "<i class='fas fa-trash'></i> Trash";
        }

        $archiveIcon = '<a class="tbl-btn btn btn-'.$btn.' btn-sm" href = "/ZooAssignment/public/ManageAnimals/archive/'.$animal['aid'].'">
                          '.$archiveText.'
                        </a>';

        $location=getLocationById($animal['alid'])->fetch();
        $locationLink = '<a href = "/ZooAssignment/public/ManageLocations/all/'.$animal['alid'].'" target="_blank">
                        '.$location['lcode'].'
                    </a>';

        $image = getImagesByType($animal['aid'],'Cover');
        $imgCode = '<img class = "table-cover-image" src=/ZooAssignment/public/'.$image.' alt = "Cover Image">';

        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$animal['aid'].'</td>
                <td>'.$locationLink.'</td>
                <td>'.$animal['aname'].'</td>
                <td>'.$animal['aspecies'].'</td>
                <td>'.$animal['acategory'].'</td>
                <td>'.$imgCode.'</td>
                <td>'.$animal['astatus'].'</td>
                <td>'.$viewIcon.'</td>
                <td>'.$archiveIcon.'</td>'.$deleteIcon.'
        ';
      }
    ?>
      </tbody>
    </table>
  </section>
</div>

<?php echo $dataTableCode;?>
