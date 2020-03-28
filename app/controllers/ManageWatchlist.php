<?php

class ManageWatchlist extends Controller{

  public function index(){
    header("Location:./all");
  }

  public function all($val=""){
    if(is_numeric($val)){
      $this->browse($val);
      return;
    }
    $watchlistClass = new DatabaseTable('watchlists');
    $watchlists = $watchlistClass->findAll();
    $template = '../app/views/adminDash/dataTableCode.php';
    $dataTableCode = loadTemplate($template, []);

    $template = '../app/views/adminDash/watchlists/manageWatchlist.php';
    $content = loadTemplate($template, ['watchlists'=>$watchlists, 'dataTableCode'=>$dataTableCode]);
    $title = "Dashboard - Watchlists";
    $breadcrumbContent=["ManageWatchlist/all"=>"Watchlist"];
    $role=['Administrator','Moderator','Zookeeper'];
    $bodyTitle="Watchlist";
    require_once "../app/controllers/adminLoadView.php";
  }

  public function add($val){
    if(getAnimalById($val)->rowCount()>0){
      $_POST['watchlist']['waid']=$val;
      $watchlistClass = new DatabaseTable('watchlists');
      $watchlistClass->insert($_POST['watchlist']);
    }
    header("Location:../all/addsuccess");
  }



  public function browse($val = ""){
    $watchlistClass = new DatabaseTable('watchlists');
    $watchlist = $watchlistClass->find('wid',$val);

    if($watchlist->rowCount()>0){
      if(isset($_POST['watchlistSubmit'])){
        $_POST['watchlist']['wid']=$val;
        $watchlistClass->save($_POST['watchlist'], 'wid');
        header("Location:../all/editsuccess");
      }

      $link='/ZooAssignment/public/ManageWatchlist/delete/'.$val;
      $message = ($link==false)?"This watchlist cannot be deleted.":"";
      $template = '../app/views/adminDash/modal.php';
      $modal = loadTemplate($template, ['type'=>'Watchlist', 'link'=>$link, 'message'=>$message]);
      $template = '../app/views/adminDash/watchlists/editWatchlist.php';
      $content = loadTemplate($template, ['watchlist'=>$watchlist->fetch(), 'modal'=>$modal]);

      $title = "Dashboard - Edit Watchlist";
      $breadcrumbContent=["ManageWatchlist/all"=>"Watchlist", "ManageWatchlist/all/".$val=>"View Watchlist"];
      $role=['Administrator','Moderator','Zookeeper'];
      $bodyTitle="View Watchlist";
      require_once "../app/controllers/adminLoadView.php";
    }

    else{
      header("Location:../all/nosuchwatchlist");
    }

  }


  public function delete($val = ""){
    $watchlistClass = new DatabaseTable('watchlists');
    $watchlist = $watchlistClass->find('wid',$val);
    if($watchlist->rowCount()>0){
      $watchlistClass->delete('wid',$val);
      header("Location:../all/deletesuccess");
    }
    else{
      header("Location:../all/nosuchwatchlist");
    }

  }




}

?>
