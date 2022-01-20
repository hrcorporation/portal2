<?php include '../../layout/validar_session2.php' ?>
<?php include '../../layout/head/head2.php'; ?>
<?php include 'sidebar.php' ?>

<?php 

?> 
       

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Factura e</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"><a href="#">Inicio</a></li>
                                <!--<li class="breadcrumb-item active">Legacy User Menu</li> -->
                            </ol>
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

            $modulos = array(1,19,20,22,26,27); // Array de roles para habilitar roles
            if ($login->validar_rol_user($modulos, $array_rol_user)) : // Validacion para habilitar el usuario
                $php_clases = new php_clases();
                $t27_factura = new t27_factura();
                $t1_terceros = new t1_terceros(); 
                $t5_obras = new t5_obras();

        ?>
                
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Explorar</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div id="b-tabla">
                            <table id="table_factura" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Titulo</th>
                                        <th>subida </th>
                                        <th> cliente </th>
                                        <th> obra </th>
                                        <th style="width:105px"> valor </th>
                                        <th> Detalles </th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                               
                                </tbody>

                            </table>

                        </div>
                        <div id="tableMessage"></div>						

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                    <!-- /.card-footer-->
                </div>
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
    var table = $('#table_factura').DataTable({
        //"processing": true,
        //"scrollX": true,
        "ajax": {
            "url": "data_table.php",
            "dataSrc": ""
        },
        "order": [
            [0, 'desc']
        ],
        "columns": [
  
            {
                "data": "id"
            },
            {
                "data": "num_fact"
            },
            {
                "data": "fecha_subida"
            },
            {
                "data": "nombre_cliente"
            },
            {
                "data": "nombre_obra"
            },
            {
                "data": "valor_fact"
            },
            {
                "data": null,
                "defaultContent": "<button class='btn btn-warning btn-sm'>Editar </button>"
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

    $('#table_factura tbody').on('click', 'button', function() {
        var data = table.row($(this).parents('tr')).data();
        var id = data['id'];
        window.location = "update/editar_facturae.php?id=" + id;
    });

    setInterval(function() {
        table.ajax.reload(null, false);
    }, 10000);



});
</script>
</body>

</html>