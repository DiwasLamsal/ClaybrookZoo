<?php

class ManageVacancies extends Controller{

  public function index(){
    header("Location:ManageVacancies/all");
  }

  public function all(){
    $template = '../app/views/adminDash/comingSoon.php';
    $content = loadTemplate($template, []);
    $title = "Dashboard - Vacancies";
    $breadcrumbContent=["ManageVacancies"=>"Vacancies"];
    $bodyTitle="Vacancies";
    $role=['Administrator','Manager'];
    require_once "../app/controllers/adminLoadView.php";
  }
}

?>
