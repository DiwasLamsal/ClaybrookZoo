<?php

  class Dashboard extends Controller{

    public function index(){

      $template = '../app/views/adminDash/adminHome.php';
      $content = loadTemplate($template, []);

      $title = "Dashboard";
      $selected = "Dashboard";
      $breadcrumbContent=["UserHome"=>"Dashboard"];
      $bodyTitle="Users";
      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
