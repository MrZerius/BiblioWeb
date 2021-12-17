<br /><br />
<div class="row">
	<div class="col-md-12" style="background-color: #222222; color: #FFFFFF">
		<br /><br />
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="row">
					<div class="col-md-4">
						Corporaci&oacute;n de Estudios Tecnol&oacute;gicos del Norte del Valle.<br />
						Calle 10 # 3-95<br />
						Tels. 2111804 – 2112545<br />
						info@cotecnova.edu.co
					</div>
					<div class="col-md-4">
						<a href="#" style="color: #FFFFFF">Ministerio de Educación Nacional</a><br />
						<a href="#" style="color: #FFFFFF">ICETEX</a><br />
						<a href="#" style="color: #FFFFFF">SNIES</a><br />
						<a href="#" style="color: #FFFFFF">Fodesep</a>
					</div>
					<div class="col-md-4">
						<a href="#" style="color: #FFFFFF">Gestión Contable</a><br />
						<a href="#" style="color: #FFFFFF">Comercial y Financiera</a><br />
						<a href="#" style="color: #FFFFFF">Mercadeo y Ventas</a><br />
						<a href="#" style="color: #FFFFFF">Ciclos Profesionales</a><br />
					</div>
				</div>
			</div>
		</div>
		<br /><br />
	</div>
	<div class="col-md-12" style="background-color: #005C29; color: #FFFFFF; font-size: 11px;">
		<br />
		<div class="row">
			<div class="col-md-10 offset-md-1">
				Corporaci&oacute;n de Estudios Tecnol&oacute;gicos del Norte del Valle - Todos los Derechos Reservados. P.J. Resoluci&oacute;n No. 3712 de 1971 - Enfold Theme by Kriesi
			</div>
		</div>
		<br />
	</div>
</div>

<!-- contenedor de modales -->
<div class="modal fade" id="ModalContainer" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="ContentModal">

		</div>
	</div>
</div>


<!-- SCRIPTS NECESARIOS -->
<script src="../../Publico/lib/jquery/jquery.min.js"></script>
<script src="../../Publico/lib/popper.js/umd/popper.min.js"> </script>
<script src="../../Publico/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../Publico/lib/DataTables/datatables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script type="text/javascript" src="Publico/lib/font-awesome/.js"></script> -->

<!-- OTROS SCRIPTS -->
<script>
	$(document).ready(function() {
		$('#tabla').DataTable({
			"stateSave": true,
			"order": []
		});
	});
</script>
<script>
	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>

</body>

</html>