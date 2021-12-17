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


    <form name="formEditPrestamo" id="formEditPrestamo">

        <div class="form-group row">
            <label class="col-sm-3 form-control-label">Estado de solicitud</label>
            <div class="col-md-9">
                <select name="estadoSolicitud" class="form-control" id="estadoSolicitud">
                    <option value="no" selected>Seleccione un tipo</option>
                    <option value="1">Aprobado</option>
                    <option value="2">Rechazado</option>
                    <option value="3">Pendiente</option>
                    <option value="4">Completado</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 form-control-label">Estado de prestamo</label>
            <div class="col-md-9">
                <select name="estadoPrestamo" class="form-control" id="estadoPrestamo">
                    <option value="no" selected>Seleccione un tipo</option>
                    <option value="1">En biblioteca</option>
                    <option value="2">Entregado</option>
                    <option value="3">Recibido</option>
                </select>
            </div>
        </div>


        <?php formEditPrestamo($id) ?>

        <input id="option" name="option" hidden value="editPrestamo">
        <input id="idSolicitud" name="idSolicitud" hidden value="<?php echo $id ?>">
    </form>

</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-secondary" id="close">Cerrar</button>
    <button type="submit" class="btn btn-primary" id="save">Actualizar</button>
</div>


<script type="text/javascript">
    $(function() {
        $('#save').on("click", function(event) {
            event.preventDefault();
            if (validateForm()) {
                var parameters = $('#formEditPrestamo').serialize();
                $.ajax({
                    url: "principal",
                    type: "POST",
                    data: parameters,
                    success: function() {
                        $('#close').click();
                        setTimeout(function() {
                            swal("Actualizado correctamente", {
                                icon: "success",
                            });
                        }, 500);
                    }
                });
            }
        });
    });

    function validateForm() {
        if ($('#estadoSolicitud').val() == "no") {
            swal("Seleccione una opcion", {
                icon: "warning",
                timer: 1500,
                button: false,
            });
            $('#estadoSolicitud').focus();
            return false;
        }
        return true;
    }

    // Validacion del select
</script>