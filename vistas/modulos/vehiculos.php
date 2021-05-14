
  <div class="content-wrapper">

    <section class="content-header">
      
      <h1>
        Vehiculos
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Vehiculos</li>
      </ol>

    </section>

    <!-- Main content -->
  <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarV2">Agregar Vehiculo</button>
       
        </div>

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>

              <tr>

                <th style="width: 10px">#</th>
                <th>Matricula</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Observaciones</th>
                <th>Cliente</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

            <?php

              $item= null;
              $valor= null;

              $vehiculos = ControladorVehiculos::ctrMostrarVehiculos($item,$valor);

              foreach ($vehiculos as $key => $value){

                echo '<tr>

                <td>1</td>
                <td>'.$value["Matricula"].'</td>
                <td>'.$value["marca"].'</td>
                <td>'.$value["modelo"].'</td>
                <td>'.$value["color"].'</td>
                <td>'.$value["observaciones"].'</td>
                <td>'.$value["id_c"].'</td>
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

<!-- modal agregar VEHICULO -->
<!-- Modal -->
<div id="modalAgregarV2" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-darta">
        <!--Cabecera-->

        <div class="modal-header" style="background:#3c8dbc;color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Datos de Vehiculo</h4>
        </div>

        <!--Cuerpo-->

        <div class="modal-body">

          <div class="box-body">

            <!--Ingresar Matricula-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoId_c" placeholder="Id Cliente" required>
              </div>
            </div>

            <!--Ingresar Matricula-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoMatricula" placeholder="Ingresar Matricula" required>
              </div>
            </div>

            <!--Ingresar el Marca-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoMarca" placeholder="Ingresar Marca" required>
              </div>
            </div>

            <!--Ingresar la Modelo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoModelo" placeholder="Ingresar Modelo" required>
              </div>
            </div>

            <!--Ingresar la Color-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoColor" placeholder="Ingresar Color" required>
              </div>
            </div>

            <!--Ingresar la Observaciones-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoObservaciones" placeholder="Ingresar Observaciones" required>
              </div>
            </div>

            <!--Ingresar el Cliente 
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="nuevoCliente">

                  <option value="">Seleccionar Cliente</option>
                  <option value="Cliente1">cliente 1</option>
                  <option value="Cliente2">cliente 2</option>
                  <option value="Cliente3">cliente 3</option>
                  <option value="Cliente4">cliente 4</option>
                  <option value="Cliente5">cliente 5</option>
                  <option value="Cliente6">cliente 6</option>
                  <option value="Cliente7">cliente 7</option>
                  <option value="Cliente8">cliente 8</option>


                </select>
              </div>
            </div> -->
          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Vehiculo</button>
        </div>

        <?php

        $crearVehiculo = new ControladorVehiculos();
        $crearVehiculo->ctrCrearVehiculos();

        ?>

      </form>

    </div>

  </div>

</div>

