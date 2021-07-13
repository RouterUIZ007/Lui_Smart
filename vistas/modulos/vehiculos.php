<?php

if($_SESSION["perfil"] == "Cajero"){

  echo '<script>

    window.location = "inicio";
  
  </script>';

  return;
  
}
?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Vehículos
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Vehículos</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarV">Agregar Vehículo</button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th>Matrícula</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Color</th>
              <th>Observaciones</th>
              <th>Nombre del cliente</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $vehiculos = ControladorVehiculos::ctrMostrarVehiculos($item, $valor);

            //echo json_encode($vehiculos);
            foreach ($vehiculos as $key => $value) {

              echo '<tr>

                <td>' . $value["Matricula"] . '</td>
                <td>' . $value["marca"] . '</td>
                <td>' . $value["modelo"] . '</td>
                <td>' . $value["color"] . '</td>
                <td>' . $value["observaciones"] . '</td>
                <td>' . $value["nombre"] . '</td>
                <td>

                  <div class="btn-group">

                  <abbr id="toltipx" title="Editar los datos del vehículo"> 
                  <button class="btn btn-warning btnEditarVehiculo" idVehiculo="' . $value["id_v"] . '" data-toggle="modal" data-target="#modalEditarVehiculo"><i class="fa fa-pencil"></i></button></abbr>';

                  if($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller"){

                  echo'<abbr id="toltipx" title="Eliminar los datos del vehículo"> <button class="btn btn-danger btnEliminarVehiculo" idVehiculo="' . $value["id_v"] . '"><i class="fa fa-times"></i></button></abbr>';

                  }
                  
                  echo'</div>

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
          <h4 class="modal-title">Datos del Vehículo</h4>
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

            <!--CLIENTE RECUPERADO-->
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
            <!-- Grupo 1 -->
            <div class="row">
              <div class="col-xs-6">

                <!--Ingresar Matricula-->
                <div class="form-group formulario__grupo" id="grupo__matricula">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <abbr id="toltipx" title="Ingrese la matrícula del vehículo">
                      <div class="formulario__grupo-input">
                        <input type="text" class="form-control input-lg " name="nuevoMatricula" id="nuevoMatricula" placeholder="Ingresar la matrícula" required required onkeyup="mayus(this);">
                      </div>
                  </div>
                  <p id="msj" class="formulario__input-error">Ingrese la matrícula correctamente, ejem. XX0123</p>
                </div>
              </div>
              <div class="col-xs-6">
                <!--Ingresar Marca-->
                <div class="form-group formulario__grupo" id="grupo__marca">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <abbr id="toltipx" title="Ingrese la marca del vehículo">
                      <div class="formulario__grupo-input">
                        <input type="text" class="form-control input-lg " name="nuevoMarca" id="nuevoMarca" placeholder="Ingresar la marca" required required onkeyup="mayus(this);">
                      </div>
                  </div>
                  <p id="msj" class="formulario__input-error">Ingrese la marca correctamente, ejem. PORCHE</p>
                </div>
              </div>
            </div>
            <!-- Grupo 2 -->
            <div class="row">
              <div class="col-xs-6">

                <!--Ingresar Modelo-->
                <div class="form-group formulario__grupo" id="grupo__modelo">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <abbr id="toltipx" title="Ingrese el modelo del vehículo">
                      <div class="formulario__grupo-input">
                        <input type="text" class="form-control input-lg " name="nuevoModelo" id="nuevoModelo" placeholder="Ingresar el modelo" required required onkeyup="mayus(this);">
                      </div>
                  </div>
                  <p id="msj" class="formulario__input-error">Ingrese el modelo correctamente, ejem. 911 TURBO</p>
                </div>
              </div>
              <div class="col-xs-6">
                <!--Ingresar la Color-->
                <div class="form-group formulario__grupo" id="grupo__color">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <abbr id="toltipx" title="Ingrese el color del vehículo">
                      <div class="formulario__grupo-input">
                        <input type="text" class="form-control input-lg " name="nuevoColor" id="nuevoColor" placeholder="Ingresar el color" required onkeyup="mayus(this);">
                      </div>
                  </div>
                  <p id="msj" class="formulario__input-error">Ingrese el color correctamente, ejem. NEGRO</p>
                </div>
              </div>
            </div>

            <!--Ingresar la Observaciones-->
            <div class="form-group formulario__grupo" id="grupo__observaciones">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Agregue una breve descripción del vehículo">
                  <div class="formulario__grupo-input">

                    <textarea class="form-control" rows="5" name="nuevoObservaciones" id="nuevoObservaciones" placeholder="Observaciones" required onkeyup="mayus(this);"></textarea>

                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese observaciones.</p>
            </div>


          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <abbr id="toltipx" title="Cancelar formulario del vehículo">
            <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Salir</button>
          </abbr>
          <abbr id="toltipx" title="Guardar formulario del vehículo">
            <button type="submit" class="btn btn-primary btn-lg">Guardar Vehículo</button>
          </abbr>
        </div>

        <?php

        $crearVehiculo = new ControladorVehiculos();
        $crearVehiculo->ctrCrearVehiculos2();

        ?>

      </form>

    </div>

  </div>

</div>


<!-- modal editar VEHICULO -->
<!-- Modal -->
<div id="modalEditarVehiculo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" class="formulario" id="formulario" enctype="multipart/form-darta">
        <!--Cabecera-->

        <div class="modal-header" style="background:#3c8dbc;color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Vehiculo</h4>
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
                <abbr id="toltipx" title="Ingrese la matrícula del vehículo">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="editarMatricula" id="editarMatricula" value="" required required onkeyup="mayus(this);">
                    <input type="hidden" id="matriculaActual" name="matriculaActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese la Matricula correctamente, Ejem. XX0123</p>
            </div>
            <!--Ingresar Marca-->
            <div class="form-group formulario__grupo" id="grupo__marca">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese la marca del vehículo">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="editarMarca" id="editarMarca" value="" required required onkeyup="mayus(this);">
                    <input type="hidden" id="marcaActual" name="marcaActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese la Marca correctamente, Ejem. PORCHE</p>
            </div>
            <!--Ingresar Modelo-->
            <div class="form-group formulario__grupo" id="grupo__modelo">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese el modelo del vehículo">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="editarModelo" id="editarModelo" value="" required required onkeyup="mayus(this);">
                    <input type="hidden" id="modeloActual" name="modeloActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el Modelo correctamente, Ejem. 911 TURBO</p>
            </div>
            <!--Ingresar la Color-->
            <div class="form-group formulario__grupo" id="grupo__color">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese el color del vehículo">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="editarColor" id="editarColor" value="" required required onkeyup="mayus(this);">
                    <input type="hidden" id="colorActual" name="colorActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el Color correctamente, Ejem. NEGRO</p>
            </div>
            <!--Ingresar la Observaciones-->
            <div class="form-group formulario__grupo" id="grupo__observaciones">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Agregue una breve descripción del vehículo">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="editarObservaciones" id="editarObservaciones" value="" required required onkeyup="mayus(this);">
                    <input type="hidden" id="observacionesActual" name="observacionesActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese observaciones.</p>
            </div>





          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <abbr id="toltipx" title="Cancelar formulario del vehículo">
            <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Salir</button>
          </abbr>
          <abbr id="toltipx" title="Guardar formulario del vehículo">
            <button type="submit" class="btn btn-primary btn-lg">Modificar Vehículo</button>
          </abbr>
        </div>

      

        <?php

        $editarVehiculo = new ControladorVehiculos();
        $editarVehiculo->ctrEditarVehiculos();

        ?>

      
      </form>

    </div>

  </div>

</div>


<?php

$borrarVehiculo = new ControladorVehiculos();
$borrarVehiculo->ctrBorrarVehiculo();

?>