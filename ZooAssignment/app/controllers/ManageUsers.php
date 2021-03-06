<?php

class ManageUsers extends Controller{

  public function index(){
    header("Location:ManageUsers/all");
  }

  public function all($val=""){
    if(is_numeric($val)){
      $this->browse($val);
      return;
    }

    $userClass = new DatabaseTable('users');
    $users = $userClass->findAll();
    $template = '../app/views/adminDash/dataTableCode.php';
    $dataTableCode = loadTemplate($template, []);
    $template = '../app/views/adminDash/manageUsers.php';
    $messageTemplate = '../app/templates/admin/MessageTemplate.php';
    $message = loadTemplate($messageTemplate, ['message'=>$val]);

    $content = loadTemplate($template, ['users'=>$users, 'dataTableCode'=>$dataTableCode, 'message'=>$message]);
    $title = "Dashboard - Staff";
    $breadcrumbContent=["ManageUsers/all"=>"Staff"];
    $bodyTitle="Users";
    $role=['Administrator'];
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
    $title = "Dashboard - Add new Staff";
    $breadcrumbContent=["ManageUsers/all"=>"Users", "ManageUsers/Add"=>"Add Staff"];
    $bodyTitle="Add Staff";
    $role=['Administrator'];
    require_once "../app/controllers/adminLoadView.php";
  }



  public function browse($val = ""){
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid', $val);
    if (session_status() == PHP_SESSION_NONE) {
    	session_start();
    }
    if($user->rowCount()>0){
      if(isset($_POST['submit'])){
        $_POST['user']['uid']=$val;
        $userClass->save($_POST['user'], 'uid');
        header("Location:../all/editsuccess");
        if($_SESSION['loggedin']['uid']==$val)header("Location:../Logout");
      }

      if(isset($_POST['submitPassword'])){
        $_POST['user']['uid']=$val;
        $_POST['user']['upassword']=password_hash($_POST['user']['upassword'], PASSWORD_DEFAULT);
        $userClass->save($_POST['user'], 'uid');
        header("Location:../all/editsuccess");
        if($_SESSION['loggedin']['uid']==$val)header("Location:/ZooAssignment/public/Logout");
      }

      $link='/ZooAssignment/public/ManageUsers/delete/'.$val;
      if(isset($_SESSION['loggedin'])&& ($_SESSION['loggedin']['uid'])==$val)
        $link = false;
      $message = ($link==false)?"You cannot delete your own account.":"";
      $template = '../app/views/adminDash/modal.php';
      $modal = loadTemplate($template, ['type'=>'User', 'link'=>$link, 'message'=>$message]);

      $template = '../app/views/adminDash/addUser.php';
      $content = loadTemplate($template, ['user'=>$user, 'modal'=>$modal]);
      $title = "Dashboard - View Staff";
      $breadcrumbContent=["ManageUsers/all"=>"Users", "ManageUsers/browse"=>"View Staff"];
      $bodyTitle="Edit Staff";
      $role=['Administrator'];
      require_once "../app/controllers/adminLoadView.php";
    }

    else{
      header("Location:../all/nosuchuser");
    }

  }


  public function delete($val=""){
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid',$val);
    if($user->rowCount()>0){
      $userClass->delete('uid', $val);
      header("Location:../all/deletesuccess");
    }
    else{
      header("Location:../all/nosuchuser");
    }

  }

  public function archive($val = ""){
    $userClass = new DatabaseTable('users');
    $user = $userClass->find('uid',$val);
    if($user->rowCount()>0){

      $ustatus = $user->fetch()['ustatus']=="Active"? "Dormant" : "Active";
      $criteria = [
        'uid'=>$val,
        'ustatus'=>$ustatus
      ];
      $userClass->save($criteria, 'uid');
      header("Location:../all/archivesuccess");
    }
    else{
      header("Location:../all/nosuchuser");
    }
  }


}

?>
