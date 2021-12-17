<?php

  // Hace llamado al metodo de creacion de usuarios
  function store($tipo, $nombre, $apellido, $documento, $email, $password){
    $user = NEW User();
    $result = $user->store($tipo, $nombre, $apellido, $documento, $email, $password);
  }

  // Actualiza la contraseña del usuario
  function updatePassword($id, $password){
    $user = new User();
    $result = $user->updatePassword($id, $password);
  }

?>
