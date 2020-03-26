<?php

  class Animals extends Controller{

    public function index(){
      $animalClass = new DatabaseTable('animals');
      $animals = $animalClass->find('astatus', 'Active');
      $locationClass = new DatabaseTable('locations');
      $locations = $locationClass->findAll();
      $areaClass= new DatabaseTable('areas');
      $areas = $areaClass->findAll();
      $featured = $animalClass->find('afeatured','Yes');
      $template = '../app/views/animals/allAnimals.php';
      $content = loadTemplate($template, ['animals'=>$animals, 'featured'=>$featured, 'locations'=>$locations, 'areas'=>$areas]);
      $title = "Claybrook Zoo - Animal";
      $bodyTitle = "Animals Home";
      $breadcrumbContent=["Animals"=>"Animals"];
      $selected = "Animals";
      require_once "../app/controllers/userLoadView.php";
    }


    public function browse($val){
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


            $template = '../app/views/animals/viewAnimal.php';
            $criteria=[
              'animal'=>$animal,
              'location'=>$location,
              'area'=>$area,
              $catName=>$catObj,
              'catObj'=>$catObjTwo,
              'coverImage'=>$animalCover, 'galleryImages'=>$animalGallery, 'globalImage'=>$animalGlobal
            ];
            $content = loadTemplate($template, $criteria);
            $title = "Claybrook Zoo - Animal";
            $bodyTitle = "Animal Details";
            $breadcrumbContent=["Animals"=>"Animals", "Animals/browse"=>"Animal Details"];
            $selected = "Animals";
            require_once "../app/controllers/userLoadView.php";
          }
      }
      else{
        header("Location:../all/nosuchanimal");
      }
    }

    public function search(){
      $criteria= [];
      if(isset($_POST['location'])&&!empty($_POST['location']))
        $criteria['location']=$_POST['location'];
      if(isset($_POST['area'])&&!empty($_POST['area']))
        $criteria['area']=$_POST['area'];
      if(isset($_POST['category'])&&!empty($_POST['category']))
        $criteria['category']=$_POST['category'];
      if(isset($_POST['name'])&&!empty($_POST['name']))
        $criteria['name']=$_POST['name'];

      $animals=findSearchedAnimals($criteria);
      $template = '../app/views/animals/searchAnimals.php';
      $content = loadTemplate($template, ['animals'=>$animals]);
      $title = "Claybrook Zoo - Animal";
      $bodyTitle = "Search Results";
      $breadcrumbContent=["Animals"=>"Animals", "Animals/search"=>"Search Results"];
      $selected = "Animals";
      require_once "../app/controllers/userLoadView.php";
    }


    public function signage($val){
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


            $template = '../app/views/animals/viewAnimal.php';
            $criteria=[
              'animal'=>$animal,
              'location'=>$location,
              'area'=>$area,
              $catName=>$catObj,
              'catObj'=>$catObjTwo,
              'coverImage'=>$animalCover, 'galleryImages'=>$animalGallery, 'globalImage'=>$animalGlobal
            ];
            $content = loadTemplate($template, $criteria);
            $title = "Claybrook Zoo - Animal Signage";
            $bodyTitle = "Animals";
            $breadcrumbContent=["Animals"=>"Animals"];
            $selected = "Animals";
            require_once "../app/controllers/userLoadView.php";
          }
      }
      else{
        header("Location:../all/nosuchanimal");
      }
    }


    public function sponsor($val){
      $animalClass = new DatabaseTable('animals');
      $animal = $animalClass->find('aid', $val);
      $headerLocation = "Location:../nosuchanimal";

      if($animal->rowCount()>0){
        $animal=$animal->fetch();
        if($animal['astatus']=="Active" && !checkAnimalContainsSponsorship($val)){
            $template = '../app/views/animals/sponsorForm.php';
            $criteria=[
              'animal'=>$animal
            ];
            $content = loadTemplate($template, $criteria);
            $title = "Claybrook Zoo - Animal Signage";
            $selected = "Animals";
            $bodyTitle = "Sponsorship";
            $breadcrumbContent=["Animals"=>"Animals", "Animals/sponsorship"=>"Sponsorship"];
            require_once "../app/controllers/userLoadView.php";
          }
        else{
          header($headerLocation);
        }
      }
      else{
        header($headerLocation);
      }
    }


  }


?>
