<?php
  /**
  * Conexion con la base de datos de manera local
  */

  class Connection{

    public function getConnection(){
      $user = 'root';
      $password = 'root';
      try {
        $connection = NEW PDO('mysql:host=localhost;dbname=biblioteca;charset=utf8', $user, $password);
      } catch(PDOException $e){
          echo "ERROR: " . $e->getMessage();
      }
      return $connection;
    }
  }

 ?>
