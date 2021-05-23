<!-- Cuerpo -->
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
          <div class="form-group">
            <h2>Cliente</h2>
            <abbr id="toltipx" title="Agregar cliente">
              <button class="btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregarC"><i class="fa fa-user-plus" aria-hidden="true"></i> Agregar</button>
            </abbr>

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <h2>Vehiculo</h2>
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
        <h3>Agregar Servicio</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>

      <!-- Body form xDF -->
      <div class="box-body">
        <form role="form" method="post" enctype="multipart/form-darta">
          <!--ID vehiculo-->
          <div class="form-group">
            <!--  ID VEHICULO -->
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <abbr id="toltipx" title="Ingrese el ID del vehiculo">
                <?php
                $item = null;
                $vehiculo = ControladorVehiculos::ctrMostrarVehiculo2($item);

                # echo json_encode($vehiculo);
                echo '<input type="number" class="form-control input-lg" name="nuevoV" placeholder="Ingresar Id Vehiculo" value="' . $vehiculo[0] . '" required>'
                ?>
              </abbr>
            </div>
          </div>
          <!--Ingresar concepto-->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <abbr id="toltipx" title="Agregue una descripción del servicio">
                <input type="text" class="form-control input-lg" name="nuevoConcepto" placeholder="Ingresar Concepto" required>
              </abbr>
            </div>
          </div>
          <!--Ingresar el costo-->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
              <abbr id="toltipx" title="Agregue el costo del servicio">
                <input type="number" class="form-control input-lg" name="nuevoCosto" placeholder="Ingresar Costo" required>
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
                  <option value="Hojalatería">Hojalatería</option>
                  <option value="Pintura">Pintura</option>

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

        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Vehiculo</th>
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
                  <td>' . $value["Id_v"] . '</td>
                  <td>' . $value["concepto"] . '</td>
                  <td>' . $value["costo"] . '</td>
                  <td>' . $value["tipo"] . '</td>
                  <td>  
                    <div class="btn-group">
                      <abbr id="toltipx" title="Editar servicio">
                        <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                      </abbr>
                      <abbr id="toltipx" title="Cancelar servicio">
                        <button class="btn btn-danger"><i class="fa fa-times"></i></button>
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
                #echo json_encode($total[0][0]);
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

      <form role="form" method="post" enctype="multipart/form-darta">
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
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                <abbr id="toltipx" title="Ingrese la matrícula del vehículo">
                  <input type="text" class="form-control input-lg" name="nuevoMatricula" placeholder="Ingresar Matricula" onkeyup="mayus(this);" required>
                </abbr>
              </div>
            </div>

            <!--Ingresar el Marca-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                <abbr id="toltipx" title="Ingrese la marca del vehículo">
                  <input type="text" class="form-control input-lg" name="nuevoMarca" placeholder="Ingresar Marca" onkeyup="mayus(this);" required>
                </abbr>
              </div>
            </div>

            <!--Ingresar la Modelo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <abbr id="toltipx" title="Ingrese el modelo del vehículo">
                  <input type="text" class="form-control input-lg" name="nuevoModelo" placeholder="Ingresar Modelo" onkeyup="mayus(this);" required>
                </abbr>
              </div>
            </div>

            <!--Ingresar la Color-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>
                <abbr id="toltipx" title="Ingrese el color del vehículo">
                  <input type="text" class="form-control input-lg" name="nuevoColor" placeholder="Ingresar Color" onkeyup="mayus(this);" required>
                </abbr>
              </div>
            </div>

            <!--Ingresar la Observaciones-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <abbr id="toltipx" title="Agregue una breve descripción del vehículo">
                  <input type="text" class="form-control input-lg" name="nuevoObservaciones" placeholder="Ingresar Observaciones" onkeyup="mayus(this);" required>
                </abbr>
              </div>
            </div>

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


<!-- modal agregar CLIENTE -->
<!-- Modal -->
<div id="modalAgregarC" class="modal fade" role="dialog">

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

            <!--r-->
            <div class="form-group">
              <div class="input-group">
                <p style="color: orange">* Campos obligatorios</p>
              </div>
            </div>

            <!--Ingresar nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese el nombre completo del cliente">
                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required onkeyup="mayus(this);">
                </abbr>
              </div>
            </div>

            <!--Ingresar Telefono-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <abbr id="toltipx" title="Ingrese el teléfono celular del cliente">
                  <input type="number" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Telefono" required>
                </abbr>
              </div>
            </div>

            <!--Ingresar Calle-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <abbr id="toltipx" title="Ingrese el nombre de la calle del domicilio">
                  <input type="text" class="form-control input-lg" name="nuevoCalle" placeholder="Ingresar Calle" required onkeyup="mayus(this);">
                </abbr>
              </div>
            </div>
            <!--Ingresar Ncalle-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                <abbr id="toltipx" title="Ingrese el número interior del domicilio">
                  <input type="text" class="form-control input-lg" name="nuevoInter" placeholder="Ingresar numero interior" required onkeyup="mayus(this);">
                </abbr>
              </div>
            </div>
            <!--Ingresar Ncalle-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                <abbr id="toltipx" title="Ingrese el número exterior del domicilio">
                  <input type="text" class="form-control input-lg" name="nuevoExter" placeholder="Ingresar numero exterior" required onkeyup="mayus(this);">
                </abbr>
              </div>
            </div>
            <!--Ingresar Colonia-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                <abbr id="toltipx" title="Ingrese el nombre de la colonia del domicilio">
                  <input type="text" class="form-control input-lg" name="nuevoColonia" placeholder="Ingresar Colonia" required onkeyup="mayus(this);">
                </abbr>
              </div>
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