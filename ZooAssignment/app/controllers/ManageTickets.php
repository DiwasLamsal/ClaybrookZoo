<?php

class ManageTickets extends Controller{

  public function index(){
    header("Location:ManageTickets/all");
  }

  public function all(){
    $template = '../app/views/adminDash/comingSoon.php';
    $content = loadTemplate($template, []);
    $title = "Dashboard - Tickets";
    $breadcrumbContent=["ManageTickets"=>"Tickets"];
    $bodyTitle="Tickets";
    $role=['Administrator','Manager'];
    require_once "../app/controllers/adminLoadView.php";
  }
}

?>
