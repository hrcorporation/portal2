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
                    <h1>Remi Web</h1>
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
          
            $modulos = array(1,8,9,10,11,15,16,19,20,22,26,27,29); // Array de roles para habilitar roles
            if ($login->validar_rol_user($modulos, $array_rol_user)) : // Validacion para habilitar el usuario
                $t26_remisiones = new t26_remisiones();
                $php_clases = new php_clases();
                $t1_terceros = new t1_terceros();
                /**
                 * Card Body
                 */
        ?>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                            class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <?php
                $id_conductor = intval($_SESSION['id_usuario']); ?>
                <div id="contenido">
                    <table id="t_remisiones" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>Fecha</th>
                                <th>Obra</th>
                                <th>Remision</th>
                                <th>Estado</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>

                          

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>N </th>
                                <th>Fecha</th>
                                <th>Obra</th>
                                <th>Remision</th>
                                <th>Estado</th>
                                <th>Detalle</th>

                            </tr>
                        </tfoot>
                    </table>
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
            header('location : ../../cerrar.php');
        endif;

        ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include '../../layout/footer/footer2.php' ?>

<script>
$(document).ready(function() {

    var n = 1;
    var table = $('#t_remisiones').DataTable({
        //"processing": true,
        //"scrollX": true,
        "ajax": {
            "url": "data_table.php",
            "dataSrc": ""
        },
        "order": [
            [0, 'desc']
        ],
        "columns": [{
                "data": "id"
            },
            {
                "data": "fecha"
            },
            {
                "data": "nombre_obra"
            },
            {
                "data": "cod_remision"
            },
            {
                "data": "estado"
            },

            {
                "data": null,
                "defaultContent": "<button class='btn btn-warning btn-sm editar'> <i class='fas fa-edit'></i> </button> <button class='btn btn-info btn-sm ver'> <i class='fas fa-eye'></i> </button>"
            }
        ],
        //"scrollX": true,

    });
    table.on('order.dt search.dt', function() {
        table.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    $('#t_remisiones tbody').on('click', 'button.editar', function() {
        var data = table.row($(this).parents('tr')).data();
        var id = data['id'];
        var ob = data['nombre_obra'];
        
        window.location = "llenar/detalle_remision.php?id=" + id+'&ob='+ob ;
    });
    $('#t_remisiones tbody').on('click', 'button.ver', function() {
        var data = table.row($(this).parents('tr')).data();
        var id = data['id'];
        window.location = "llenar/ver_remision/remision.php?id=" + id;
    });
    setInterval(function() {
        table.ajax.reload(null, false);
    }, 10000);

});
</script>

</body>

</html>