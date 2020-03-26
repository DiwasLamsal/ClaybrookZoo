<?php

  class Home extends Controller{

    public function index(){
      // session_start();
      // if(isset($_SESSION['loggedin']))
      //     header("Location:UserHome");
      //   else
      //     header("Location:Home");
      //

      $template = '../app/views/home/homeContent.php';
      $content = loadTemplate($template, []);
      $title = "Claybrook Zoo - Home";
      $bodyTitle = "Welcome to Claybrook Zoo";
      $breadcrumbContent=[];
      $selected="Home";
      require_once "../app/controllers/userLoadView.php";

    }

  }





?>
