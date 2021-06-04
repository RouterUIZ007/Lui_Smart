<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Ver Presupuestos
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Ver Presupuestos</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">

        <!--  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarC">Agregar Cliente</button> -->
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>fecha</th>
              <th>total</th>
              <th>vehiculo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item = null;
            $valor = null;
            $clientes = ControladorPresupuesto::ctrMostrarPresupuesto($item, $valor);
            foreach ($clientes as $key => $value) {
              echo '<tr>
                  <td>' . $value["folio_p"] . '</td>
                  <td>' . $value["fecha"] . '</td>
                  <td>' . $value["total"] . '</td>
                  <td>' . $value["id_v"] . '</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarPresupuesto"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarPresupuesto"  foliopresupuesto="' . $value["folio_p"] . '"><i class="fa fa-times"></i></button>
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


<!-- modal editar Presupuesto -->
<!-- Modal -->
<div id="modalEditarPresupuesto" class="modal fade" role="dialog">

  <!-- <div class="modal-dialog"> -->
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" class="formulario" id="formulario" enctype="multipart/form-darta">
        <!--Cabecera-->

        <div class="modal-header" style="background:#3c8dbc;color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Presupuesto</h4>
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

            <!-- Grupo 1 -->
            <div class="row">
              <div class="col-xs-6">
                <!-- EDITAR FEHCA -->
                <div class="form-group formulario__grupo" id="grupo__fecha">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <abbr id="toltipx" title="Edite la fecha">
                      <div class="formulario__grupo-input">
                        <input type="text" class="form-control input-lg " name="editarFecha" id="editarFecha" value="" onkeyup="mayus(this);">
                        <input type="hidden" id="fechaActual" name="fechaActual">
                      </div>
                  </div>
                  <p id="msj" class="formulario__input-error">Edite la fecha</p>
                </div>
              </div>
              <div class="col-xs-6">
                <!-- EDITAR PRECIO-->
                <div class="form-group formulario__grupo" id="grupo__precio">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <abbr id="toltipx" title="Edite el precio">
                      <div class="formulario__grupo-input">
                        <input type="number" class="form-control input-lg " name="editarPrecio" id="editarPrecio" value="" onkeyup="mayus(this);">
                        <input type="hidden" id="precioActual" name="precioActual">
                      </div>
                  </div>
                  <p id="msj" class="formulario__input-error">Edite el precio</p>
                </div>
              </div>
            </div>
            <!-- Grupo 2 -->
            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
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
                      <button class="btn btn-warning btnEditarServicio" idServicio="' . $value["codigo"] . '" data-toggle="modal" data-target="#modalEditarServicio"><i class="fa fa-pencil"></i></button>
                      </abbr>
                      <abbr id="toltipx" title="Cancelar servicio">
                      <button class="btn btn-danger btnEliminarServicio" idServicio="' . $value["codigo"] . '"><i class="fa fa-times"></i></button>
                      </abbr>
                    </div>
                  </td>


                </tr>';
                }
                ?>
              </tbody>
            </table>

            <div id="visible" hidden>

              <form role="form" method="post" class="formulario" id="formulario" enctype="multipart/form-darta">

                <!-- Grupo 1 -->
                <div class="row">
                  <div class="col-xs-4">


                    <!-- EDITAR FEHCA -->
                    <div class="form-group formulario__grupo" id="grupo__concepto">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <abbr id="toltipx" title="Edite el concepto">
                          <div class="formulario__grupo-input">
                            <input type="text" class="form-control input-lg " name="editarConcenpto" id="editarConcenpto" value="" onkeyup="mayus(this);">
                            <input type="hidden" id="conceptoActual" name="conceptoActual">
                          </div>
                      </div>
                      <p id="msj" class="formulario__input-error">Edite el concepto</p>
                    </div>


                  </div>
                  <div class="col-xs-4">


                    <!-- EDITAR FEHCA -->
                    <div class="form-group formulario__grupo" id="grupo__costo">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <abbr id="toltipx" title="Edite el costo">
                          <div class="formulario__grupo-input">
                            <input type="text" class="form-control input-lg " name="editarCosto" id="editarCosto" value="" onkeyup="mayus(this);">
                            <input type="hidden" id="costoActual" name="costoActual">
                          </div>
                      </div>
                      <p id="msj" class="formulario__input-error">Edite el costo</p>
                    </div>


                  </div>

                  <div class="col-xs-4">
                    <!-- EDITAR PRECIO-->
                    <div class="form-group formulario__grupo" id="grupo__tipo">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <abbr id="toltipx" title="Edite el tipo de servicio">
                          <div class="formulario__grupo-input">
                            <input type="number" class="form-control input-lg " name="editarTipo" id="editarTipo" value="" onkeyup="mayus(this);">
                            <input type="hidden" id="tipoActual" name="tipoActual">
                          </div>
                      </div>
                      <p id="msj" class="formulario__input-error">Edite el tipo de servicio</p>
                    </div>
                  </div>
                </div>


                <div class="row text-center">

                  <div class="col-4">
                    <abbr id="toltipx" title="Cancelar formulario del vehículo">
                      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalAgregarC"><i class="fa fa-edit" aria-hidden="true"></i> Guardar Servicio</button>
                    </abbr>
                  </div>


                </div>
              </form>

            </div>


          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <abbr id="toltipx" title="Cancelar formulario del vehículo">
            <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Salir</button>
          </abbr>
          <abbr id="toltipx" title="Guardar formulario del vehículo">
            <button type="submit" class="btn btn-primary btn-lg">Guardar Presupuesto</button>
          </abbr>
        </div>

        <?php



        ?>

      </form>

    </div>

  </div>

</div>





<?php

$borrarPresupuesto = new ControladorPresupuesto();
$borrarPresupuesto->ctrBorrarPresupuestos();

?>