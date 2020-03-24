<?php

  class Contact extends Controller{

    public function index(){

      $template = '../app/views/contacts/contactView.php';
      $content = loadTemplate($template, []);
      $title = "Claybrook Zoo - Contact";
      $selected="Contact";
      $heading = "Contact Us";
      require_once "../app/controllers/userLoadView.php";
    }


  }
?>
