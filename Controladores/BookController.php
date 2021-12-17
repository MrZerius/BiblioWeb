<?php

function index(){
  $book = new Book();
  $listBook = $book->index();
  if ($listBook != FALSE) {
    foreach ($listBook as $book) {
      echo "
      <div class='card col-md-3' style='width: 18rem;'>
        <img class='card-img-top' src='../../../admin/admin../".$book['foto']."' alt='".$book['nombre']."' width='100px' height='150px'>
        <div class='card-body'>
          <h5 class='card-title'>".$book['nombre']."</h5>
          <p class='card-text'>".$book['descripcion']."</p>
          <a href='#' class='btn btn-primary' id='solicitar'  data-nit='".$book['id']."' data-toggle='modal' data-target='#ModalContainer' >Solicitar</a>
        </div>
      </div>
      ";
    }
  }
}

function show($id){
  $book = New Book();
  $result = $book->show($id);
  foreach($result as $book){
    echo '
      <div class="form-group row">
          <label class="col-sm-3 form-control-label">Nombre</label>
          <div class="col-md-9">
              <input type="text" class="form-control form-control-warning" readonly value="'.$book['nombre'].'"> 
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-3 form-control-label">Descripcion</label>
          <div class="col-md-9">
              <input type="text" class="form-control form-control-warning" readonly value="'.$book['descripcion'].'">
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-3 form-control-label">Foto</label>
          <div class="col-md-9">
            <img class="img-responsive" width="100px" src="../../../admin/admin../'.$book['foto'].'" alt="'.$book['nombre'].'">
          </div>
      </div>

      <input type="text" value="'.$book['copias'].'" id="copiasLibro" name="copiasLibro" hidden>
    ';
  }
}

function createSolicitud($id_usuario, $id_material_bibliografico, $fecha_solicitud){
  $book = New Book();
  $result = $book->createSolicitud($id_usuario, $id_material_bibliografico, $fecha_solicitud);
}