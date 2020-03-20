<?php

class ManageAnimals extends Controller{

  public function index(){
    header("Location:../public/ManageAnimals/all");
  }

  public function all($val=""){
    $animalClass = new DatabaseTable('animals');
    $animals = $animalClass->findAll();
    $template = '../app/views/adminDash/manageAnimals.php';
    $content = loadTemplate($template, ['animals'=>$animals]);
    $title = "Dashboard - Animals";
    $breadcrumbContent=["ManageAnimals"=>"Animals"];
    $bodyTitle="Animals";
    require_once "../app/controllers/adminLoadView.php";
  }

  public function add(){
    $animalClass = new DatabaseTable('animals');

    if(isset($_POST['submit'])){
      $userClass->save($_POST['animal']);
      header("Location:../ManageAnimals/all/addsuccess");
    }
    $template = '../app/views/adminDash/addAnimal.php';
    $content = loadTemplate($template, []);
    $title = "Dashboard - Add new Animal";
    $breadcrumbContent=["ManageAnimals"=>"Animals", "ManageAnimals/Add"=>"Add Animal"];
    $bodyTitle="Add Animal";
    require_once "../app/controllers/adminLoadView.php";
  }


  public function browse($val = ""){
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid',$val);

    if($user->rowCount()>0){
      if(isset($_POST['submit'])){
        $_POST['user']['uid']=$val;
        $userClass->save($_POST['user'], 'uid');
        header("Location:../index/editsuccess");
      }

      if(isset($_POST['passubmit'])){
        $_POST['user']['password']=password_hash($_POST['user']['password'], PASSWORD_DEFAULT);
        $_POST['user']['uid']=$val;
        $userClass->save($_POST['user'], 'uid');
        header("Location:../index/editpasssuccess");
      }

      $link = '/ZooAssignment/public/ManageAdministrators/delete/'.$val;
      $template = '../app/views/administrators/modal.php';
      $modal = loadTemplate($template, ['type'=>'Administrator', 'link'=>$link]);

      $template = '../app/views/administrators/addAdministrator.php';
      $content = loadTemplate($template, ['user'=>$user, 'modal'=>$modal]);
      $selected = "Administrators";
      $title = "Admin - Browse Administrator";
      require_once "../app/controllers/adminLoadView.php";
    }

    else{
      header("Location:../index/nosuchuser");
    }

  }


  public function delete($val = ""){
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid',$val);
    if($user->rowCount()>0){
      $userClass->delete('uid', $val);
      header("Location:../index/deletesuccess");
    }
    else{
      header("Location:../index/nosuchuser");
    }

  }

  public function archive($val = ""){
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid',$val);
    if($user->rowCount()>0){

      $ustatus = $user->fetch()['ustatus']=="Y"? "N" : "Y";
      $criteria = [
        'uid'=>$val,
        'ustatus'=>$ustatus
      ];
      $userClass->save($criteria, 'uid');
      header("Location:../index/archivesuccess");
    }
    else{
      header("Location:../index/nosuchuser");
    }
  }


}

?>
