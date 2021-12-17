<?php
require_once "../../Modelos/Connection.php";
require_once "../../Modelos/Book.php";
require_once "../../Controladores/BookController.php";
?>

<div class="modal-header">
  <h4 id="" class="modal-title">Crear libros</h4>
  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">


  <form class="form-horizontal" id="createBook" name="createBook" method="post" enctype="multipart/form-data" action="../../Controladores/ImgBookController.php">

    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Tipo</label>
      <div class="col-md-9">
        <select name="createSelectType" class="form-control" id="createSelectType">
          <option value="no" selected>Seleccione un tipo</option>
          <option value="1">CD</option>
          <option value="2">Libro</option>
          <option value="3">Investigación</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Copias</label>
      <div class="col-md-9">
        <input id="copias" name="copias" type="number" placeholder="1" class="form-control form-control-warning" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Nombre</label>
      <div class="col-md-9">
        <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control form-control-warning" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Autor</label>
      <div class="col-md-9">
        <input id="autor" name="autor" type="text" placeholder="Autor" class="form-control form-control-warning" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Descripcion</label>
      <div class="col-md-9">
        <textarea id="descripcion" name="descripcion" type="text" placeholder="Descripcion" class="form-control form-control-warning" required>
        </textarea>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Foto</label>
      <div class="col-md-9">
        <input id="foto" name="foto" type="file" class="form-control form-control-warning" required>
      </div>
    </div>

    <img src="" alt="">

    <input type="text" name="option" id="option" style="display:none;" value="create"></button>
    <input type="submit" value="Enviar" hidden id="saveForm">
  </form>
</div>
<div class="modal-footer">
  <button type="button" data-dismiss="modal" class="btn btn-secondary" id="close">Cerrar</button>
  <button type="button" class="btn btn-primary" id="save">Crear</button>
</div>

<script type="text/javascript">
  $(function() {
    $('#save').on("click", function(event) {
      if (validateForm()) {
        $('#saveForm').click();
      }
    });
  });

  function validateForm() {
    if ($('#createSelectType').val() == "no") {
      swal("Seleccione un tipo de material bibliografico valido", {
        icon: "warning",
        timer: 1500,
        button: false,
      });
      $('#createSelectType').focus();
      return false;
    }

    var number = $('#copias').val();
    if (number <= 0) {
      swal("La cantidad de copias no es valida", {
        icon: "warning",
        timer: 1500,
        button: false,
      });
      $('#copias').focus();
      return false;
    }

    var nombre = $('#nombre').val();
    if (nombre == '') {
      swal("Ingrese un nombre valido", {
        icon: "warning",
        timer: 1500,
        button: false,
      });
      $('#nombre').focus();
      return false;
    }

    var nombreAutor = $('#autor').val();
    if (nombreAutor == '') {
      swal("Ingrese un nombre de autor que sea valido", {
        icon: "warning",
        timer: 1500,
        button: false,
      });
      $('#autor').focus();
      return false;
    }

    if ($('#foto').val() == '') {
      swal("Seleccione una imagen", {
        icon: "warning",
        timer: 1500,
        button: false,
      });
      $('#foto').focus();
      return false;
    }

    return true;

  }
</script>