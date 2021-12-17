<?php

require_once "../Modelos/Connection.php";
require_once "../Modelos/Book.php";

$dir_subida = '../Publico/img/Admin/libros/';
date_default_timezone_set('America/Bogota');


if (isset($_REQUEST['option'])) {
    $option = $_REQUEST['option'];

    if ($option == 'create') {
        $horario = date('y_m_d_H_i_s_');
        foreach ($_REQUEST as $var => $val) {
            $$var =  $val;
        }

        // tamaño de la imagen
        if ($_FILES['foto']['size'] < 10000000) {
            // extension de la imagen
            $ext = explode(".", $_FILES['foto']['name']);
            if (strtolower($ext[1]) == "png" || strtolower($ext[1] == "jpg") || strtolower($ext[1] == "jpeg") || strtolower($ext[1] == "tif")) {
                $fichero_subido = $dir_subida . $horario . basename($_FILES['foto']['name']);
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $fichero_subido)) {
                    create($createSelectType, $copias, $nombre, $autor, $descripcion, $fichero_subido);
                } else {
                    $error = "No se pudo almacenar";
                    header('Location: ../Vistas/Libros/principal.php?error=' . $error . '');
                }
            } else {
                $error = "La archivo no es permitido, las extensiones permitidas son: png, jpg, jpeg y tif";
                header('Location: ../Vistas/Libros/principal.php?error=' . $error . '');
            }
        } else {
            $error = "El archivo es demasiado grande";
            header('Location: ../Vistas/Libros/principal.php?error=' . $error . '');
        }
    }


    if ($option == 'edit') {
        $horario = date('y_m_d_H_i_s_');
        foreach ($_REQUEST as $var => $val) {
            $$var =  $val;
        }

        // tamaño de la imagen
        if ($_FILES['foto']['size'] < 10000000) {
            // extension de la imagen
            $ext = explode(".", $_FILES['foto']['name']);
            if (strtolower($ext[1]) == "png" || strtolower($ext[1] == "jpg") || strtolower($ext[1] == "jpeg") || strtolower($ext[1] == "tif")) {
                $fichero_subido = $dir_subida . $horario . basename($_FILES['foto']['name']);
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $fichero_subido)) {
                    update($id, $editSelectType, $copias, $nombre, $autor, $descripcion, $fichero_subido);
                } else {
                    $error = "No se pudo almacenar";
                    header('Location: ../Vistas/Libros/principal.php?error=' . $error . '');
                }
            } else {
                $error = "La archivo no es permitido, las extensiones permitidas son: png, jpg, jpeg y tif";
                header('Location: ../Vistas/Libros/principal.php?error=' . $error . '');
            }
        } else {
            $error = "El archivo es demasiado grande";
            header('Location: ../Vistas/Libros/principal.php?error=' . $error . '');
        }

        
    }
}

function create($createSelectType, $copias, $nombre, $autor, $descripcion, $foto)
{
    $book = new Book();
    $result = $book->create($createSelectType, $copias, $nombre, $autor, $descripcion, $foto);
    if ($result == true) {
        $response = "Libro creado correctamente";
        header('Location: ../Vistas/Libros/principal.php?respuesta=' . $response . '');
    } else {
        $error = "Error al crear el Libro";
        header('Location: ../Vistas/Libros/principal.php?error=' . $error . '');
    }
}

function update($id, $editSelectType, $copias, $nombre, $autor, $descripcion, $foto)
{
    $book = new Book();
    $result = $book->update($id, $editSelectType, $copias, $nombre, $autor, $descripcion, $foto);
    if ($result == true) {
        $response = "Libro actualizado correctamente";
        header('Location: ../Vistas/Libros/principal.php?respuesta=' . $response . '');
    } else {
        $error = "Error al actualizar el Libro";
        header('Location: ../Vistas/Libros/principal.php?error=' . $error . '');
    }
}
