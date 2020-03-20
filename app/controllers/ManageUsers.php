<?php

class ManageUsers extends Controller{

  public function index(){
    header("Location:../public/ManageUsers/all");
  }

  public function all($val=""){
    $userClass = new DatabaseTable('users');
    $users = $userClass->findAll();
    $template = '../app/views/adminDash/manageUsers.php';
    $content = loadTemplate($template, ['users'=>$users]);
    $title = "Dashboard - Users";
    $breadcrumbContent=["ManageUsers"=>"Users"];
    $bodyTitle="Users";
    require_once "../app/controllers/adminLoadView.php";
  }

  public function add(){
    $userClass = new DatabaseTable('users');

    if(isset($_POST['submit'])){
      $_POST['user']['ustatus']="Active";
      $_POST['user']['upassword']=password_hash($_POST['user']['upassword'], PASSWORD_DEFAULT);
      $userClass->save($_POST['user']);
      header("Location:../ManageUsers/all/addsuccess");
    }

    $template = '../app/views/adminDash/addUser.php';
    $content = loadTemplate($template, []);
    $title = "Dashboard - Add new User";
    $breadcrumbContent=["ManageUsers"=>"Users", "ManageUsers/Add"=>"Add User"];
    $bodyTitle="Add User";
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

      $template = '../app/views/adminDash/addUser.php';
      $content = loadTemplate($template, []);
      $title = "Dashboard - Add new User";
      $breadcrumbContent=["ManageUsers"=>"Users", "ManageUsers/Add"=>"Add User"];
      $bodyTitle="Edit User";
      require_once "../app/controllers/adminLoadView.php";
    }

    else{
      header("Location:../all/nosuchuser");
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
