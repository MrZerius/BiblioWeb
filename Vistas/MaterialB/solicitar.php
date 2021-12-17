<?php

require_once('../../Modelos/Connection.php');
require_once('../../Modelos/Book.php');
require_once('../../Controladores/BookController.php');

if (isset($_REQUEST['nit'])) {
    $id = $_REQUEST['nit'];
}
?>

<div class="modal-header">
    <h4 id="" class="modal-title">Solicitar</h4> 

    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">


    <?php 
        show($id);
    ?>

    <form class="form-horizontal" id="createRequest" name="createRequest">

        <div class="form-group row">
            <label class="col-sm-3 form-control-label">Fecha Solicitd</label>
            <div class="col-md-9">
                <input id="fechaSolicitud" name="fechaSolicitud" type="date" class="form-control form-control-warning" required>
            </div>
        </div>

        <input id="option" name="option" hidden value="create">
        <input id="idLibro" name="idLibro" hidden value="<?php echo $id ?>">
    </form>

</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-secondary" id="close">Cerrar </button>
    <button type="button" class="btn btn-success" id="save">Guardar</button>
</div>



<script>
    $(function() {

        if ($('#copiasLibro').val() <= 1 ) {
            swal("No hay libros suficientes", {
                icon: "warning",
                timer: 1500,
                button: false,
            });
            $('#save').attr('disabled', 'disabled');
            return false;
        }

        $('#save').on("click", function(event) {
            event.preventDefault();
            if (validateForm()) {
                var parameters = $('#createRequest').serialize();
                // alert(parameters);
                $.ajax({
                    url: "principal",
                    type: "POST",
                    data: parameters,
                    success: function() {
                        $('#close').click();
                        setTimeout(function() {
                            swal("Almacenado correctamente", {
                                icon: "success",
                            });
                        }, 500);
                    }
                });
            }
        });
    });
    

    function validateForm() {

        if ($('#copiasLibro').val() <= 1 ) {
            swal("No hay libros suficientes", {
                icon: "warning",
                timer: 1500,
                button: false,
            });
            $('#save').attr('disabled', 'disabled');
            return false;
        }

        if ($('#fechaSolicitud').val() == "") {
            swal("Seleccione una fecha", {
                icon: "warning",
                timer: 1500,
                button: false,
            });
            $('#fechaSolicitud').focus();
            return false;
        }

        // var nick = $('#nickname').val().trim();
        // if(nick.length < 5 ){
        //   swal("El nombre de usuario es muy corto", {
        //     icon: "warning",
        //      timer: 1500,
        //      button: false,
        //     });
        //   $('#nickname').focus();
        //   return false;
        // }

        return true;

    }
</script>