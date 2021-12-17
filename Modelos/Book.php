<?php

class Book
{

  public function index()
  {
    $model = new Connection();
    $connection = $model->getConnection();
    $sql = "SELECT * FROM material_bibliografico
            ORDER BY nombre ASC";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
  }


  public function show($id)
  {
    $model = new Connection();
    $connection = $model->getConnection();
    $sql = "SELECT * FROM material_bibliografico
                    WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
  }

  public function createSolicitud($id_usuario, $id_material_bibliografico, $fecha_solicitud)
  {
    $model = new Connection();
    $connection = $model->getConnection();

    try {
      $connection->beginTransaction();
      // Solicitudes activas
      $sql = "SELECT COUNT(*) FROM solicitud 
              INNER JOIN material_bibliografico AS a on solicitud.id_material_bibliografico = a.id
              WHERE id_usuario = :id_usuario AND a.id = :id_material_bibliografico AND estado = 'Pendiente' OR estado = 'Aprobado'";
      $statement = $connection->prepare($sql);
      $statement->bindParam(':id_usuario', $id_usuario);
      $statement->bindParam(':id_material_bibliografico', $id_material_bibliografico);
      $statement->execute();
      $cantidadSolicitudesActivas = $statement->fetchColumn();

      if ($cantidadSolicitudesActivas > 0) {
        return false;
      } else {
        $sql = "INSERT INTO solicitud(id_usuario, id_material_bibliografico, fecha_solicitud)
            VALUES (:id_usuario, :id_material_bibliografico, :fecha_solicitud)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id_usuario', $id_usuario);
        $statement->bindParam(':id_material_bibliografico', $id_material_bibliografico);
        $statement->bindParam(':fecha_solicitud', $fecha_solicitud);
        $statement->execute();
      }
      
      $connection->commit();
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      $connection->rollBack();
    }
  }
}
