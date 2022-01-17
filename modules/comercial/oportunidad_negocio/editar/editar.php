<?php include '../../../../layout/validar_session4.php' ?>
<?php include '../../../../layout/head/head4.php'; ?>
<?php include 'sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> OPORTUNIDAD DE NEGOCIO</h1>
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
                <h3 class="card-title">EDITAR OPORTUNIDAD DE NEGOCIO</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                            class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 0.5%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"> <span class=" text_progresbar">0% </span> </div>
                </div>
                <div id="contenido">
                    <form name="form_edit_op" id="form_edit_op" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value="1" name="check_habilitar_cli"
                                            id="check_habilitar_cli" ?>>
                                        <label for="check_habilitar_cli">
                                            Habilitar para modificar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4  col-sm-12">
                                <div class="form-group">
                                    <label>Numero de Documento</label>
                                    <input type="text" name="nit" id="nit" class="form-control" value=""
                                        disabled="true" />
                                </div>
                            </div>
                            <div class="col-md-4  col-sm-12">
                                <div class="form-gorup">
                                    <label>Nombre Completo</label>
                                    <input type="text" name="nombre_completo" id="nombre_completo" class="form-control"
                                        disabled="true" />
                                </div>
                            </div>
                            <div class="col-md-4  col-sm-12">
                                <div class="form-gorup">
                                    <label>Apellido Completo</label>
                                    <input type="text" name="ap_completo" id="ap_completo" class="form-control"
                                        disabled="true" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" name="crear_op" id="crear_op" class="btn btn-info"
                                    disabled="true">Actualizar</button>
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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado Visitas</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                            class="fas fa-expand"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#crear_visita">
                            Crear Visita
                        </button>
                    </div>
                </div>
                <div id="contenido">
                    <table name="table_visitas" id="table_visitas">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Fecha</th>
                                <th>Resultado </th>
                                <th>Observacion</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
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
            header('location : ../../../../cerrar.php');
        endif;

        ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="crear_visita">
    <div class="modal-dialog">
        <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Visita</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form_add_visita" id="form_add_visita" method="post">
                        <input type="hidden" name="id_cliente" id="id_clente" value="10">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Fecha</label>
                                    <input type="date" name="fecha_vist" id="fecha_vist" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="result_visit">Resultado de la Visita</label>
                                    <input type="text" name="result_vist" id="result_visit" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="obs_visit">Observaciones</label>
                                    <input type="text" name="obs_visit" id="obs_visit" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<?php include '../../../../layout/footer/footer4.php' ?>
<script>
$(document).ready(function(e) {
    $(".progress").hide();
    $('#check_habilitar_cli').click(function() {
        if (!$(this).is(':checked')) {
            $("#nit").attr('disabled', true);
            $("#nombre_completo").attr('disabled', true);
            $("#ap_completo").attr('disabled', true);
            $("#crear_op").attr('disabled', true);
        } else {
            $("#nit").attr('disabled', false);
            $("#nombre_completo").attr('disabled', false);
            $("#ap_completo").attr('disabled', false);
            $("#crear_op").attr('disabled', false);
        }
    });
});
</script>

<script>
$(document).ready(function(e) {

    function datatable_visitas(id_cliente) {
        var table = $('#table_visitas').DataTable({
            //"processing": true,
            //"scrollX": true,

            "ajax": {
                "url": "datatable_visitas.php",
                'data': {
                    'id_cliente': id_cliente,
                },
                'type': 'post',
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
                    "data": "resultado"
                },
                {
                    "data": "obs"
                },
                {
                    "data": null,
                    "defaultContent": "<button class='btn btn-warning btn-sm'> <i class='fas fa-edit'></i> Editar </button>"
                },

            ],
            'paging': false,
            'searching': false
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

        table.ajax.reload();
        return table;
    }



        if ($.fn.dataTable.isDataTable('#table_visitas')) {
            table_visitas = $('#table_visitas').DataTable();
            table_visitas.destroy();
        }
        table_visitas = datatable_visitas(10);
        setInterval(function() {
            table_visitas.ajax.reload(null, false);
        }, 5000);
    


    $("#form_add_visita").on('submit', (function(e) {
        e.preventDefault();
        $.ajax({
            url: "php_addvisita.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                const datos_errores = Object.values(data.errores);
                console.log(datos_errores);
                if (data.estado) {
                    toastr.success('visita creada exitosamente');
                } else {
                    for (let index = 0; index < datos_errores.length; index++) {
                        toastr.warning(data.errores[index]);
                    }
                }
            },
            error: function(respuesta) {
                alert(JSON.stringify(respuesta));
            },
        });
    }));
});
</script>

</body>

</html>