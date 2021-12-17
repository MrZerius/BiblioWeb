<?php
    require_once ("../Plantilla/ValidateSession.php");
    require_once ("../Plantilla/header.php");
    require_once ("../Plantilla/menu.php");
?>
      <div class="page-holder w-100 d-flex flex-wrap">
        <!-- Contenedor dinamico -->
        <section class="container-fluid py-5">
          <div id="contenedor">
            <div class="card">
            <div class="card-header">
              <h2 class="h6 text-uppercase mb-0">Biblioweb</h2>
            </div>
            <div class="card-body">
              <p class="text-gray">¡BIENVENIDO!</p>
              <div class="chart-holder">
              Bienvenido admin, en la parte izquierda encontrara un menu con las acciones que puede realizar.Contara con la informacion necesaria para realizar prestamos de material bibliografico.
              </div>
            </div>
          </div>
          </div>
        </section>
<?php
  require_once ("../Plantilla/footer.php");
?>
