<?php

  class Login extends Controller{

    public function index(){
      session_start();
      if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']['ustatus']=="Active"){
          header("Location: /ZooAssignment/public/Dashboard");
      }
      $userClass = new DatabaseTable('users');
      $users  = $userClass->findAll();
      $loginText = "";
      if(isset($_POST['submit'])){
        $flag = false;
        while($user = $users->fetch()) {
          if($user['uid']==$_POST['id']){
            if(password_verify($_POST['password'], $user['upassword'])){
              if($user['ustatus']=="Active"){
                $_SESSION['loggedin']=$user;
                $flag = true;
                header("Location: /ZooAssignment/public/Dashboard");
              }
            }
          }
        }
        if(!$flag)
          $loginText = "<font style = 'color:red;'>Wrong ID or Password!</font>";
      }
      $fileName = '../app/templates/LoginTemplate.php';
      $content = loadTemplate($fileName, ['loginText'=>$loginText]);
      $this->view($content);
      }


  }

 ?>
