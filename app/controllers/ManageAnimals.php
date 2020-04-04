<?php

class ManageAnimals extends Controller{

  public function index(){
    header("Location:ManageAnimals/all");
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

    $messageTemplate = '../app/templates/admin/MessageTemplate.php';
    $message = loadTemplate($messageTemplate, ['message'=>$val]);

    $template = '../app/views/adminDash/manageAnimals.php';
    $content = loadTemplate($template, ['animals'=>$animals, 'dataTableCode'=>$dataTableCode, 'type'=>'', 'message'=>$message]);
    $title = "Dashboard - Animals";
    $breadcrumbContent=["ManageAnimals/all"=>"Animals"];
    $role=['Administrator','Moderator'];
    $bodyTitle="Animals";
    require_once "../app/controllers/adminLoadView.php";
  }

  public function trash($val=""){
    $animalClass = new DatabaseTable('animals');
    $animals = $animalClass->find('astatus', 'Dormant');
    $template = '../app/views/adminDash/dataTableCode.php';
    $dataTableCode = loadTemplate($template, []);
    $messageTemplate = '../app/templates/admin/MessageTemplate.php';
    $message = loadTemplate($messageTemplate, ['message'=>$val]);

    $template = '../app/views/adminDash/manageAnimals.php';
    $content = loadTemplate($template, ['animals'=>$animals, 'dataTableCode'=>$dataTableCode, 'type'=>"archive", 'message'=>$message]);
    $title = "Dashboard - Dormant Animals";
    $breadcrumbContent=["ManageAnimals/all"=>"Archived Animals"];
    $role=['Administrator'];
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
      $_POST['animal']['afeatured']="No";



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
                $fishClass = new DatabaseTable('fish');
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
    $breadcrumbContent=["ManageAnimals/all"=>"Animals", "ManageAnimals/Add"=>"Add Animal"];
    $role=['Administrator','Moderator'];
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
    $animalGlobal=checkGlobalImageExists($val)?getImagesByType($val,'Global'):false;

    if($animal->rowCount()>0){
      if(isset($_POST['submit'])){
        $_POST['animal']['aid']=$val;
        $animalClass->save($_POST['animal'], 'aid');
        $_POST[$catName][$catPK]=$catObj[$catPK];
        $catClass->save($_POST[$catName],$catPK);
        header("Location:../all/editsuccess");
      }

      if(isset($_POST['submitCoverImage'])){
        $coverImageId=getCoverImage($val)['aiid'];
        removeCurrentCoverImageFile($val);

        $target_dir = "resources/images/animals/".$val."/";
        $target_file = $target_dir.microtime(true).'-Cover-'.basename($_FILES["coverImg"]["name"]);
        $target_file = str_replace(' ', '_', $target_file);
        move_uploaded_file($_FILES["coverImg"]["tmp_name"], $target_file);

        $_POST['animal_image']['aifilename']=$target_file;
        $_POST['animal_image']['aiid']=$coverImageId;
        $_POST['animal_image']['aifiletype']="Cover";
        $_POST['animal_image']['aianimal']=$val;

        $aiClass->save($_POST['animal_image'], 'aiid');
        header("Location:../all/editimagesuccess");
      }

      // submit gallery code
     if(isset($_POST['submitGallery'])){
       if($_FILES['galleryImgs']['name'][0]!=""){
         deleteImagesByType($val, 'Gallery');
         $target_dir = "resources/images/animals/".$val.'/';
         foreach($_FILES["galleryImgs"]["tmp_name"] as $key=>$value){
           $target_file = $target_dir.microtime(true).'-Gallery-'.basename($_FILES["galleryImgs"]["name"][$key]);
           $target_file = str_replace(' ', '_', $target_file);
           move_uploaded_file($_FILES["galleryImgs"]["tmp_name"][$key], $target_file);
           $_POST['animal_image']['aifilename']=$target_file;
           $_POST['animal_image']['aifiletype']="Gallery";
           $_POST['animal_image']['aianimal']=$val;

           $aiClass->save($_POST['animal_image'], 'aiid');
         }
         header("Location:../all/editimagesuccess");
       }
     }


     if(isset($_POST['submitGlobalImage'])){

       $target_dir = "resources/images/animals/".$val."/";
       $target_file = $target_dir.microtime(true).'-Global-'.basename($_FILES["globalImg"]["name"]);
       $target_file = str_replace(' ', '_', $target_file);
       move_uploaded_file($_FILES["globalImg"]["tmp_name"], $target_file);

       $_POST['animal_image']['aifilename']=$target_file;
       $_POST['animal_image']['aifiletype']="Global";
       $_POST['animal_image']['aianimal']=$val;

       if(checkGlobalImageExists($val)){
         $_POST['animal_image']['aiid']=getGlobalImage($val)['aiid'];
         removeCurrentGlobalImageFile($val);
         $aiClass->save($_POST['animal_image'], 'aiid');
       }
       else{
         $aiClass->save($_POST['animal_image']);
       }

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
      $breadcrumbContent=["ManageAnimals/all"=>"Animals", "ManageAnimals/browse"=>"View Animal"];
      $role=['Administrator','Moderator'];
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

  public function featured($val = ""){
    $animalClass = new DatabaseTable('animals');
    $animal = $animalClass->find('aid',$val);
    if($animal->rowCount()>0){
      removeCurrentFeaturedAnimal();
      $criteria = [
        'aid'=>$val,
        'afeatured'=>'Yes'
      ];
      $animalClass->save($criteria, 'aid');
      header("Location:../all/featuresuccess");
    }
    else{
      header("Location:../all/nosuchanimal");
    }
  }

}

?>
