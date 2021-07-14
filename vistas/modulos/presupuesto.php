<?php

if($_SESSION["perfil"] == "Secretaria" || $_SESSION["perfil"] == "Cajero"){

  echo '<script>

    window.location = "inicio";
  
  </script>';

  return;
  
}


?>

<!-- Cuerpo AGREGAR SERVICIO PRESUPUESTO-->
<div class="content-wrapper">

  <section class="content-header">
    <div class="row">
      <div class="col">
        <h1 class="text-center">
          Agregar Presupuestos
        </h1>
      </div>
    </div>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Generar Presupuestos</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group ">
            <h2 class="text-center">Cliente</h2>
            <abbr id="toltipx" title="Agregar cliente">
              <button class="btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregarC"><i class="fa fa-user-plus" aria-hidden="true"></i> Agregar</button>
            </abbr>

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <h2 class="text-center">Vehículo</h2>
            <abbr id="toltipx" title="Agregar vehículo">
              <button class="btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregarV"><i class="fa fa-car" aria-hidden="true"></i> Agregar</button>
            </abbr>

          </div>
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->

    <!-- Default box -->
    <div class="box">
      <!-- Header box -->
      <div class="box-header with-border">
        <h3 class="text-center">Agregar Servicio</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>

      <!-- Body form xDF -->
      <div class="box-body">
        <!--leyenda de campos obligatorios-->
              <div class="input-group">
                <p style="color: orange">* Campos obligatorios</p>
              </div>

        <form role="form" method="post" enctype="multipart/form-darta">
          <!--ID vehiculo-->
          <div class="form-group">
            <!--  ID VEHICULO -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <abbr id="toltipx" title="Ingrese el ID del vehículo">
                <?php
                $item = null;
                $vehiculo = ControladorVehiculos::ctrMostrarVehiculo2($item);

                # echo json_encode($vehiculo);
                echo '<input  class="form-control input-lg" name="nuevoV" placeholder="Ingresar Id Vehiculo" value="' . $vehiculo[0] . '" required>'
                ?>
              </abbr>
            </div>
          </div>
          <!--Ingresar concepto-->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <abbr id="toltipx" title="Agregue una descripción del servicio">
                <input type="text" class="form-control input-lg" name="nuevoConcepto" placeholder="Ingresar concepto" required onkeyup="mayus(this);">
              </abbr>
            </div>
          </div>
          <!--Ingresar el costo-->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <abbr id="toltipx" title="Agregue el costo exacto del servicio (sin centavos)">
                <input type="number" class="form-control input-lg" name="nuevoCosto" placeholder="Ingresar costo" required>
              </abbr>
            </div>
          </div>
          <!--Ingresar el Servicio -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-wrench"></i></span>
              <abbr id="toltipx" title="Seleccione el servicio a dar">
                <select class="form-control input-lg" name="nuevoServicio">

                  <option value="">Seleccionar Servicio</option>
                  <option value="HOJALATERIA">HOJALATERIA</option>
                  <option value="PINTURA">PINTURA</option>

                </select>
              </abbr>
            </div>
          </div>
          <div class="row justify-content-center">

            <!-- /.col -->
            <div class="col-md-2 col-md-offset-5">
              <div class="form-group">
                <abbr id="toltipx" title="Agregar servicio">
                  <button type="submit" class="btn btn-block btn-success">Agregar</button>
                </abbr>
              </div>

            </div>
            <!-- Tabla de lo ya agregado -->

          </div>
          <!-- /.box-body -->

          <?php
          $crearServicio = new ControladorServicios();
          $crearServicio->ctrCrearServicio();
          ?>

        </form>
      </div>

      <!-- Body form xDF -->
      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Vehículo</th>
              <th>Concepto</th>
              <th>Costo</th>
              <th>Servicio</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item = null;
            $valor = null;

            $clientes = ControladorServicios::ctrMostrarServicio($item, $valor);
            foreach ($clientes as $key => $value) {
              echo '<tr>
                  <td>' . $value["codigo"] . '</td>
                  <td>' . $value["Matricula"] . '</td>
                  <td>' . $value["concepto"] . '</td>
                  <td>$ ' . $value["costo"] . '</td>
                  <td>' . $value["tipo"] . '</td>
                  <td>  
                    <div class="btn-group">
                      <abbr id="toltipx" title="Editar servicio"> 
                      <button class="btn btn-warning btnEditarServicio" idServicio="' . $value["codigo"] . '" data-toggle="modal" data-target="#modalEditarServicio"><i class="fa fa-pencil"></i></button>
                      </abbr>
                      <abbr id="toltipx" title="Eliminar servicio">
                      <button class="btn btn-danger btnEliminarServicio" idServicio="' . $value["codigo"] . '"><i class="fa fa-times"></i></button>
                      </abbr>
                    </div>
                  </td>
                </tr>';
            }
            ?>
          </tbody>
        </table>

      </div>

      <div class="box-body">
        <form role="form" method="post" enctype="multipart/form-darta">
          <!--TOTAL -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <!-- TOLTAL xD -->
              <abbr id="toltipx" title="Costo total del presupuesto">
                <?php
                $item = null;
                $total = ControladorServicios::ctrMostrarServicio2($item);
                // echo json_encode($total[0][0]);
                echo '
                <input type="text" class="form-control input-lg" name="nuevoTotal" 
                placeholder="Total del presupuesto" value="' . $total[0][0] . '" disabled required>'
                ?>
              </abbr>
            </div>
          </div>
          <!-- Agregar presupuesto TOTAL -->
          <div class="row justify-content-center">
            <div class="col-md-2 col-md-offset-3">
              <div class="form-group">
                <abbr id="toltipx" title="Cancelar presupuesto">
                  <button type="button" class="btn btn-block btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Salir</button>
                </abbr>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-2 col-md-offset-1">
              <div class="form-group">
                <abbr id="toltipx" title="Guardar presupuesto">
                  <button type="submit" name="btn1" class="btn btn-block btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                </abbr>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <?php

          if (isset($_POST["btn1"])) {
            $crearP = new ControladorPresupuesto();
            $crearP->ctrCrearPresupuesto();
          }
          ?>
        </form>
      </div>

    </div>
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
            <button type="submit" class="btn btn-primary btn-lg">Guardar Vehículo</button>
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

