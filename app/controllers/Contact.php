<?php

  class Contact extends Controller{

    public function index(){

      $template = '../app/views/contacts/contactView.php';
      $content = loadTemplate($template, []);
      $title = "Claybrook Zoo - Contact";
      $selected="Contact";
      $bodyTitle = "Contact";
      $breadcrumbContent=["Contact"=>"Contact"];
      require_once "../app/controllers/userLoadView.php";
    }


  }
?>
