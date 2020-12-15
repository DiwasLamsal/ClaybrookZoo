<?php

  class Events extends Controller{

    public function index(){

      $eventClass = new DatabaseTable('events');
      $events = $eventClass->findAll();
      $template = '../app/views/events/allEvents.php';
      $content = loadTemplate($template, ['events'=>$events]);
      $title = "Claybrook Zoo - Events";
      $bodyTitle = "Events";
      $breadcrumbContent=["Events"=>"Events"];
      $selected = "Events";
      require_once "../app/controllers/userLoadView.php";
    }


    public function browse($val){
      $eventClass = new DatabaseTable('events');
      $event = $eventClass->find('eid',$val);

      if($event->rowCount()>0){
        $event=$event->fetch();
        $template = '../app/views/events/viewEvent.php';
        $criteria=[
          'event'=>$event
        ];
        $content = loadTemplate($template, $criteria);
        $title = "Claybrook Zoo - Events";
        $bodyTitle = "$event[etitle]";
        $breadcrumbContent=["Events"=>"Events", "Events/browse"=>"Event Details"];
        $selected = "Events";
        require_once "../app/controllers/userLoadView.php";
      }
      else{
        header("Location:../all/nosuchevent");
      }
    }


  }


?>
