<?php

  // Carga los datos iniciales
  function index($id){
    $request = NEW Request();
    $listRequest = $request->index($id);
    if($listRequest != FALSE){
      foreach ($listRequest as $request) {
        echo "<tr>";
        echo "<td>".$request['nombreLibro']."</td>";
        echo "<td>".$request['fecha_solicitud']."</td>";
        echo "<td>".$request['estado']."</td>";
        echo "<td>".$request['estadoPrestamo']."</td>";
        echo "<td>
            <div class='btn-group' role='group'>
              <button type='button' class='btn btn-primary' id='show'  data-nit='".$request['idSolicitud']."' data-toggle='modal' data-target='#ModalContainer'><i class='fa fa-search'></i></button>
            </div>
          </td>";
        echo "</tr>";
      }
    }
  }

  function show($id){
    $request = New Request();
    $listRequest = $request->show($id);
    foreach($listRequest as $request){
      echo '
        <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nombre libro</label>
            <div class="col-md-9">
                <input type="text" class="form-control form-control-warning" readonly value="'.$request['nombre'].'">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 form-control-label">Autor</label>
            <div class="col-md-9">
                <input type="text" class="form-control form-control-warning" readonly value="'.$request['autor'].'">
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-3 form-control-label">Fecha prestamno</label>
            <div class="col-md-9">
                <input type="date" class="form-control form-control-warning" readonly value="'.$request['fecha_solicitud'].'">
            </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Fecha inicio</label>
          <div class="col-md-9">
              <input type="date" class="form-control form-control-warning" readonly value="'.$request['fecha_inicio'].'">
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-3 form-control-label">Fecha fin</label>
          <div class="col-md-9">
              <input type="date" class="form-control form-control-warning" readonly value="'.$request['fecha_fin'].'">
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-3 form-control-label">Estado Prestamo</label>
          <div class="col-md-9">
              <input type="text" class="form-control form-control-warning" readonly value="'.$request['estadoPrestamo'].'">
          </div>
      </div>
    ';
    }
  }