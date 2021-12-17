<?php

class Request
{

  public function index($id){
    $model = new Connection();
    $connection = $model->getConnection();
    $sql = "SELECT *, solicitud.id as idSolicitud, nombre AS nombreLibro, nombres, apellidos FROM solicitud
                  INNER JOIN usuarios AS a ON a.id = solicitud.id_usuario
                  INNER JOIN material_bibliografico AS b on solicitud.id_material_bibliografico = b.id
                  WHERE a.id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
  }


  public function show($id){
    $model = new Connection();
    $connection = $model->getConnection();
    $sql = "SELECT *, documento, email, nombre AS nombreLibro, autor, CONCAT(nombres,' ', apellidos) as nombreEstudiante FROM solicitud
            INNER JOIN usuarios AS a ON a.id = solicitud.id_usuario
            INNER JOIN material_bibliografico AS b on solicitud.id_material_bibliografico = b.id
            WHERE solicitud.id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
  }
}
