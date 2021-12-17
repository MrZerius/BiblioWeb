<?php


if(isset($_GET['out'])){
  $out = $_GET['out'];
  if($out){
    require_once "../Modelos/Connection.php";
    require_once "../Modelos/Session.php";
    validateOut();
  }
}

if (isset($_POST['documento']) && isset($_POST['password'])) {
  require_once "../Modelos/Connection.php";
  require_once "../Modelos/Session.php";

  $documento = $_POST['documento'];
  $password = $_POST['password'];

  validateUser($documento, $password);
}

  function validateUser($documento, $password){
    $session = NEW Session();
    $result = $session->login($documento, $password);

    if($result['type'] == 'success'){
      header('Location: ../Vistas/Basic/usuarios');
    }else{
      header('Location: ../index?error='.$result['value']);
    }
  }

  function validateSession(){
   $session = NEW Session();
   $result = $session->security();

   if(!$result){
     header('Location: ../../index');
   }
 
  }

  function validateOut(){
      // $session = NEW Session();
      // $session->exit();
      @session_start();
      session_unset();
      session_destroy();
      header('Location: ../index');
  }
 ?>
