<?php

  class Login extends Controller{

    public function index(){
      session_start();
      if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']['ustatus']=="Y"){
        if($_SESSION['loggedin']['urole']=="Administrator"){
          header("Location: /ZooAssignment/public/AdminHome");
        }
        else {
          header("Location: /ZooAssignment/public/StudentHome");
        }

      }
      header("Location: /ZooAssignment/public/Home");

      $fileName = '../app/templates/LoginTemplate.php';
      $content = loadTemplate($fileName, ['loginText'=>$loginText]);

      $this->view($content);

      }


  }

 ?>