<!-- modal agregar CLIENTE -->
<!-- Modal -->
<div id="modalAgregarC" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" class="formulario" id="formulario" enctype="multipart/form-darta">
        <!--Cabecera-->

        <div class="modal-header" style="background:#3c8dbc;color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Cliente</h4>
        </div>

        <!--Cuerpo-->

        <div class="modal-body">

          <div class="box-body">

            <!--leyenda de campos obligatorios-->
            <div class="form-group">
              <div class="input-group">
                <p style="color: orange">* Campos obligatorios</p>
              </div>
            </div>
            <!--Ingresar nombre-->
            <div class="form-group formulario__grupo" id="grupo__nombre">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese el nombre del cliente">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar el nombre" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el nombre completo, sin caracteres especiales ni números</p>
            </div>
            <!--Ingresar telefono-->
            <div class="form-group formulario__grupo" id="grupo__telefono">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese el teléfono">
                  <div class="formulario__grupo-input">
                    <input type="number" class="form-control input-lg " name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingresar el teléfono" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el número de 10 dígitos</p>
            </div>
            <!--Ingresar Calle-->
            <div class="form-group formulario__grupo" id="grupo__calle">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese el nombre de la calle">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="nuevoCalle" id="nuevoCalle" placeholder="Ingresar el nombre de la calle" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el nombre de la calle, sin caracteres especiales</p>
            </div>
            <!--Ingresar num inter-
            <div class="form-group formulario__grupo" id="grupo__inter">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese numero interior del domicilio">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="nuevoInter" id="nuevoInter" placeholder="Ingresar el Numero interior" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el numero interior de la calle y menor a 5 dígitos</p>
            </div>
            Ingresar num exter
            <div class="form-group formulario__grupo" id="grupo__exter">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese numero exterior del domicilio">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="nuevoExter" id="nuevoExter" placeholder="Ingresar el Numero exterior" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el numero exterior de la calle y menor a 5 dígitos</p>
            </div>-->
            <div class="row">
              <div class="col-xs-6">
                <!--Ingresar num inter-->
                <div class="form-group formulario__grupo" id="grupo__inter">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <abbr id="toltipx" title="Ingrese número interior del domicilio">
                      <div class="formulario__grupo-input">
                        <input type="text" class="form-control input-lg " name="nuevoInter" id="nuevoInter" placeholder="Número interior" onkeyup="mayus(this);">
                      </div>
                  </div>
                  <p id="msj" class="formulario__input-error">Ingrese el número interior del domicilio, debe ser menor a 5 dígitos</p>
                </div>
              </div>
              <div class="col-xs-6">
                <!--Ingresar num exter-->
                <div class="form-group formulario__grupo" id="grupo__exter">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <abbr id="toltipx" title="Ingrese número exterior del domicilio">
                      <div class="formulario__grupo-input">
                        <input type="text" class="form-control input-lg " name="nuevoExter" id="nuevoExter" placeholder="Número exterior" onkeyup="mayus(this);">
                      </div>
                  </div>
                  <p id="msj" class="formulario__input-error">Ingrese el número exterior del domicilio, debe ser menor a 5 dígitos</p>
                </div>


              </div>
            </div>
            <!--Ingresar col-->
            <div class="form-group formulario__grupo" id="grupo__colonia">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Agregue el nombre de la colonia">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="nuevoColonia" id="nuevoColonia" placeholder="Ingresar el nombre de la colonia" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el nombre de la colonia, sin caracteres especiales</p>
            </div>

          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <abbr id="toltipx" title="Cancelar formulario del cliente">
            <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Salir</button>
          </abbr>
          <abbr id="toltipx" title="Guardar formulario del cliente">
            <button type="submit" class="btn btn-primary btn-lg">Guardar Cliente</button>
          </abbr>
        </div>

        <?php

        $crearCliente = new ControladorCliente();
        $crearCliente->ctrCrearClientes();

        ?>

      </form>

    </div>

  </div>

