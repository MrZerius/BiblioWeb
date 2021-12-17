<?php

class Prestamo
{

    public function index()
    {
        // Aprobado = 1 
        // Recibido = 3
        $estado = "Aprobado";
        $estadoPrestamo = "Recibido";
        $model = new Connection();
        $connection = $model->getConnection();
        $sql = "SELECT *, solicitud.id as idSolicitud, nombre AS nombreLibro, CONCAT(nombres, ' ' apellidos) AS nombreUsuario, documento FROM solicitud
                    INNER JOIN usuarios AS a ON a.id = solicitud.id_usuario
                    INNER JOIN material_bibliografico AS b on solicitud.id_material_bibliografico = b.id
                    WHERE solicitud.estado = :estado AND solicitud.estadoPrestamo <> :estadoPrestamo";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':estado', $estado);
        $statement->bindParam(':estadoPrestamo', $estadoPrestamo);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function show($id)
    {
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


    public function updatePrestamo($idSolicitud, $estadoPrestamo, $estadoSolicitud, $fecha_inicio, $fecha_fin)
    {

        $model = new Connection();
        $connection = $model->getConnection();

        try {
            $connection->beginTransaction();

            // Estado anterior del prestamo
            $sql = "SELECT estadoPrestamo FROM solicitud WHERE id = :idSolicitud";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':idSolicitud', $idSolicitud);
            $statement->execute();
            $estadoAnterior = $statement->fetchColumn();

            //  ID del libro
            $sql = "SELECT id_material_bibliografico FROM solicitud WHERE id = :idSolicitud";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':idSolicitud', $idSolicitud);
            $statement->execute();
            $idLibro = $statement->fetchColumn();

            // Actualizamos el estado del prestamo
            $sql = "UPDATE solicitud set estadoPrestamo = :estadoPrestamo, estado = :estadoSolicitud, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin WHERE id = :idSolicitud";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':idSolicitud', $idSolicitud);
            $statement->bindParam(':estadoPrestamo', $estadoPrestamo);
            $statement->bindParam(':estadoSolicitud', $estadoSolicitud);
            $statement->bindParam(':fecha_inicio', $fecha_inicio);
            $statement->bindParam(':fecha_fin', $fecha_fin);
            $statement->execute();

            // Obtener la cantidad del libro
            $sql = "SELECT copias FROM material_bibliografico
                      WHERE id = :idLibro";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':idLibro', $idLibro);
            $statement->execute();
            $cantidadLibro = $statement->fetchColumn();

            // Aprobado = 1 
            // Recibido = 3

            if ($estadoAnterior == 'En biblioteca' && $estadoPrestamo == 2) {
                // Estado = entregdo
                // se resta 1 libro
                $copias = $cantidadLibro - 1;

                // Actualizar el numero de copias
                $sql = "UPDATE material_bibliografico SET copias = :copias
                        WHERE id = :idLibro";
                $statement = $connection->prepare($sql);
                $statement->bindParam(':idLibro', $idLibro);
                $statement->bindParam(':copias', $copias);
                $statement->execute();
            }

            if ($estadoAnterior == 'Entregado' && $estadoPrestamo == 3) {
                // Estado = recibido
                // Se suma un libro

                $copias = $cantidadLibro + 1;

                // Actualizar el numero de copias
                $sql = "UPDATE material_bibliografico SET copias = :copias
                WHERE id = :idLibro";
                $statement = $connection->prepare($sql);
                $statement->bindParam(':idLibro', $idLibro);
                $statement->bindParam(':copias', $copias);
                $statement->execute();
            }

            $connection->commit();
        } catch (PDOException $e) {
            echo $e->getMessage();
            $connection->rollBack();
        }
    }
}
