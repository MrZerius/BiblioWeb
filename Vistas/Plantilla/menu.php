<div class="col-md-3">
    <br style="line-height:50px;" />
    <div class="wrap-login100 p-t-190 p-b-30">
        <div class="login100-form-avatar">
            <img src="../../Publico/img/index/cotecnova.png" width="100px" alt="AVATAR" class="img-responsive">
        </div>

        <span class="login100-form-title p-t-20 p-b-45">
            <?php
            echo   $_SESSION["NOMBRE"]." ". $_SESSION["APELLIDO"];
            ?>
        </span>

        <div id="sidebar" class="sidebar py-3">
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-list-item m-4" >
                    <a href="../Basic/usuarios" id="inicio" class="sidebar-link text-muted active">
                        <i class="o-bookmark-archive-1 mr-3 text-gray"></i><span>Inicio</span>
                    </a>
                </li>
                <hr>
                <li class="sidebar-list-item m-4">
                    <a href="../MaterialB/principal" id="libros" class="sidebar-link text-muted">
                        <i class="o-profile-1 mr-3 text-gray"></i><span>Libros</span>
                    </a>
                </li>
                <hr>
                <li class="sidebar-list-item m-4">
                    <a href="../Solicitudes/principal" id="solicitudes" class="sidebar-link text-muted"><i class="o-profile-1 mr-3 text-gray"></i><span>Solicitudes</span>
                    </a>
                </li>
                <hr>
            </ul>
        </div>

        <!-- <div class="container-login100-form-btn p-t-10">
            <button class="login100-form-btn">
                Login
            </button>
        </div> -->
    </div>
</div>