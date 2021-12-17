<?php

// Carga los datos iniciales
function index()
{
  $request = new Prestamo();
  $listRequest = $request->index();
  if ($listRequest != FALSE) {
    foreach ($listRequest as $request) {
      echo "<tr>";
      echo "<td>" . $request['documento'] . "</td>";
      echo "<td>" . $request['nombreLibro'] . "</td>";
      echo "<td>" . $request['fecha_solicitud'] . "</td>";
      echo "<td>" . $request['fecha_inicio'] . "</td>";
      echo "<td>" . $request['fecha_fin'] . "</td>";
      echo "<td>" . $request['estadoPrestamo'] . "</td>";
      echo "<td>
            <div class='btn-group' role='group'>

            <button type='button' class='btn btn-primary' id='show'  data-nit='" . $request['idSolicitud'] . "' data-toggle='modal' data-target='#ModalContainer'><i class='fa fa-search'></i></button>

             <button type='button' class='btn btn-warning' id='edit'  data-nit='" . $request['idSolicitud'] . "' data-toggle='modal' data-target='#ModalContainer'><i class='fa fa-edit'></i></button>

            </div>
          </td>";
      echo "</tr>";
    }
  }
}
 

// SHOW de prestamos de administrador
function showInfoRequest($id){
  $request = new Prestamo();
  $result = $request->show($id);
  foreach ($result as $request) {

    echo '
      <div class="form-group row">
          <label class="col-sm-3 form-control-label">Documento</label>
          <div class="col-md-9">
              <input type="text" class="form-control form-control-warning" readonly value="'.$request['documento'].'"> 
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-3 form-control-label">Nombre estudiante</label>
          <div class="col-md-9">
              <input type="text" class="form-control form-control-warning" readonly value="'.$request['nombreEstudiante'].'">
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-3 form-control-label">Correo estudiante</label>
          <div class="col-md-9">
              <input type="text" class="form-control form-control-warning" readonly value="'.$request['email'].'">
          </div>
      </div>

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

    <div class="form-group row">
        <label class="col-sm-3 form-control-label">Estado Solicitud</label>
        <div class="col-md-9">
            <input type="text" class="form-control form-control-warning" readonly value="'.$request['estado'].'">
        </div>
    </div>


     
    ';
  }
}

function formEditPrestamo($id){
  $request = new Prestamo();
  $result = $request->show($id);
  foreach ($result as $request) {

    echo '
    

    <div class="form-group row">
        <label class="col-sm-3 form-control-label">Fecha Incio</label>
        <div class="col-md-9">
            <input name="fecha_inicio" id="fecha_inicio" type="date" class="form-control form-control-warning" required value="'.$request['fecha_inicio'].'" >
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 form-control-label">Fecha Fin</label>
        <div class="col-md-9">
            <input name="fecha_fin" id="fecha_fin" type="date" class="form-control form-control-warning" required value="'.$request['fecha_fin'].'">
        </div>
    </div>
    ';
  }
}

function updatePrestamo($idSolicitud, $estadoPrestamo, $estadoSolicitud, $fecha_inicio, $fecha_fin){
  $request = New Prestamo();
  $result = $request->updatePrestamo($idSolicitud, $estadoPrestamo, $estadoSolicitud, $fecha_inicio, $fecha_fin);
}

