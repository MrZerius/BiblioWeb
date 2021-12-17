<?php
require_once("../Plantilla/ValidateSession.php");
require_once("../Plantilla/header.php");
require_once("../Plantilla/menu.php");

require_once("../../Modelos/Connection.php");
require_once("../../Modelos/Prestamo.php");
require_once("../../Controladores/PrestamoController.php");

if (isset($_REQUEST['option'])) {
	$option = $_REQUEST['option'];

	if ($option == 'editPrestamo') {
		foreach ($_REQUEST as $var => $val) {
			$$var =  $val;
		}
		updatePrestamo($idSolicitud, $estadoPrestamo, $estadoSolicitud, $fecha_inicio, $fecha_fin);
	}
}

?>
<div class="page-holder w-100 d-flex flex-wrap">
	<!-- Contenedor dinamico -->
	<section class="container-fluid py-5">
		<div id="contenedor">
			<div class="card">
				<div class="card-header">
					<h2 class="h6 text-uppercase mb-0">Prestamos</h2>
				</div>
				<div class="card-body">
					<div class="chart-holder">
						<table id="request" class="table table-striped table-hover card-text" style="text-align: center;">
							<thead>
								<th>Documento</th>
								<th>Libro</th>
								<th>Fecha solicitud</th>
								<th>Fecha inicio</th>
								<th>Fecha fin</th>
								<th>Estado prestamo</th>
								<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
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

			var requestTable = $('#request').DataTable({
				"language": {
					"url": "../../Publico/lib/DataTables/Spanish.json"
				}
			});
		});

		$(document).on("click", "#edit", function() {
			var nit = $(this).data("nit");
			var parametros = '&nit=' + nit;

			$('#ContentModal').load('edit?' + parametros, function() {});
		});

		$(document).on("click", "#show", function() {
			var nit = $(this).data("nit");
			var parametros = '&nit=' + nit;

			$('#ContentModal').load('show?' + parametros, function() {});
		});
	</script>