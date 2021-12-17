<?php @session_start();
  require_once "../Modelos/Connection.php";
  require_once "../Modelos/User.php";
  require_once "../Controladores/UserController.php";


  if(isset($_REQUEST['option'])){
    $option = $_REQUEST['option'];

    if($option == 'change'){
      foreach ($_REQUEST as $var => $val){$$var =  $val;} //obtener todos los datos provenientes del formulario
      updatePassword($id, $newPassword);
    }
  }
?>

<div class="modal-header">
  <h4 id="" class="modal-title">Cambio de contraseña</h4>
  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
  <form id="changePasswordForm" class="form-horizontal">
    <div class="form-group">
      <label class="form-control-label">Nueva contraseña</label>
      <input type="password" placeholder="Nueva contraseña" class="form-control" id="newPassword" name="newPassword">
    </div>
    <div class="form-group">
      <label class="form-control-label">Repita la contraseña</label>
      <input type="password" placeholder="Contraseña" class="form-control" id="newPassword2" name="newPassword2">
    </div>

    <input type="text" name="option" id="option" style="display:none;" value="change"></button>

    <input type="text" name="id" id="id" style="display:none;" value="<?php echo $_SESSION['ID']; ?>"></button>
  </form>
</div>
<div class="modal-footer">
  <button type="button" data-dismiss="modal" class="btn btn-secondary" id="close">Close</button>
  <button type="submit" class="btn btn-primary" id="save">Actualizar</button>
</div>

<script>
  $(function () {
    $('#save').on("click", function (event) {
      event.preventDefault();
      if (validateForm()) {
        var parameters = $('#changePasswordForm').serialize();
        // alert(parameters);
        $.ajax({
          url: "../Opciones.php",
          type: "POST",
          data:parameters,
          success: function () {
            swal("Contraseña actualizada", {
              icon: "success",
              timer: 1500,
              button: false,
            });
            $('#close').click();
          }
        });
      }
    });
  });

  function validateForm() {
    if($('#newPassword').val() == ""){
      swal("Ingrese una contraseña", {
        icon: "warning",
        timer: 1500,
        button: false,
        });
      $('#newPassword').focus();
      return false;
    }

    if($('#newPassword2').val() == ""){
      swal("Repita la contraseña", {
        icon: "warning",
        timer: 1500,
        button: false,
        });
      $('#newPassword2').focus();
      return false;
    }

    var pass1 = $('#newPassword').val().trim();
    var pass2 = $('#newPassword2').val().trim();

    if(pass1.length < 6){
      swal("La contraseña es muy corta", {
        icon: "warning",
        timer: 1500,
        button: false,
        });
      $('#newPassword').focus();
      return false;
    }

    if(pass1 == pass2){
      return true;
    }else {
      swal("Las contraseñas no coinciden", {
        icon: "warning",
        timer: 1500,
        button: false,
      });
    }
  }
</script>
