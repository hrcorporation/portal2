<?php include '../../../layout/validar_session3.php' ?>
<?php include '../../../layout/head/head3.php'; ?>
<?php include 'sidebar.php' ?>


<?php 
    $php_clases = new php_clases();
    $t1_terceros = new t1_terceros(); 
    $t5_obras = new t5_obras();
  
    $id = $_GET['id'];

$datos_tercero = $t1_terceros->search_tercero_custom_id($id);

while($fila_t1 = $datos_tercero->fetch(PDO::FETCH_ASSOC)){
    $numero_identificacion = $fila_t1['ct1_NumeroIdentificacion'];
    $nombre1 = $fila_t1['ct1_Nombre1'];
    $apellido1 = $fila_t1['ct1_Apellido1'];
    $id_obra = $fila_t1['ct1_obra_id'];
    $id_cliente1 = $fila_t1['ct1_id_cliente1'];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios Clientes</h1>
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
                <h3 class="card-title">Editar Usuario Cliente</h3>

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
                    <form name="F_editar" id="F_editar" method="POST">
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Numero de Cedula de ciudadania</label>
                                    <input name="C_NumeroID" id="C_NumeroID" type="text" class="form-control"
                                        placeholder="Digite el numero de la Cedula"
                                        value="<?php echo $numero_identificacion; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Nombres Completos</label>
                                    <input name="C_nombres" id="C_nombres" type="text" class="form-control"
                                        value="<?php echo $nombre1; ?>" placeholder="Digite el nombre">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Apellidos Completos</label>
                                    <input name="C_Apellidos" id="C_Apellidos" type="text" class="form-control"
                                        value="<?php echo $apellido1 ?>" placeholder="Digite los Apellidos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-info">Guardar</button>
                                </div>
                            </div>
                            <div class="col"><button type="button" name="btn-restablecer" id="btn-restablecer"
                                    class="btn btn-block bg-gradient-warning">Restablecer Contraseña</button></div>
                            <div class="col">
                                <div class="form-group">
                                    <button type="button" class="btn btn-block btn-danger" id="btn-eliminar"> Eliminar
                                        Usuario</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Acicionar de Obras </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                class="fas fa-expand"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form name="adicionar_cliente_obra" id="adicionar_cliente_obra" method="post">
                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id ?>">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Seleccionar cliente</label>
                                    <select class="js-example-basic-single select2 form-control" id="C_IdTerceros"
                                        name="C_IdTerceros" required>
                                        <?php echo $t1_terceros->option_cliente_edit($id_cliente1); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label> Selecccionar Obra</label>
                                    <select class="js-example-basic-single select2 form-control" id="C_Obras"
                                        name="C_Obras">
                                        <?php  echo $t5_obras->option_obra_edit($id_cliente1, $id_obra);
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" id="btn-guardar-cliobra"
                                        class="btn btn-block btn-info">Guardar</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Listado de Clientes y Obras </h3>

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
                            <table id="t_cli_ob" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cliente</th>
                                        <th>Obra</th>
                                        <th>Detalle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include '../../../layout/footer/footer3.php' ?>


<script>
$(document).ready(function() {
    $('.select2').select2();


    function datatable_cliobra(id_usuario_edit) {
        var table = $('#t_cli_ob').DataTable({
            //"processing": true,
            //"scrollX": true,
            "ajax": {
                "url": "datatable_cli_ob.php",
                'data': {
                    'id_usuario': id_usuario_edit,
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
                    "data": "nombre_cliente"
                },
                {
                    "data": "nombre_obra"
                },
                {
                    "data": null,
                    "defaultContent": "<button class='btn btn-danger btn-sm'> Eliminar </button>"
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


    $("#btn-guardar-cliobra").click(function() {
        var id_usuario_cliente = $('#id_usuario').val();
        if ($.fn.dataTable.isDataTable('#t_cli_ob')) {
            table = $('#t_cli_ob').DataTable();
            table.destroy();
        }
        table = datatable_cliobra(id_usuario_cliente);
        setInterval(function() {
            table.ajax.reload(null, false);
        }, 5000);
    });

    var id_usuario_cliente = $('#id_usuario').val();
    if ($.fn.dataTable.isDataTable('#t_cli_ob')) {
        table = $('#t_cli_ob').DataTable();
        table.destroy();
    }
    table = datatable_cliobra(id_usuario_cliente);
    setInterval(function() {
        table.ajax.reload(null, false);
    }, 5000);

    $('#t_cli_ob tbody').on('click', 'button', function() {
        var data = table.row($(this).parents('tr')).data();
        var id = data['id'];

        Swal.fire({
            title: 'Esta Seguro(a) de Eliminar este cliente y obra?',
            text: "",
            icon: 'danger',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Si Eliminar'
        }).then((result) => {
            if (result.value) {
                // ajax para eliminar el usuario
                $.ajax({
                    url: "ajax_eliminar_cli_obra.php",
                    type: "POST",
                    data: {
                        id: data['id'],
                    },
                    success: function(response) {
                        if (response.estado) {

                            Swal.fire(
                                'El Cliente y Obra fue eliminado correctamente',
                                'success'
                            )
                        } else {
                            console.log("error");
                        }
                    },
                    error: function(respuesta) {
                        alert(JSON.stringify(respuesta));
                    },
                });
            }
        });
        //window.location = "verbatch/index.php?id=" + id;
    });

});
</script>



<script>
$(document).ready(function() {

    //  AJAX RESTABLECER CONTRASENA
    $("#btn-restablecer").click(function() {
        var id = $("#id").val();
        Swal.fire({
            title: 'Esta Seguro(a) de restablecer la contraseña?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Si Restablecer'
        }).then((result) => {
            if (result.value) {
                console.log("restableciendo");

                $.ajax({
                    url: "ajax_restablecer_pass.php",
                    type: "POST",
                    data: {
                        id: $("#id").val(),
                    },
                    success: function(response) {

                        if (response.estado) {

                            Swal.fire(
                                'La contraseña Fue Restablecida Correctamente',
                                'usuario y contraseña del cliente es mismo numero de identificacion',
                                'success'
                            )
                        } else {
                            console.log("error");
                        }

                    },
                    error: function(respuesta) {
                        alert(JSON.stringify(respuesta));
                    },

                });
            }
        })
    });

    // Ajax Eliminar Usuario
    $("#btn-eliminar_cliente_obra").click(function() {

    });

    // Ajax Eliminar Usuario
    $("#btn-eliminar").click(function() {
        var id = $("#id").val();
        Swal.fire({
            title: 'Esta Seguro(a) de Eliminar este Usuario?',
            text: "",
            icon: 'danger',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Si Eliminar'
        }).then((result) => {
            if (result.value) {
                // ajax para eliminar el usuario
                $.ajax({
                    url: "ajax_eliminar.php",
                    type: "POST",
                    data: {
                        id: $("#id").val(),
                    },
                    success: function(response) {
                        if (response.estado) {

                            Swal.fire(
                                'El usuario fue eliminado correctamente',
                                'success'
                            )
                        } else {
                            console.log("error");
                        }
                    },
                    error: function(respuesta) {
                        alert(JSON.stringify(respuesta));
                    },
                });
            }
        });
    });


    $('#C_IdTerceros').on('change', function() {
        $.ajax({
            url: "get_data.php",
            type: "POST",
            data: {
                idCliente: ($('#C_IdTerceros').val()),
                task: "1",
            },
            success: function(response) {
                console.log(response.estado);
                $('#C_Obras').html(response.obras);
            },
            error: function(respuesta) {
                alert(JSON.stringify(respuesta));
            },
        });
    });
})
</script>
<script src="ajax_editar.js"> </script>
<script>
$("#adicionar_cliente_obra").on('submit', (function(e) {
    e.preventDefault();
    $.ajax({
        url: "php_add_cliente_obra.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data.estado);
            if (data.estado) {
                toastr.success('exitoso');
            } else {
                toastr.warning(data.errores);
            }
        },
        error: function(respuesta) {
            alert(JSON.stringify(respuesta));
        },
    });
}));
</script>
</body>

</html>