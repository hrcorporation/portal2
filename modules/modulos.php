<?php
/**
 * Habilitar enlaces para los modulos de la remiweb; 
 */
if (is_array($array_rol_user =  $login->get_rol_tercero($_SESSION['id_usuario']))) :
?>
    <!--- ============================MODULO BATCHES============================================= -->
    <?php
    $modulos = array(1, 7, 8, 14, 20, 22, 29); // Array de roles para habilitar roles
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
    $modulos = array(1, 7, 8, 14, 20, 22, 29); // Array de roles para habilitar roles
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



<?php

endif; // Fin de la Validacion traer rol del array
?>




<?php
/////////////////////////////////////////////////////////////////////
switch ($rol_user) {
    case 1:
    case 8:
    case 14:
        //case 26:
?>
        <div class="col-4" id="">
            <div class="small-box bg-info ">
                <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-warning">
                        proximamente
                    </div>
                </div>
                <div class="inner">
                    <h3>Cartera</H3>
                </div>
                <div class="icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <a class="small-box-footer disabled" href="#">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
/////////////////////////////////////////////////////////////////////
?>

<?php
//////////////////////////////////////////////////////////
switch ($rol_user) {
    case 1:
    case 7:
    case 8:
    case 12:
    case 13:
    case 14:
    case 20:

?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Clientes</H3>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <a class="small-box-footer" href="clientes/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
<?php
        break;
}
/////////////////////////////////////////////////////////7777
?>

<?php
//////////////////////////////////////////////////////////////////////
switch ($rol_user) {
    case 1:
    case 5:
?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>FUNCIONARIOS</H3>
                </div>
                <div class="icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <a class="small-box-footer" href="empleados/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
//////////////////////////////////////////////////////////////
?>
<?php
//////////////////////////////////////////////////
switch ($rol_user) {
    case 26:
    case 1:
    case 27:
    case 20:
    case 22:
    case 19:


?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Facturacion</H3>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <a class="small-box-footer" href="facturae/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
//////////////////////////////////////////////////
?>
<?php

switch ($rol_user) {
    case 1:
    case 12:
    case 13:

?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Lista de Precios</H3>
                </div>
                <div class="icon">
                    <i class="fas fa-truck-moving"></i>
                </div>
                <a class="small-box-footer" href="PrecioProducto/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
?>

<?php

switch ($rol_user) {
    case 1:
    case 8:
    case 12:
    case 13:
    case 14:
    case 29:
    case 20:
?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Obras</H3>
                </div>
                <div class="icon">
                    <i class="fas fa-building"></i>
                </div>
                <a class="small-box-footer" href="obra/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
?>

<?php

switch ($rol_user) {
    case 1:
    case 9:
?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Productos</H3>
                </div>
                <div class="icon">
                    <i class="fas fa-truck-moving"></i>
                </div>
                <a class="small-box-footer" href="Productos/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
?>
<?php

switch ($rol_user) {
    case 1:
    case 15:
    case 16:
    case 22:
?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-warning">
                        proximamente
                    </div>
                </div>
                <div class="inner">
                    <h3>Programacion</H3>
                </div>
                <div class="icon">
                    <i class="far fa-list-alt"></i>
                </div>
                <a class="small-box-footer" href="programacion/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
?>
<?php

switch ($rol_user) {
    case 1:
?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-warning">
                        proximamente
                    </div>
                </div>
                <div class="inner">
                    <h3>Recaudos</H3>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill"></i>
                </div>
                <a class="small-box-footer" href="#">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
?>
<?php

switch ($rol_user) {
    case 1:
    case 8:
    case 9:
    case 10:
    case 11:
    case 15:
    case 16:
    case 19:
    case 20:
    case 22:
    case 26:
    case 27:
    case 29:



?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Remi Web</H3>
                </div>
                <div class="icon">
                    <i class="fas fa-atlas"></i>
                </div>
                <a class="small-box-footer" href="datos_remisiones/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
?>

<?php

switch ($rol_user) {
    case 1:
    case 8:
    case 15:
    case 16:
    case 19:
    case 20:
    case 22:
    case 26:
    case 27:
    case 29:
?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Remisiones</H3>
                </div>
                <div class="icon">
                    <i class="far fa-image"></i>
                </div>
                <a class="small-box-footer" href="remisiones/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
?>




<?php
//////////////////////////////////////////////////
switch ($rol_user) {
    case 1:
    case 8:
    case 20:

?>
        <div class="col-4" id="">
            <div class="small-box bg-info">

                <div class="inner">
                    <h3>Vehiculos</H3>
                </div>
                <div class="icon">

                    <i class="fas fa-truck-moving"></i>
                </div>
                <a class="small-box-footer" href="vehiculos/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
//////////////////////////////////////////////////
?>

<?php
//////////////////////////////////////////////////
switch ($rol_user) {
    case 1:
    case 8:
        //case 20:

?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-warning">
                        proximamente
                    </div>
                </div>
                <div class="inner">
                    <h3>Cotizaciones</H3>
                </div>
                <div class="icon">

                    <i class="fas fa-truck-moving"></i>
                </div>
                <a class="small-box-footer" href="cotizaciones/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
//////////////////////////////////////////////////
?>



<?php
//////////////////////////////////////////////////
switch ($rol_user) {
    case 1:
    case 8:
    case 12:
    case 13:
    case 14:
    case 15:
    case 16:
    case 19:
        //case 20:

?>
        <div class="col-4" id="">
            <div class="small-box bg-info">

                <div class="inner">
                    <h3>Usuarios clientes</H3>
                </div>
                <div class="icon">

                    <i class="fas fa-truck-moving"></i>
                </div>
                <a class="small-box-footer" href="usuarios_clientes/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
//////////////////////////////////////////////////
?>

<?php
//////////////////////////////////////////////////
switch ($rol_user) {
    case 1:
    case 5:

        //case 20:

?>
        <div class="col-4" id="">
            <div class="small-box bg-info">
                <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-warning">
                        proximamente
                    </div>
                </div>
                <div class="inner">
                    <h3>Votaciones</H3>
                </div>
                <div class="icon">

                    <i class="fas fa-truck-moving"></i>
                </div>
                <a class="small-box-footer" href="votaciones/">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

<?php
        break;
}
//////////////////////////////////////////////////
?>