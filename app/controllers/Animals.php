<?php

  class Animals extends Controller{

    public function index(){

      $animalClass = new DatabaseTable('animals');
      $animals = $animalClass->find('astatus', 'Active');
      $template = '../app/views/animals/allAnimals.php';
      $content = loadTemplate($template, ['animals'=>$animals]);
      $title = "Claybrook Zoo - Animal";
      $heading = "View Our Animals";
      $selected = "Animals";
      require_once "../app/controllers/userLoadView.php";
    }

  }


?>
