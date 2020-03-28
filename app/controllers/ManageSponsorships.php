<?php

class ManageSponsorships extends Controller{

  public function index(){
    header("Location:/ZooAssignment/public/ManageSponsorships/active");
  }

// ------------------------------------------ Sponsorships ------------------------------------------

  public function active($val=""){
    $sponsorshipClass = new DatabaseTable('sponsorships');
    $sponsorships=$sponsorshipClass->find('sstatus', 'Active');
    $this->sponsorships($sponsorships, $val);
  }

  public function pending($val=""){
    $sponsorshipClass = new DatabaseTable('sponsorships');
    $sponsorships=$sponsorshipClass->find('sstatus', 'Pending');
    $this->sponsorships($sponsorships, $val);
  }


  public function expired($val=""){
    $sponsorshipClass = new DatabaseTable('sponsorships');
    $sponsorships=$sponsorshipClass->find('sstatus', 'Expired');
    $this->sponsorships($sponsorships, $val);
  }

  public function sponsorships($sponsorships, $val){
    updateExpiredSponsorships();
    if($val!=""&&is_numeric($val)){
      $this->browseSponsorship($val);
      return;
    }
    $template = '../app/views/adminDash/dataTableCode.php';
    $dataTableCode = loadTemplate($template, []);
    $template = '../app/views/adminDash/sponsors/manageSponsorships.php';
    $content = loadTemplate($template, ['sponsorships'=>$sponsorships, 'dataTableCode'=>$dataTableCode]);
    $title = "Dashboard - Sponsorships";
    $breadcrumbContent=["ManageSponsorships/sponsorships"=>"Sponsorships"];
    $role=['Administrator','Moderator'];
    $bodyTitle="Sponsorships";
    require_once "../app/controllers/adminLoadView.php";
  }


  public function browseSponsorship($val){
    $sponsorshipClass=new DatabaseTable('sponsorships');
    $sponsorship = $sponsorshipClass->find('sid',$val);

    if($sponsorship->rowCount()>0){
      $sponsorship=$sponsorship->fetch();

      if(isset($_POST['submit'])){
        $_POST['sponsorship']['sid']=$val;
        $sponsorshipClass->save($_POST['sponsorship'], 'sid');
        header("Location:../".strtolower($_POST['sponsorship']['sstatus'])."/editsuccess");
      }

      $link='/ZooAssignment/public/ManageSponsorships/deleteSponsorship/'.$val;
      $message = ($link==false)?"You cannot delete this sponsorship.":"";
      $template = '../app/views/adminDash/modal.php';
      $modal = loadTemplate($template, ['type'=>'Sponsorship', 'link'=>$link, 'message'=>$message]);

      $template = '../app/views/adminDash/sponsors/editSponsorship.php';
      $content = loadTemplate($template, ['sponsorship'=>$sponsorship, 'modal'=>$modal]);
      $title = "Dashboard - View Sponsorship";
      $breadcrumbContent=["ManageSponsorships/".strtolower($_POST['sponsorship']['sstatus'])=>"Sponsorships", "ManageSponsorships/browseSponsorship"=>"View Sponsorship"];
      $role=['Administrator','Moderator'];
      $bodyTitle="Edit Sponsorship";
      require_once "../app/controllers/adminLoadView.php";
    }
  }

    public function deleteSponsorship($val=""){
      $sponsorshipClass=new DatabaseTable('sponsorships');
      $sponsorship = $sponsorshipClass->find('sid',$val);
      if($sponsorship->rowCount()>0){
        $sponsorship=$sponsorship->fetch();
        $sponsorshipClass->delete('sid', $val);
        header("Location:../strtolower".($sponsorship['sstatus'])."/editsuccess");
      }
      else{
        header("Location:../active/nosuchsponsorship");
      }
    }

// ------------------------------------------ Sponsors ------------------------------------------


  public function sponsors($val=""){
    if($val!=""&&is_numeric($val)){
      $this->browseSponsor($val);
      return;
    }
    $sponsorClass = new DatabaseTable('sponsors');
    $sponsors=$sponsorClass->findAll();
    $template = '../app/views/adminDash/dataTableCode.php';
    $dataTableCode = loadTemplate($template, []);
    $template = '../app/views/adminDash/sponsors/manageSponsors.php';
    $content = loadTemplate($template, ['sponsors'=>$sponsors, 'dataTableCode'=>$dataTableCode]);
    $title = "Dashboard - Sponsors";
    $breadcrumbContent=["ManageSponsorships/sponsors"=>"Sponsors"];
    $role=['Administrator','Moderator'];
    $bodyTitle="Sponsors";
    require_once "../app/controllers/adminLoadView.php";
  }


  public function browseSponsor($val){
    $sponsorClass = new DatabaseTable('sponsors');
    $sponsor = $sponsorClass->find('sid', $val);

    if($sponsor->rowCount()>0){
      $sponsor=$sponsor->fetch();

      if(isset($_POST['submit'])){
        $_POST['sponsor']['sid']=$val;
        $sponsorClass->update($_POST['sponsor'], 'sid');
        header("Location:../sponsors/editsuccess");
      }

      if(isset($_POST['submitBanner'])){
        $_POST['sponsor']['sid']=$val;
        removeSponsorBanner($val);
        $target_dir = "resources/images/sponsors/";
        $target_file = $target_dir.microtime(true).'-Banner-'.basename($_FILES["bannerImg"]["name"]);
        $target_file = str_replace(' ', '_', $target_file);
        move_uploaded_file($_FILES["bannerImg"]["tmp_name"], $target_file);
        $_POST['sponsor']['sbanner']=$target_file;
        $sponsorClass->save($_POST['sponsor'], 'sid');
        header("Location:../sponsors/edisuccess");
      }

      $link='/ZooAssignment/public/ManageSponsorships/deleteSponsor/'.$val;
      if(checkSponsorContainsSponsorships($val))
        $link = false;
      $message = ($link==false)?"This sponsor contains sponsorships and cannot be deleted.":"";
      $template = '../app/views/adminDash/modal.php';
      $modal = loadTemplate($template, ['type'=>'Sponsor', 'link'=>$link, 'message'=>$message]);

      $template = '../app/views/adminDash/sponsors/editSponsor.php';
      $content = loadTemplate($template, ['sponsor'=>$sponsor, 'modal'=>$modal]);
      $title = "Dashboard - View Sponsor";
      $breadcrumbContent=["ManageSponsorships/sponsors"=>"Sponsors", "ManageSponsorships/browseSponsor"=>"View Sponsor"];
      $role=['Administrator','Moderator'];
      $bodyTitle="Edit Sponsor";
      require_once "../app/controllers/adminLoadView.php";
    }
  }


  public function deleteSponsor($val=""){
    $sponsorClass = new DatabaseTable('sponsors');
    $sponsor = $sponsorClass->find('sid', $val);
    if($sponsor->rowCount()>0){
      removeSponsorBanner($val);
      $sponsorClass->delete('sid', $val);
      header("Location:../sponsors/deletesuccess");
    }
    else{
      header("Location:../sponsors/nosuchsponsor");
    }
  }


// ------------------------------------------ End ------------------------------------------

}

?>
