<?php
  /**
   * Clase para la creacion, edicion y eliminacion de usuarios del sistema
   */
  class User{


    /**
     * Metodo para la creacion del usuario
     */
    public function store($tipo, $nombre, $apellido, $documento, $email, $password){
      $model = NEW Connection();
      $connection = $model->getConnection();
      $sql = "INSERT INTO usuarios(tipo, nombres, apellidos, documento, email, password)
              VALUES (:tipo, :nombre, :apellido, :documento, :email, :pass)";
      $statement = $connection->prepare($sql);
      $statement->bindParam(':tipo', $tipo);
      $statement->bindParam(':nombre', $nombre);
      $statement->bindParam(':apellido', $apellido);
      $statement->bindParam(':documento', $documento);
      $statement->bindParam(':email', $email);
      $passwordHash = password_hash($password, PASSWORD_BCRYPT);
      $statement->bindParam(':pass', $passwordHash);
      if(!$statement){
        return false;
      }else{
        $statement->execute();
        return true;
      }
    }



    /**
     * Metodo para busqueda del usuario (retorna los datos para el formulario de editar)
     */
    public function show($id){
      $model = NEW Connection();
      $connection = $model->getConnection();
      $sql = "SELECT * FROM usuarios
              WHERE id = :id";
      $statement = $connection->prepare($sql);
      $statement->bindParam(':id',$id);
      $statement->execute();
      $result = $statement->fetchAll();
      return $result;
    }



    /**
     * Metodo para actualizar la contraseña
     */
    public function updatePassword($id, $password){
      $model = NEW Connection();
      $connection = $model->getConnection();
      $sql = "UPDATE usuarios SET password = :password
              WHERE id = :id";

      $statement = $connection->prepare($sql);
      $passwordHash = password_hash($password, PASSWORD_BCRYPT);
      $statement->bindParam(':password', $passwordHash);
      $statement->bindParam(':id',$id);

      if(!$statement){
        return false;
      }else{
        $statement->execute();
        return true;
      }
    }

  }
 ?>

