<?php
require_once("../Plantilla/ValidateSession.php");
require_once("../Plantilla/header.php");

require_once("../../Modelos/Connection.php");
require_once("../../Modelos/Request.php");
require_once("../../Controladores/RequestController.php");

$id = $_SESSION['ID'];

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
		<h2>Solicitudes</h2>

		<div>
			<table id="request" class="table table-striped table-hover card-text" style="text-align: center;">
				<thead>
					<tr>
						<th>Libro</th>
						<th>Fecha solicitud</th>
						<th>Estado solicitud</th>
						<th>Estado prestamo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						index($id);
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
require_once("../Plantilla/footer.php");
?>

<script>
	$(function() {

		var requestTable = $('#request').DataTable({
			"language": {
				"url": "../../Publico/lib/DataTables/Spanish.json"
			}
		});
	});

	$(document).on("click", "#show", function() {
		var nit = $(this).data("nit");
		var parametros = '&nit=' + nit;

		$('#ContentModal').load('show?' + parametros, function() {});
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

</script>