<?php
require_once("../Plantilla/ValidateSession.php");
require_once("../Plantilla/header.php");

require_once('../../Modelos/Connection.php');
require_once('../../Modelos/Book.php');
require_once('../../Controladores/BookController.php');
?>

<?php

if (isset($_REQUEST['option'])) {
  $option = $_REQUEST['option'];

  $id = $_SESSION['ID'];

  if ($option == 'create') {
    foreach ($_REQUEST as $var => $val) {
      $$var =  $val;
    } //obtener todos los datos provenientes del formulario
    $idUsuario = $_SESSION['ID'];
    createSolicitud($idUsuario, $idLibro, $fechaSolicitud);
  }
}
?>


<br>
<br>
<br>
<div class="row text-center">

  <?php
  require_once("../Plantilla/menu.php");
  ?>

  <div class="col-md-9">
    <br style="line-height:50px;" />
    <h2>MATERIAL B</h2>
    <div class="row">
      <?php

      // if ($validar) {
      //   $res = "Solicitud realizada correctamente";
      //   echo "<div class='alert alert-success' role='alert' style='margin-top: 2%;'><fieldset>" . $res . "</fieldset></div>";
      // }else{
      //   $res = "Ya se encuentra una solicitud activa para este libro";
      //   echo "<div class='alert alert-warning' role='alert' style='margin-top: 2%;'><fieldset>" . $res . "</fieldset></div>";
      // }

      index();
      ?>
    </div>
  </div>
</div>


<?php
// require_once('../Plantilla/menu.php');
require_once("../Plantilla/footer.php");
?>

<script>
  $(document).on("click", "#solicitar", function() {
    var nit = $(this).data("nit");
    var parametros = '&nit=' + nit;

    $('#ContentModal').load('solicitar?' + parametros, function() {});
  });
</script>