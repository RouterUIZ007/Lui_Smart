<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Venta
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Venta</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">
        <h1 class="text-center">Seleccione el Presupuesto a Cobrar</h1>

        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarV">Agregar Venta</button> -->

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width: 10px"># Folio</th>
              <th>Fecha</th>
              <th>Total</th>
              <th>Vehiculo</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php
            $item = null;
            $valor = null;

            $press = ControladorVenta::ctrMostrarPresupuestoVenta($item, $valor);

            foreach ($press as $key => $value) {
              echo '
              <tr>
                <td>' . $value["folio_p"] . '</td>
                <td>' . $value["fecha"] . '</td>
                <td>' . $value["total"] . '</td>
                <td>' . $value["id_v"] . '</td>
                <td>
                  <div class="btn-group">
                  <button class="btn btn-success btnEditarPresupuesto" idPres="' . $value["folio_p"] . '" data-toggle="modal" data-target="#modalAgregarVenta"> <i class="fa fa-pencil"> Cobrar Presupuesto</i></button>
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


<!-- modal  Venta -->
<!-- Modal -->
<div id="modalAgregarVenta" class="modal fade" role="dialog">

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
                <p>* Verifique Datos</p>
              </div>
            </div>


            <!--folio-->
            <div class="form-group formulario__grupo" id="">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Folio de presupuesto">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="editarFolio" id="editarFolio">
                    <input type="hidden" id="folioActual" name="folioActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error"></p>
            </div>

            <!--Fecha-->
            <div class="form-group formulario__grupo" id="">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Fecha del presupuesto">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="editarFecha" id="editarFecha">
                    <input type="hidden" id="fechaActual" name="fechaActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error"></p>
            </div>

            <!--Ingresar Modelo-->
            <div class="form-group formulario__grupo" id="grupo__modelo">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Total del presupuesto">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="editarTotal" id="editarTotal">
                    <input type="hidden" id="totalActual" name="totalActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error"></p>
            </div>

            <!--Ingresar la Color-->
            <div class="form-group formulario__grupo" id="">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Vehiculo del presupuesto">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="editarVeh" id="editarVeh">
                    <input type="hidden" id="vehActual" name="vehActual">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error"></p>
            </div>


          </div>
        </div>

        <!--footer-->
        <div class="modal-footer">
          <abbr id="toltipx" title="Cancelar formulario del vehículo">
            <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Salir</button>
          </abbr>
          <abbr id="toltipx" title="Guardar formulario del vehículo">
            <button type="submit" class="btn btn-primary btn-lg">Cobrar</button>
          </abbr>
        </div>



        <?php

        $editarVenta = new ControladorVenta();
        $editarVenta->ctrAgregarVenta();

        ?>


      </form>
    </div>
  </div>
</div>