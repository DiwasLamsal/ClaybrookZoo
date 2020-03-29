<?php

class ManageEvents extends Controller{

  public function index(){
    header("Location:./all");
  }

  public function all($val=""){
    if(is_numeric($val)){
      $this->browse($val);
      return;
    }
    $eventClass = new DatabaseTable('events');
    $events = $eventClass->findAll();
    $template = '../app/views/adminDash/dataTableCode.php';
    $dataTableCode = loadTemplate($template, []);

    $template = '../app/views/adminDash/events/manageEvents.php';
    $content = loadTemplate($template, ['events'=>$events, 'dataTableCode'=>$dataTableCode]);
    $title = "Dashboard - Events";
    $breadcrumbContent=["ManageEvents/all"=>"Events"];
    $role=['Administrator','Moderator'];
    $bodyTitle="Events";
    require_once "../app/controllers/adminLoadView.php";
  }

  public function add(){
    $eventClass = new DatabaseTable('events');
    if(isset($_POST['submit'])){
      $target_dir = "resources/images/events/";
      $target_file = $target_dir.microtime(true).'-Banner-'.basename($_FILES["eventImg"]["name"]);
      $target_file = str_replace(' ', '_', $target_file);
      move_uploaded_file($_FILES["eventImg"]["tmp_name"], $target_file);
      $_POST['event']['ebanner']=$target_file;

      $eventClass->save($_POST['event']);
      header("Location:/ZooAssignment/public/ManageEvents/all/addsuccess");
    }
    $template = '../app/views/adminDash/events/addEvent.php';
    $content = loadTemplate($template, []);
    $title = "Dashboard - Add new event";
    $breadcrumbContent=["ManageEvents/all"=>"Events", "ManageEvents/add"=>"Add Event"];
    $role=['Administrator','Moderator'];
    $bodyTitle="Add Event";
    require_once "../app/controllers/adminLoadView.php";
  }



  public function browse($val = ""){
    $eventClass = new DatabaseTable('events');
    $event = $eventClass->find('eid', $val);

    if($event->rowCount()>0){
      if(isset($_POST['submit'])){
        $_POST['event']['eid']=$val;
        $eventClass->save($_POST['event'], 'eid');
        header("Location:../all/editsuccess");
      }
      if(isset($_POST['submitBanner'])){
        $_POST['event']['eid']=$val;
        removeEventBanner($val);
        $target_dir = "resources/images/events/";
        $target_file = $target_dir.microtime(true).'-Banner-'.basename($_FILES["eventImg"]["name"]);
        $target_file = str_replace(' ', '_', $target_file);
        move_uploaded_file($_FILES["eventImg"]["tmp_name"], $target_file);
        $_POST['event']['ebanner']=$target_file;
        $eventClass->save($_POST['event'], 'eid');
        header("Location:../all/editsuccess");
      }

      $link='/ZooAssignment/public/ManageEvents/delete/'.$val;
      $message = ($link==false)?"This event cannot be deleted.":"";

      $template = '../app/views/adminDash/modal.php';
      $modal = loadTemplate($template, ['type'=>'Event', 'link'=>$link, 'message'=>$message]);
      $template = '../app/views/adminDash/events/addEvent.php';
      $content = loadTemplate($template, ['event'=>$event, 'modal'=>$modal]);

      $title = "Dashboard - Edit Event";
      $breadcrumbContent=["ManageEvents/all"=>"Events", "ManageEvents/browse"=>"View Event"];
      $role=['Administrator','Moderator'];
      $bodyTitle="View Event";
      require_once "../app/controllers/adminLoadView.php";
    }

    else{
      header("Location:../all/nosucharea");
    }

  }

  public function delete($val = ""){
    $eventClass = new DatabaseTable('events');
    $event = $eventClass->find('eid', $val);
    if($event->rowCount()>0){
      removeEventBanner($val);
      $eventClass->delete('eid', $val);
      header("Location:../all/deletesuccess");
    }
    else{
      header("Location:../all/nosucharea");
    }

  }




}

?>
