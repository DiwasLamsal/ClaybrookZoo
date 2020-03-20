<?php

  class UserHome extends Controller{

    public function index(){

      $template = '../app/views/adminDash/adminHome.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Dashboard";
      $selected = "Dashboard";

      require_once "../app/controllers/adminLoadView.php";

    }

  }

?>
