<?php
  /**
  * Clase de creacion, validacion y eliminacion de las sesiones de usuario
  */

  class Session{

    /**
     * Metodo para el login
     */
    public function login($documento, $password){
      $model = NEW Connection();
      $connection = $model->getConnection();
      $sql = "SELECT * FROM usuarios
              WHERE documento = :documento";
      $statement = $connection->prepare($sql);
      $statement->bindParam(':documento', $documento);

      if(!$statement){
        $response = array('type' => 'error', 'value' => 'No se pudo ejecutar la consulta');
        return $response;
        // return false;
      }else{
        $statement->execute();
        $result = $statement->fetch();
        if($result !== false){
          if(password_verify($password, $result['password'])){
            session_start();
            $_SESSION["AUTH"] = "YES";
            $_SESSION["NOMBRE"] = $result['nombres'];
            $_SESSION["APELLIDO"] = $result['apellidos'];
            $_SESSION["TIPO"] = $result['tipo'];
            $_SESSION["DOCUMENTO"] = $result['documento'];
            $_SESSION['CORREO'] = $result['email'];
            $_SESSION['ID'] = $result['id'];
            // return true;
            $response = array('type' => 'success');
            return $response;
          }else{
            $response = array('type' => 'error', 'value' => 'Contraseña incorrecta');
            return $response;
            // return false;
          }
        }else{
          $response = array('type' => 'error', 'value' => 'Usuario o contraseña incorrectos');
          return $response;
          // return false;
        }
      }
    }

    /**
     * Metodo para la validacion de la session
     */
    public function security(){
      @session_start();
      if($_SESSION["AUTH"] != "YES"){
        return false;
      }else{
        return true;
      }
    }

    /**
     * Metodo para la eliminacion de la session
     */
    public function exit(){
      @session_start();
      session_unset();
      session_destroy();
    }


  }


 ?>
