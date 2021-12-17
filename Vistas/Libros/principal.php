<?php
require_once("../Plantilla/ValidateSession.php");
require_once("../Plantilla/header.php");
require_once("../Plantilla/menu.php");
?>

<?php

require_once "../../Modelos/Connection.php";
require_once "../../Modelos/Book.php";
require_once "../../Controladores/BookController.php";

if (isset($_REQUEST['option'])) {
  $option = $_REQUEST['option'];

  if ($option == 'delete') {
    $id = $_REQUEST['nit'];
    delete($id);
  }
}
?>


<div class="page-holder w-100 d-flex flex-wrap">
  <!-- Contenedor dinamico -->
  <section class="container-fluid py-5">
    <div id="contenedor">
      <div class="card">
        <div class="card-header">
          <h2 class="h6 text-uppercase mb-0">Gestion de Libros</h2>
        </div>
        <div class="card-body">
          <div class="row btn-group">
            <button type="button" class="btn btn-success" id="newBook" data-toggle='modal' data-target='#ModalContainer' style="margin-bottom: 10px;"><i class="fa fa-plus-circle"></i> Nuevo libro</button>
            <button type="button" class="btn btn-secondary" id="reload" onclick="autoRefresh();" style="margin-bottom: 10px;"><i class="fas fa-sync"></i> Recargar</button>
          </div>
          <div class="chart-holder">
            <table id="user" class="table table-striped table-hover card-text" style="text-align: center;">
              <thead>
                <tr>
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>Autor</th>
                  <th>Descripcion</th>
                  <th>Copias</th>
                  <th>Foto</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if (isset($_GET['respuesta'])) {
                  $res = $_GET['respuesta'];
                  echo "<div class='alert alert-success' role='alert' style='margin-top: 2%;'><fieldset>" . $res . "</fieldset></div>";
                }

                if (isset($_GET['error'])) {
                  $res = $_GET['error'];
                  echo "<div class='alert alert-warning' role='alert' style='margin-top: 2%;'><fieldset>" . $res . "</fieldset></div>";
                }
                index();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  require_once("../Plantilla/footer.php");
  ?>

  <script>
    $(function() {

      var userTable = $('#user').DataTable({
        "language": {
          "url": "../../Publico/lib/DataTables/Spanish.json"
        }
      });


      $('#newBook').on("click", function() {
        $('#ContentModal').load('create', function() {});
      });
    });

    $(document).on("click", "#show", function() {
      var nit = $(this).data("nit");
      var parametros = '&nit=' + nit;

      $('#ContentModal').load('show?' + parametros, function() {});
    });

    $(document).on("click", "#edit", function() {
      var nit = $(this).data("nit");
      var parametros = '&nit=' + nit;

      $('#ContentModal').load('edit?' + parametros, function() {});
    });

    var idclick;
    var nombreclick;

    function id_clickeado(id) {
      // console.log("id clickeada => "+id);
      idclick = id; //captura el id a la cual se le dio click
      // nombreclick=nombre;//captura el nombre a la cual se le dio click
    }

    function function_swal() {
      swal({
          title: "¿Eliminar el material bibliografico?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

            var option = 'delete';
            var parameters = '&option=' + option + '&nit=' + idclick;
            console.log(parameters);
            $.ajax({
              url: "principal",
              type: "POST",
              data: parameters,
              success: function() {
                swal("El material blbiografico fue eliminado", {
                  icon: "success",
                });
              }
            });
          } else {
            swal("El material bibliografico NO ha sido eliminado");
          }
        });
    }


    function autoRefresh() {
      location.reload();
      // $('#user').DataTable().ajax.reload();
      // console.log("recargando");
    }
  </script>