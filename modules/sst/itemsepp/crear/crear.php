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
                                <h1>ITEMS EPP</h1>
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
                            <h3 class="card-title">Crear ITEMS EPP</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>    
                            </div>
                        </div>
                        <div class="card-body">
                          <div class="row">
                              <div class="col">
                                    <div class="form-group">
                                        <label for="">PARTE DEL CUERPO</label>
                                        <select name="" id="">
                                            <option value="">Cabeza</option>
                                        </select>
                                    </div>
                              </div>
                              <div class="col">
                                    <div class="form-group">
                                        <label for="">NOMBRE DE LA EPP</label>
                                        <input type="text" name="" id="">
                                    </div>
                              </div>
                              <div class="col">
                                    <div class="form-group">
                                        <label for="">ESPECIFICACION DE LA EPP</label>
                                        <input type="text" name="" id="">
                                    </div>
                              </div>
                              <div class="col">
                                    <div class="form-group">
                                        <label for="">CARACTERISTICA DE LA EPP</label>
                                        <input type="text" name="" id="">
                                    </div>
                              </div>
                          </div>
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
            
        <?php include '../../../layout/footer/footer3.php' ?>
        <script src="ajax_crear.js"></script>
        

    </body>
</html>
