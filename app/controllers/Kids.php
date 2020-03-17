<?php

  class Kids extends Controller{

    public function index(){

      $template = '../app/views/kids/game.php';
      $content = loadTemplate($template, []);
      $title = "Claybrook Zoo - Kids";

      require_once "../app/controllers/userLoadView.php";


    }

  }


?>
