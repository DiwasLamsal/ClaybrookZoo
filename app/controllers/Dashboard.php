<?php

  class Dashboard extends Controller{

    public function index($val=""){
      if(isset($_POST['submitHeader'])){
        $this->changeHeader();
      }
      header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
      header("Pragma: no-cache"); // HTTP 1.0.
      header("Expires: 0");

      $template = '../app/views/adminDash/adminHome.php';
      $content = loadTemplate($template, []);
      $title = "Dashboard";
      $selected = "Dashboard";
      $breadcrumbContent=["UserHome"=>"Dashboard"];
      $bodyTitle="Dashboard";
      $role=['Administrator','Manager','Zookeeper'];
      require_once "../app/controllers/adminLoadView.php";
    }

    public function changeHeader(){
        $target_dir = "resources/images/header/";
        $target_file = $target_dir."header.jpg";
        $path="/ZooAssignment/public/";
        if(file_exists($target_dir.$target_file)){unlink($target_dir.$target_file);}
        elseif(file_exists($path.$target_dir.$target_file)){unlink($path.$target_dir.$target_file);}
        move_uploaded_file($_FILES["headerImg"]["tmp_name"], $target_file);

        header("Location:/ZooAssignment/public/Dashboard/headerchanged");
    }

  }

?>
