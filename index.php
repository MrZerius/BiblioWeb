<!DOCTYPE html>
<html lang="es">

<head>
	<!-- METADATOS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Nicolas Ovalle, Alex Cardona">
	<meta name="description" content="Proyecto Integrador">

	<!-- TITULO -->
	<title>Proyecto Biblioteca</title>

	<!-- HOJAS DE ESTILO -->
	<link rel="icon" type="image/png" href="Publico/img/index/cotecnova.png" />
	<link rel="stylesheet" href="Publico/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Publico/lib/DataTables/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="Publico/css/estilos.css" />


</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-expand fixed-top" style="font-size: 10px; background-color: #FFFFFF;">
		<div class="container-fluid">
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Referidos</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Cont&aacute;ctenos</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Re&uacute;nete</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>AVACO</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>SIGYC</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>SQR Cotecnova</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Recibos de Pago</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Pol&iacute;tica de Privacidad</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Actualizaci&oacute;n RTE</b></a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg fixed-top" style="font-size: 13px; background-color: #FFFFFF; margin-top: 35px; border-top: solid #f8f8f8; border-bottom: solid #f8f8f8">
		
	<img src="../usuarios/Publico/img/index/banner.png" width="250 px"/>

		<div class="container-fluid">
			<table style="width: 100%;">
				<tr>
					<td style="width: 90%"></td>
					<td class="text-right" style="width: 10%">
						<button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbar">
							<span class="fas fa-align-center"></span>
						</button>
					</td>
				</tr>
			</table>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Inicio</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Qui&eacute;nes Somos</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Programas</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Sector Externo</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Biblioteca</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Investigaciones</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Talento Humano</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>Administrativos</b></a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link text-right">
							<a href="#"><b>SAI</b></a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br style="line-height:100px;" />

	<br>
	<div class="row text-center">
		<div class="col-md-12">
			<br style="line-height:50px;" />

			<br>
			<br>

		</div>
		<div class="col-md-4 offset-md-4">
			<div class="contenido">
				<img src="Publico/img/index/consultar.jpg" width="50%" height="50%" />
				<br /><br />

				<form id="loginForm" class="mt-4" method="post" action="Controladores/SessionController">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Usuario</span>
						</div>
						<input type="text" class="form-control" id="documento" name="documento" />
					</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Contraseña</span>
						</div>
						<input type="password" class="form-control" id="password" name="password" />
					</div>

					<button id="login" type="submit" class="btn btn-primary shadow px-5">Ingresar</button>
				</form>

			</div>
		</div>
	</div>
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
          <button id="login" type="submit" class="btn btn-primary mt-5 shadow px-5">Ingresar</button>
				</div>
      </form>
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

	<!-- SCRIPTS NECESARIOS -->
	<script src="Publico/lib/jquery/jquery.min.js"></script>
	<script src="Publico/lib/popper.js/umd/popper.min.js"> </script>
	<script src="Publico/lib/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Publico/lib/DataTables/datatables.min.js"></script>
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