<?php

class ManageAnimals extends Controller{

  public function index(){
    header("Location:./all");
  }

  public function all($val=""){
    // https://stackoverflow.com/questions/9335915/check-if-a-string-contains-numbers-and-letters
    if(preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $val)){
      $this->browse($val);
      return;
    }

    $animalClass = new DatabaseTable('animals');
    $animals = $animalClass->find('astatus', 'Active');
    $template = '../app/views/adminDash/dataTableCode.php';
    $dataTableCode = loadTemplate($template, []);

    $template = '../app/views/adminDash/manageAnimals.php';
    $content = loadTemplate($template, ['animals'=>$animals, 'dataTableCode'=>$dataTableCode, 'type'=>'']);
    $title = "Dashboard - Animals";
    $breadcrumbContent=["ManageAnimals"=>"Animals"];
    $bodyTitle="Animals";
    require_once "../app/controllers/adminLoadView.php";
  }

  public function trash(){
    $animalClass = new DatabaseTable('animals');
    $animals = $animalClass->find('astatus', 'Dormant');
    $template = '../app/views/adminDash/dataTableCode.php';
    $dataTableCode = loadTemplate($template, []);

    $template = '../app/views/adminDash/manageAnimals.php';
    $content = loadTemplate($template, ['animals'=>$animals, 'dataTableCode'=>$dataTableCode, 'type'=>"archive"]);
    $title = "Dashboard - Dormant Animals";
    $breadcrumbContent=["ManageAnimals"=>"Archived Animals"];
    $bodyTitle="Archived Animals";
    require_once "../app/controllers/adminLoadView.php";
  }

  public function add(){
    $animalClass = new DatabaseTable('animals');
    $locationClass = new DatabaseTable('locations');
    $locations=$locationClass->findAll();

    if(isset($_POST['submit'])){
      $_POST['animal']['astatus']="Active";
      // Set Generated code
      // CAT = Category, SP = Species, YY = Year Added, RND = Random Number, L = Level   CATSPYYRNDL ex: MAMGO20253C
      $code=generateAnimalCode($_POST['animal']);
      $_POST['animal']['aid']=$code;

      //Create folder for animal to store images
      createAnimalImageFolder($code);

      // Save the animal record to the animals table
      $animalClass->save($_POST['animal']);

      // Check the animal category and add the record in relevant table
      switch ($_POST['animal']['acategory']) {
          case "Bird":
                // code if bird
                $birdClass = new DatabaseTable('birds');
                $_POST['bird']['baid']=$code;
                $birdClass->save($_POST['bird']);
              break;
          case "Mammal":
                // code if mammal
                $mammalClass = new DatabaseTable('mammals');
                $_POST['mammal']['maid']=$code;
                $mammalClass->save($_POST['mammal']);
              break;
          case "Fish":
                // code if fish
                $birdClass = new DatabaseTable('fish');
                $_POST['fish']['faid']=$code;
                $fishClass->save($_POST['fish']);
              break;
          case "Reptile or Amphibian":
                // code if reptile/amphibian
                $raClass = new DatabaseTable('reptile_amphibians');
                $_POST['reptile_amphibian']['raaid']=$code;
                $raClass->save($_POST['reptile_amphibian']);
              break;
          default:
                // default code
              break;
      }

      // Save animal image
      $aiClass = new DatabaseTable('animal_images');

      $target_dir = "resources/images/animals/".$code.'/';
      $target_file = $target_dir.microtime(true).'-Cover-'.basename($_FILES["coverImg"]["name"]);
      $target_file = str_replace(' ', '_', $target_file);

      move_uploaded_file($_FILES["coverImg"]["tmp_name"], $target_file);
      $_POST['animal_image']['aifilename']=$target_file;
      $_POST['animal_image']['aifiletype']="Cover";
      $_POST['animal_image']['aianimal']=$code;

      $aiClass->save($_POST['animal_image']);

      header("Location:../ManageAnimals/all/addsuccess");
    }

    $template = '../app/views/adminDash/addAnimal.php';
    $content = loadTemplate($template, ['locations'=>$locations]);
    $title = "Dashboard - Add new Animal";
    $breadcrumbContent=["ManageAnimals"=>"Animals", "ManageAnimals/Add"=>"Add Animal"];
    $bodyTitle="Add Animal";
    require_once "../app/controllers/adminLoadView.php";
  }



  public function browse($val = ""){
    $animalClass = new DatabaseTable('animals');
    $animal = $animalClass->find('aid', $val);
    $locationClass = new DatabaseTable('locations');
    $locations = $locationClass->findAll();
    $aiClass = new DatabaseTable('animal_images');

    $catTable=getAnimalCategoryTable($val);
    $catName=getAnimalCategoryName($val);
    $catAnimalCode=getAnimalCategoryCode($val);
    $catPK = getAnimalCategoryPK($val);

    $catClass = new DatabaseTable($catTable);
    $catObj = $catClass->find($catAnimalCode, $val)->fetch();
    $catObjTwo = $catClass->find($catAnimalCode, $val)->fetch();

    $animalCover=getCoverImage($val);
    $animalGallery=getImagesByType($val, 'Gallery');
    $animalGlobal=getImagesByType($val,'Global');

    if($animal->rowCount()>0){
      if(isset($_POST['submit'])){
        $_POST['animal']['aid']=$val;
        $animalClass->save($_POST['animal'], 'aid');
        $_POST[$catName][$catPK]=$catObj[$catPK];
        $catClass->save($_POST[$catName],$catPK);
        header("Location:../all/editsuccess");
      }

      if(isset($_POST['submitCoverImage'])){
        $coverImageId=getCoverImageId($val);
        removeCurrentCoverImage($val);

        $target_dir = "resources/images/animals/".$val.'/';
        $target_file = $target_dir.microtime(true).'-Cover-'.basename($_FILES["coverImg"]["name"]);
        $target_file = str_replace(' ', '_', $target_file);

        move_uploaded_file($_FILES["coverImg"]["tmp_name"], $target_file);
        $_POST['animal_image']['aifilename']=$target_file;
        $_POST['animal_image']['aiid']=$coverImageId;
        $_POST['animal_image']['aifiletype']="Cover";
        $_POST['animal_image']['aianimal']=$val;


        if($aiClass->save($_POST['animal_image'], 'aiid'))
          var_dump($_POST['animal_image']);
          header("Location:../all/editimagesuccess");
      }


      $template = '../app/views/adminDash/addAnimal.php';
      $criteria=[
        'animal'=>$animal,
        'locations'=>$locations,
        $catName=>$catObj,
        'catObj'=>$catObjTwo,
        'coverImage'=>$animalCover, 'galleryImages'=>$animalGallery, 'globalImage'=>$animalGlobal
      ];
      $content = loadTemplate($template, $criteria);
      $title = "Dashboard - View Animal";
      $breadcrumbContent=["ManageAnimals"=>"Animals", "ManageAnimals/browse"=>"View Animal"];
      $bodyTitle="Edit Animal";
      require_once "../app/controllers/adminLoadView.php";
    }
    else{
      header("Location:../all/nosuchanimal");
    }
  }


  public function delete($val=""){
    $animalClass = new DatabaseTable('animals');
    $animal = $animalClass->find('aid',$val);
    if($animal->rowCount()>0){
      deleteAllImages($val);
      deleteCategoryData($val);
      deleteSponsorData($val);
      $animalClass->delete('aid', $val);
      header("Location:../all/deletesuccess");
    }
    else{
      header("Location:../all/nosuchanimal");
    }

  }

  public function archive($val = ""){
    $animalClass = new DatabaseTable('animals');
    $animal = $animalClass->find('aid',$val);
    if($animal->rowCount()>0){
      $astatus = $animal->fetch()['astatus']=="Active"? "Dormant" : "Active";
      $criteria = [
        'aid'=>$val,
        'astatus'=>$astatus
      ];
      $animalClass->save($criteria, 'aid');
      header("Location:../all/archivesuccess");
    }
    else{
      header("Location:../all/nosuchanimal");
    }
  }



}

?>