</div>



<!-- modal editar servicio -->
<!-- Modal -->
<div id="modalEditarServicio" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" class="formulario" id="formulario" enctype="multipart/form-darta">
        <!--Cabecera-->

        <div class="modal-header" style="background:#3c8dbc;color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Servicio</h4>
        </div>

        <!--Cuerpo-->

        <div class="modal-body">

          <div class="box-body">

            <!--leyenda de campos obligatorios-->
            <div class="form-group">
              <div class="input-group">
                <p style="color: orange">* Campos obligatorios</p>
              </div>
            </div>

            <!--Ingresar concepto -->
            <div class="form-group formulario__grupo" id="grupo__concepto">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese concepto de servicio o refaccion">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="editarConcepto" id="editarConcepto" value="" required onkeyup="mayus(this);">
                    <input type="hidden" id="conceptoActual" name="conceptoActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese un copcepto</p>
            </div>

            <!--Ingresar costo-->
            <div class="form-group formulario__grupo" id="grupo__costo">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese el costo">
                  <div class="formulario__grupo-input">
                    <input type="number" class="form-control input-lg " name="editarCosto" id="editarCosto" value="" required onkeyup="mayus(this);">
                    <input type="hidden" id="costoActual" name="costoActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el costo del concepto</p>
            </div>

            <!--Ingresar el perfil -->
            <div class="form-group formulario__grupo" id="grupo__servicio">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="editarServicio">
                  <option value="" id="editarServicio"></option>
                  <option value="HOJALATERIA">HOJALATERIA</option>
                  <option value="PINTURA">PINTURA</option>

                </select>
              </div>
            </div>



          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <abbr id="toltipx" title="Cancelar formulario del Servicio">
            <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Salir</button>
          </abbr>
          <abbr id="toltipx" title="Guardar formulario del Servicio">
            <button type="submit" class="btn btn-primary btn-lg">Modificar Servicio</button>
          </abbr>
        </div>



        <?php

        $editarServicio = new ControladorServicios();
        $editarServicio->ctrEditarServicio();

        ?>



      </form>

    </div>

  </div>

</div>

<?php
$borrarServicio = new ControladorServicios();
$borrarServicio->ctrBorrarServicio();
?>