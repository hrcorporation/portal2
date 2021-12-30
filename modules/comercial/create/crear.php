<?php include '../../../layout/validar_session3.php' ?>
<?php include '../../../layout/head/head3.php'; ?>
<?php include 'sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CLIENTE</h1>
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
        <?php
        /**
         * Validacion de Usuario
         */
        if (is_array($array_rol_user =  $login->get_rol_tercero($_SESSION['id_usuario']))) :

            $modulos = array(1); // Array de roles para habilitar roles
            if ($login->validar_rol_user($modulos, $array_rol_user)) : // Validacion para habilitar el usuario
                $t1_terceros = new t1_terceros();
                
                /**
                 * Card Body
                 */
        ?>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado Oportunidades de Negocio</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                            class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div id="contenido">
                    <form name="" id="" method="post">
                        <div class="row">
                            <div class="col">
                                <label>Tipo de Documento</label>
                                <select name="tipo_doc" id="tipo_doc">
                                    <option value="CC">Cedula de ciudadania</option>
                                    <option value="NIT">Nit</option>
                                </select>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Numero de Documento</label>
                                    <input type="text" name="nit" id="nit" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-gorup">
                                    <label>Nombre Completo</label>
                                    <input type="text" name="nombre_completo" id="nombrecompleto"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <span>1</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" name="crear_op" id="crear_okp">Crear</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <?php
            else :
            ?>
        <div class="callout callout-warning">
            <h5>No posee permisos en este modulo</h5>
        </div>
        <?php
            endif;
        else :
            header('location : ../../../cerrar.php');
        endif;

        ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include '../../../layout/footer/footer3.php' ?>



</body>

</html>