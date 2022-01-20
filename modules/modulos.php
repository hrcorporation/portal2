<?php
/**
 * Habilitar enlaces para los modulos de la remiweb; 
 */
if (is_array($array_rol_user =  $login->get_rol_tercero($_SESSION['id_usuario']))) :
?>


<!--- ============================MODULO USUARIOS CLIENTES============================================= -->
<?php
    $modulos = array(1,26); // Array de roles para habilitar roles
    if ($login->validar_rol_user($modulos, $array_rol_user)) : // Validacion para habilitar el usuario
    ?>
<!-- Modulo HTMl -->
<div class="col-4" id="">
    <div class="small-box bg-info ">
        
        <div class="inner">
            <!-- Nombre de Modulo -->
            <h3>Facturacion</H3>
        </div>
        <div class="icon">
            <!-- icono del Modulo -->
            <i class="fas fa-wallet"></i>
        </div>
        <!-- Enlace de redireccionamiento del Modulo  -->
        <a class="small-box-footer disabled" href="facturae/">
            Ir <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<?php
    endif; // Fin de la Validacion habilitar modulo
    ?>
<!--- ============================ FIN MODULO REMIWEBS============================================= -->


<!--- ============================MODULO BATCHES============================================= -->
<?php
    $modulos = array(1); // Array de roles para habilitar roles
    if ($login->validar_rol_user($modulos, $array_rol_user)) : // Validacion para habilitar el usuario
    ?>
<!-- Modulo HTMl -->
<div class="col-4" id="">
    <div class="small-box bg-info ">
        <div class="inner">
            <!-- Nombre de Modulo -->
            <h3>Batches</H3>
        </div>
        <div class="icon">
            <!-- icono del Modulo -->
            <i class="fas fa-wallet"></i>
        </div>
        <!-- Enlace de redireccionamiento del Modulo  -->
        <a class="small-box-footer disabled" href="Batch/">
            Ir <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<?php
    endif; // Fin de la Validacion habilitar modulo
    ?>
<!--- ============================ FIN MODULO BATCHES============================================= -->
<!--- ============================MODULO EMPLEADOS============================================= -->
<?php
    $modulos = array(1); // Array de roles para habilitar roles
    if ($login->validar_rol_user($modulos, $array_rol_user)) : // Validacion para habilitar el usuario
    ?>
<!-- Modulo HTMl -->
<div class="col-4" id="">
    <div class="small-box bg-info ">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-warning">
                proximamente
            </div>
        </div>
        <div class="inner">
            <!-- Nombre de Modulo -->
            <h3>COMERCIAL</H3>
        </div>
        <div class="icon">
            <!-- icono del Modulo -->
            <i class="fas fa-wallet"></i>
        </div>
        <!-- Enlace de redireccionamiento del Modulo  -->
        <a class="small-box-footer disabled" href="comercial/">
            Ir <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<?php
    endif; // Fin de la Validacion habilitar modulo
    ?>
<!--- ============================ FIN MODULO BATCHES============================================= -->

<!--- ============================MODULO REMIIISIONES============================================= -->
<?php
    $modulos = array(1, 26); // Array de roles para habilitar roles
    if ($login->validar_rol_user($modulos, $array_rol_user)) : // Validacion para habilitar el usuario
    ?>
<!-- Modulo HTMl -->
<div class="col-4" id="">
    <div class="small-box bg-info ">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-warning">
                proximamente
            </div>
        </div>
        <div class="inner">
            <!-- Nombre de Modulo -->
            <h3>Remisiones</H3>
        </div>
        <div class="icon">
            <!-- icono del Modulo -->
            <i class="fas fa-wallet"></i>
        </div>
        <!-- Enlace de redireccionamiento del Modulo  -->
        <a class="small-box-footer disabled" href="remisiones/">
            Ir <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<?php
    endif; // Fin de la Validacion habilitar modulo
    ?>
<!--- ============================ FIN MODULO REMISIONES============================================= -->


<!--- ============================MODULO REMIWEB============================================= -->
<?php
    $modulos = array(1,26); // Array de roles para habilitar roles
    if ($login->validar_rol_user($modulos, $array_rol_user)) : // Validacion para habilitar el usuario
    ?>
<!-- Modulo HTMl -->
<div class="col-4" id="">
    <div class="small-box bg-info ">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-warning">
                proximamente
            </div>
        </div>
        <div class="inner">
            <!-- Nombre de Modulo -->
            <h3>Remi Web</H3>
        </div>
        <div class="icon">
            <!-- icono del Modulo -->
            <i class="fas fa-wallet"></i>
        </div>
        <!-- Enlace de redireccionamiento del Modulo  -->
        <a class="small-box-footer disabled" href="datos_remisiones/">
            Ir <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<?php
    endif; // Fin de la Validacion habilitar modulo
    ?>
<!--- ============================ FIN MODULO REMIWEBS============================================= -->

<!--- ============================MODULO USUARIOS CLIENTES============================================= -->
<?php
    $modulos = array(1); // Array de roles para habilitar roles
    if ($login->validar_rol_user($modulos, $array_rol_user)) : // Validacion para habilitar el usuario
    ?>
<!-- Modulo HTMl -->
<div class="col-4" id="">
    <div class="small-box bg-info ">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-warning">
                proximamente
            </div>
        </div>
        <div class="inner">
            <!-- Nombre de Modulo -->
            <h3>Usuarios Clientes</H3>
        </div>
        <div class="icon">
            <!-- icono del Modulo -->
            <i class="fas fa-wallet"></i>
        </div>
        <!-- Enlace de redireccionamiento del Modulo  -->
        <a class="small-box-footer disabled" href="usuarios_clientes/">
            Ir <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<?php
    endif; // Fin de la Validacion habilitar modulo
    ?>
<!--- ============================ FIN MODULO REMIWEBS============================================= -->




<?php

endif; // Fin de la Validacion traer rol del array
?>