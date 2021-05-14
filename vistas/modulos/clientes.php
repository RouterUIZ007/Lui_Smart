
  <div class="content-wrapper">

    <section class="content-header">
      
      <h1>
        Clientes
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Clientes</li>
      </ol>

    </section>

    <!-- Main content -->
  <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarC2">Agregar Cliente</button>
       
        </div>

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>

              <tr>

                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Calle</th>
                <th>Numero de Calle</th>
                <th>Colonia</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <?php
              
                $item = null;
                $valor = null;

                $clientes = ControladorCliente::ctrMostrarClientes($item,$valor);

                foreach ($clientes as $key =>$value){

                  echo '<tr>

                  <td>1</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["telefono"].'</td>
                  <td>'.$value["calle"].'</td>
                  <td>'.$value["numero"].'</td>
                  <td>'.$value["colonia"].'</td>
                  <td>
  
                    <div class="btn-group">
  
                      <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
  
                    </div>
  
                  </td>
  
                </tr>';

                }

              

             ?>

            </tbody>

          </table>

        </div>

        <!-- /.box-body -->
      </div>
      <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal agregar CLIENTE -->
<!-- Modal -->
<div id="modalAgregarC2" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-darta">
        <!--Cabecera-->

        <div class="modal-header" style="background:#3c8dbc;color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Cliente</h4>
        </div>

        <!--Cuerpo-->

        <div class="modal-body">

          <div class="box-body">

            <!--Ingresar nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <!--Ingresar Telefono-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Telefono" required>
              </div>
            </div>

            <!--Ingresar Calle-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoCalle" placeholder="Ingresar Calle" required>
              </div>
            </div>
            <!--Ingresar Ncalle-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoNcalle" placeholder="Ingresar Ncalle" required>
              </div>
            </div>
            <!--Ingresar Colonia-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoColonia" placeholder="Ingresar Colonia" required>
              </div>
            </div>




          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </div>

        <?php

        $crearCliente = new ControladorCliente();
        $crearCliente->ctrCrearClientes2();

        ?>

      </form>

    </div>

  </div>

</div>