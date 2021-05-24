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

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarV">Agregar Vehiculo</button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

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

            $item = null;
            $valor = null;

            $vehiculos = ControladorVehiculos::ctrMostrarVehiculos($item, $valor);

            foreach ($vehiculos as $key => $value) {

              echo '<tr>

                <td>' . $value["id_v"] . '</td>
                <td>' . $value["Matricula"] . '</td>
                <td>' . $value["marca"] . '</td>
                <td>' . $value["modelo"] . '</td>
                <td>' . $value["color"] . '</td>
                <td>' . $value["observaciones"] . '</td>
                <td>' . $value["id_c"] . '</td>
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

        <!-- /.box-body -->
      </div>
      <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal agregar VEHICULO -->
<!-- Modal -->
<div id="modalAgregarV" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" class="formulario" id="formulario" enctype="multipart/form-darta">
        <!--Cabecera-->

        <div class="modal-header" style="background:#3c8dbc;color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Datos de Vehiculo</h4>
        </div>

        <!--Cuerpo-->

        <div class="modal-body">

          <div class="box-body">

            <!--r-->
            <div class="form-group">
              <div class="input-group">
                <p style="color: orange">* Campos obligatorios</p>
              </div>
            </div>

            <!--Ingresar Matricula-->
            <div class="form-group">
              <!-- hidden -->
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>


                <abbr id="toltipx" title="Ingrese el ID del cliente">

                  <?php

                  $item = null;
                  $clientes = ControladorCliente::ctrMostrarClientes2($item);
                  # echo json_encode($clientes[0]);

                  echo '<input type="number" class="form-control input-lg" name="nuevoId_c" placeholder="Id Cliente" value="' . $clientes[0] . '" onkeyup="mayus(this);" required >';

                  ?>
                </abbr>
              </div>
            </div>

            <!--Ingresar Matricula-->
            <div class="form-group formulario__grupo" id="grupo__matricula">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <div class="formulario__grupo-input">
                  <input type="text" class="form-control input-lg " name="nuevoMatricula" id="nuevoMatricula" placeholder="Ingresar la Magtricula" required required onkeyup="mayus(this);">
                </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese la Matricula correctamente, Ejem. XX0123</p>
            </div>
            <!--Ingresar Marca-->
            <div class="form-group formulario__grupo" id="grupo__marca">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <div class="formulario__grupo-input">
                  <input type="text" class="form-control input-lg " name="nuevoMarca" id="nuevoMarca" placeholder="Ingresar la marca" required required onkeyup="mayus(this);">
                </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese la Marca correctamente, Ejem. PORCHE</p>
            </div>
            <!--Ingresar Modelo-->
            <div class="form-group formulario__grupo" id="grupo__modelo">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <div class="formulario__grupo-input">
                  <input type="text" class="form-control input-lg " name="nuevoModelo" id="nuevoModelo" placeholder="Ingresar la Modelo" required required onkeyup="mayus(this);">
                </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el Modelo correctamente, Ejem. 911 TURBO</p>
            </div>
            <!--Ingresar la Color-->
            <div class="form-group formulario__grupo" id="grupo__color">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <div class="formulario__grupo-input">
                  <input type="text" class="form-control input-lg " name="nuevoColor" id="nuevoColor" placeholder="Ingresar el Color" required required onkeyup="mayus(this);">
                </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el Color correctamente, Ejem. NEGRO</p>
            </div>
            <!--Ingresar la Observaciones-->
            <div class="form-group formulario__grupo" id="grupo__observaciones">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <div class="formulario__grupo-input">
                  <input type="text" class="form-control input-lg " name="nuevoObservaciones" id="nuevoObservaciones" placeholder="Observaciones" required required onkeyup="mayus(this);">
                </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese observaciones.</p>
            </div>




            <!--             
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                <abbr id="toltipx" title="Ingrese la matrícula del vehículo">
                  <input type="text" class="form-control input-lg" name="nuevoMatricula" placeholder="Ingresar Matricula" onkeyup="mayus(this);" required>
                </abbr>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                <abbr id="toltipx" title="Ingrese la marca del vehículo">
                  <input type="text" class="form-control input-lg" name="nuevoMarca" placeholder="Ingresar Marca" onkeyup="mayus(this);" required>
                </abbr>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <abbr id="toltipx" title="Ingrese el modelo del vehículo">
                  <input type="text" class="form-control input-lg" name="nuevoModelo" placeholder="Ingresar el Modelo" onkeyup="mayus(this);" required>
                </abbr>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>
                <abbr id="toltipx" title="Ingrese el color del vehículo">
                  <input type="text" class="form-control input-lg" name="nuevoColor" placeholder="Ingresar Color" onkeyup="mayus(this);" required>
                </abbr>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <abbr id="toltipx" title="Agregue una breve descripción del vehículo">
                  <input type="text" class="form-control input-lg" name="nuevoObservaciones" placeholder="Ingresar Observaciones" onkeyup="mayus(this);" required>
                </abbr>
              </div>
            </div>-->




          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <abbr id="toltipx" title="Cancelar formulario del vehículo">
            <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Salir</button>
          </abbr>
          <abbr id="toltipx" title="Guardar formulario del vehículo">
            <button type="submit" class="btn btn-primary btn-lg">Guardar Vehiculo</button>
          </abbr>
        </div>

        <?php

        $crearVehiculo = new ControladorVehiculos();
        $crearVehiculo->ctrCrearVehiculos();

        ?>

      </form>

    </div>

  </div>

</div>