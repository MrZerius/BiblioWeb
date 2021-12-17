<?php
    require_once ("../usuarios/Vistas/Plantilla/header.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crear usuario</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <!--<link href="Publico/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->


    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   
   
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    
    
    <!-- orion icons-->
    <link rel="stylesheet" href="Publico/css/orionicons.css">
    
    
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="Publico/css/style.default.css" id="theme-stylesheet">
    
    
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="Publico/css/custom.css">
    
    
    <!-- Favicon-->
    <link rel="shortcut icon" href="Publico/img/Admin/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>

    <?php
      require_once "Modelos/Connection.php";
      require_once "Modelos/User.php";
      require_once "Controladores/UserController.php";


      if(isset($_POST['option'])){
        $option = $_POST['option'];
        if($option == 'create'){
          foreach ($_REQUEST as $var => $val){$$var =  $val;} //obtener todos los datos provenientes del formulario

          store($tipo, $nombre, $apellido, $documento, $email, $password);
        }
      }
     ?>


    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="../usuarios/publico/img/index/cotecnova.png" alt="" class="img-fluid" width="500"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <!-- <h1 class="text-base text-primary text-uppercase mb-4">Bubbly Dashboard</h1> -->
            <h2 class="mb-4">Registro</h2>

            <form id="registryForm" class="mt-4" method="post" action="registry">
              <div class="form-group mb-4">
                <input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="text" name="apellido" id="apellido" placeholder="apellido" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="number" name="documento" id="documento" placeholder="documento" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="email" name="email" id="email" placeholder="Correo electronico" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control border-0 shadow form-control-lg text-violet">
              </div>
              <input type="text" name="option" id="option" style="display:none;" value="create"></button>
              <input type="text" name="tipo" id="tipo" style="display:none;" value="2"></button>
              <button id="login" type="submit" class="btn btn-success shadow px-5">Registrarse</button>
            </form>
          </div>
        </div>
        <!--<p class="mt-5 mb-0 text-gray-400 text-center">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a> & Your company</p>-->
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="Publico/lib/jquery/jquery.min.js"></script>
    <script src="Publico/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="Publico/lib/jquery.cookie/jquery.cookie.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="Publico/js/front.js"></script>
    <script src="Publico/js/custom.js"></script>
  </body>
</html>
<?php
  require_once ("../usuarios/Vistas/Plantilla/footer.php");
?>