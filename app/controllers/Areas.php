<?php

  class Areas extends Controller{

    public function index(){

      $areaClass = new DatabaseTable('areas');
      $areas = $areaClass->findAll();
      $template = '../app/views/areas/allAreas.php';
      $content = loadTemplate($template, ['areas'=>$areas]);
      $title = "Claybrook Zoo - Areas";
      $bodyTitle = "Areas";
      $breadcrumbContent=["Areas"=>"Areas"];
      $selected = "Areas";
      require_once "../app/controllers/userLoadView.php";
    }


    public function browse($val){
      $areaClass = new DatabaseTable('areas');
      $area = $areaClass->find('aid',$val);

      if($area->rowCount()>0){
        $area=$area->fetch();
        $locationClass = new DatabaseTable('locations');
        $locations = $locationClass->find('larea', $val);

        $template = '../app/views/areas/viewArea.php';
        $criteria=[
          'area'=>$area,
          'locations'=>$locations
        ];
        $content = loadTemplate($template, $criteria);
        $title = "Claybrook Zoo - Areas";
        $bodyTitle = "Area Details";
        $breadcrumbContent=["Areas"=>"Areas", "Areas/browse"=>"Area Details"];
        $selected = "Areas";
        require_once "../app/controllers/userLoadView.php";
      }
      else{
        header("Location:../all/nosucharea");
      }
    }

    public function locations($val){
      $locationClass = new DatabaseTable('locations');
      $location = $locationClass->find('lid', $val);

      if($location->rowCount()>0){
        $location=$location->fetch();
        $areaClass = new DatabaseTable('areas');
        $area = $areaClass->find('aid',$location['larea'])->fetch();
        $template = '../app/views/areas/viewLocation.php';
        $criteria=[
          'area'=>$area,
          'location'=>$location
        ];
        $content = loadTemplate($template, $criteria);
        $title = "Claybrook Zoo - Areas";
        $bodyTitle = "Location Details";
        $breadcrumbContent=["Areas"=>"Areas", "Areas/locations"=>"Location Details"];
        $selected = "Areas";
        require_once "../app/controllers/userLoadView.php";
      }
      else{
        header("Location:../all/nosucharea");
      }
    }


  }


?>
