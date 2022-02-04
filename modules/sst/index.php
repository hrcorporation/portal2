<?php include '../../layout/validar_session2.php' ?>
<?php include '../../layout/head/head2.php'; ?>
<?php include 'sidebar.php' ?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SST</h1>
                </div>
                <div class="col-sm-6">
                    <!--
                              <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Actual</li>
                              </ol> 
                                -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">MODULOS</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                            class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <!--- ============================MODULO USUARIOS CLIENTES============================================= -->
                <?php
if (is_array($array_rol_user =  $login->get_rol_tercero($_SESSION['id_usuario']))) {
    if ($login->validar_rol_user([1], $array_rol_user)) { // Validacion para habilitar el usuario
    



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
                            <h3>GESTION EPP</H3>
                        </div>
                        <div class="icon">
                            <!-- icono del Modulo -->
                            <i class="fas fa-wallet"></i>
                        </div>
                        <!-- Enlace de redireccionamiento del Modulo  -->
                        <a class="small-box-footer disabled" href="gestionepp/">
                            Ir <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
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
                            <h3>ITEMS EPP</H3>
                        </div>
                        <div class="icon">
                            <!-- icono del Modulo -->
                            <i class="fas fa-wallet"></i>
                        </div>
                        <!-- Enlace de redireccionamiento del Modulo  -->
                        <a class="small-box-footer disabled" href="itemsepp/">
                            Ir <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <?php
    }
}

?>
                <!--- ============================ FIN MODULO REMIWEBS============================================= -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include '../../layout/footer/footer2.php' ?>
<script src="ajax_crear.js"></script>


</body>

</html>