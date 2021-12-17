<?php
require_once("../../Modelos/Connection.php");
require_once("../../Modelos/Prestamo.php");
require_once("../../Controladores/PrestamoController.php");


if (isset($_REQUEST['nit'])) {
    $id = $_REQUEST['nit'];
}
?>


<div class="modal-header">
    <h4 id="" class="modal-title">Informacion Prestamos</h4>
    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">

    <?php showInfoRequest($id) ?>

 
</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-secondary" id="close">Cerrar</button>
    <button type="submit" class="btn btn-primary" id="save">Actualizar</button>
</div>