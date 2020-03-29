<?php

  class Kiosk extends Controller{

    public function index(){
      $content = '<img style="width: 100%;" src = "/ZooAssignment/public/resources/images/extras/map.bmp">';
      $title = "Claybrook Zoo - Kiosk";
      $bodyTitle = "Welcome to Claybrook Zoo";
      $selected="Home";
      $breadcrumbContent=[];
      require_once "../app/controllers/kioskLoadView.php";
    }

    public function allAnimals(){
      $animalClass = new DatabaseTable('animals');
      $animals = $animalClass->findSorted('astatus', 'Active', 'alevel');
      $locationClass = new DatabaseTable('locations');
      $locations = $locationClass->findAll();
      $areaClass= new DatabaseTable('areas');
      $areas = $areaClass->findAll();
      $featured = $animalClass->find('afeatured','Yes');
      $template = '../app/views/kiosk/kioskAnimals.php';
      $content = loadTemplate($template, ['animals'=>$animals, 'featured'=>$featured, 'locations'=>$locations, 'areas'=>$areas]);
      $title = "Claybrook Zoo - Animal";
      $bodyTitle = "Animals";
      $breadcrumbContent=["Animals"=>"Animals"];
      $selected = "Animals";
      require_once "../app/controllers/kioskLoadView.php";
    }

    public function animal($val){
      $animalClass = new DatabaseTable('animals');
      $animal = $animalClass->find('aid', $val);

      if($animal->rowCount()>0){
        $animal=$animal->fetch();
        if($animal['astatus']=="Active"){
          $locationClass = new DatabaseTable('locations');
          $location = $locationClass->find('lid', $animal['alid'])->fetch();

          $areaClass = new DatabaseTable('areas');
          $area = $areaClass->find('aid', $location['larea'])->fetch();

          $catTable=getAnimalCategoryTable($val);
          $catName=getAnimalCategoryName($val);
          $catAnimalCode=getAnimalCategoryCode($val);
          $catPK = getAnimalCategoryPK($val);

          $catClass = new DatabaseTable($catTable);
          $catObj = $catClass->find($catAnimalCode, $val)->fetch();
          $catObjTwo = $catClass->find($catAnimalCode, $val)->fetch();

          $animalCover=getCoverImage($val);
          $animalGallery=getImagesByType($val, 'Gallery');
          $animalGlobal=checkGlobalImageExists($val)?getImagesByType($val,'Global'):false;

          $sponsorship = checkAnimalContainsSponsorship($val);

            $template = '../app/views/kiosk/kioskViewAnimal.php';
            $criteria=[
              'animal'=>$animal,
              'location'=>$location,
              'area'=>$area,
              $catName=>$catObj,
              'catObj'=>$catObjTwo,
              'coverImage'=>$animalCover, 'galleryImages'=>$animalGallery, 'globalImage'=>$animalGlobal,
              'sponsorship'=>$sponsorship
            ];
            $content = loadTemplate($template, $criteria);
            $title = "Claybrook Zoo - Animal";
            $bodyTitle = $animal['aname'];
            $breadcrumbContent=["Animals"=>"Animals", "Animals/browse"=>$animal['aname']];
            $selected = "Animals";
            require_once "../app/controllers/kioskLoadView.php";
          }
      }
      else{
        header("Location:../nosuchanimal");
      }
    }



  }





?>
