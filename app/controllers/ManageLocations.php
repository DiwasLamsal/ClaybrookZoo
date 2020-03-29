<?php

class ManageLocations extends Controller{

  public function index(){
    header("Location:ManageLocations/all");
  }

  public function all($val=""){
    if(is_numeric($val)){
      $this->browse($val);
      return;
    }
    $template = '../app/views/adminDash/dataTableCode.php';
    $dataTableCode = loadTemplate($template, []);

    $locationClass = new DatabaseTable('locations');
    $locations = $locationClass->findAll();
    $template = '../app/views/adminDash/manageLocations.php';
    $content = loadTemplate($template, ['locations'=>$locations, 'dataTableCode'=>$dataTableCode]);
    $title = "Dashboard - Locations";
    $breadcrumbContent=["ManageLocations/all"=>"locations"];
    $role=['Administrator','Moderator'];
    $bodyTitle="Locations";
    require_once "../app/controllers/adminLoadView.php";
  }

  public function add(){
    $locationClass = new DatabaseTable('locations');
    $areaClass = new DatabaseTable('areas');
    $areas=$areaClass->findAll();

    if(isset($_POST['submit'])){
      $locationClass->save($_POST['location']);
      header("Location:../ManageLocations/all/addsuccess");
    }

    $template = '../app/views/adminDash/addLocation.php';
    $content = loadTemplate($template, ['areas'=>$areas]);
    $title = "Dashboard - Add new location";
    $breadcrumbContent=["ManageLocations/all"=>"locations", "ManageLocations/Add"=>"Add Location"];
    $role=['Administrator','Moderator'];
    $bodyTitle="Add location";
    require_once "../app/controllers/adminLoadView.php";
  }



  public function browse($val = ""){
    $locationClass = new DatabaseTable('locations');
    $location = $locationClass->find('lid', $val);
    $areaClass = new DatabaseTable('areas');
    $areas=$areaClass->findAll();


    if($location->rowCount()>0){
      if(isset($_POST['submit'])){
        $_POST['location']['lid']=$val;
        $locationClass->save($_POST['location'], 'lid');
        header("Location:../all/editsuccess");
      }

      $link='/ZooAssignment/public/ManageAreas/delete/'.$val;
      if(checkLocationContainsAnimals($val))
        $link = false;
      $message = ($link==false)?"This location contains animals and cannot be deleted.":"";

      $template = '../app/views/adminDash/modal.php';
      $dataTableCode = loadTemplate($template, []);

      $template = '../app/views/adminDash/modal.php';
      $modal = loadTemplate($template, ['type'=>'location', 'link'=>$link, 'message'=>$message]);
      $template = '../app/views/adminDash/addLocation.php';
      $content = loadTemplate($template, ['location'=>$location, 'modal'=>$modal, 'areas'=>$areas]);

      $title = "Dashboard - View Location";
      $breadcrumbContent=["ManageLocations/all"=>"Locations", "ManageLocations/browse"=>"View Location"];
      $role=['Administrator','Moderator'];
      $bodyTitle="Edit location";
      require_once "../app/controllers/adminLoadView.php";
    }

    else{
      header("Location:../all/nosucharea");
    }

  }


  public function delete($val = ""){
    $locationClass = new DatabaseTable('locations');
    $location = $locationClass->find('lid',$val);
    if($location->rowCount()>0){
      $locationClass->delete('lid', $val);
      header("Location:../all/deletesuccess");
    }
    else{
      header("Location:../all/nosucharea");
    }

  }




}

?>
