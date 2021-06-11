<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Ventas
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Ver Ventas</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">


            <!-- PHP -->




            <!--TITULO-->
            <div class="">
              <h3>Datos de presupuesto</h3>
            </div>
            <br>
            <br>





            <!-- BOTON BUSAR -->
            <form role="form" method="post" class="formulario" id="formulario" enctype="multipart/form-darta">
              <div class="row justify-content-center">

                <div class="col-md-4 col-md-offset-2">
                  <div class="form-group formulario__grupo" id="grupo__concepto">
                    <div class="input-group">
                      <div class="formulario__grupo-input">
                        <input type="text" value="" class="form-control input-lg " name="idPresu" id="idPresu" placeholder="ID de presupuesto a cobrar" onkeyup="mayus(this);">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-md-offset-0">
                  <div class="form-group">
                    <abbr id="toltipx" title="Guardar presupuesto">
                      <button type="submit" name="btn1" class="btn btn-block btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                    </abbr>
                  </div>
                </div>
              </div>
              <?php
                  if (!empty($_POST['idPresu'])) {
                    $item = $_POST['idPresu'];
                  }else{
                    $item = 1;
                  }
                  /* echo json_encode($item); */
                  $valor = null;
                  $IDSSS = ControladorPresupuesto::ctrMostrarPresupuestoVenta($item, $valor);




                  if ($IDSSS == false) {
                    $item = 1;
                    $IDSSS = ControladorPresupuesto::ctrMostrarPresupuestoVenta($item, $valor);

                  }


                  /* echo json_encode($IDSSS); */
                  #echo json_encode($total[0][0]);
              ?>
              <!-- EDITAR FEHCA -->
              <div class="form-group formulario__grupo" id="grupo__id">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                  <abbr id="toltipx" title="Id de presupuesto">
                    <div class="formulario__grupo-input">
                      <?php
                      echo '
                      <input type="text" class="form-control input-lg" name="idValor" id="idValor"
                      placeholder="Total del presupuesto" value="' . $IDSSS[0] . '" disabled required>'
                      ?>
                    </div>
                </div>
                <p id="msj" class="formulario__input-error">Id de presupuesto</p>
              </div>
              <br>
              <br>




              <!-- Grupo 1 -->
              <div class="row">
                <div class="col-xs-6">
                  <!-- EDITAR FEHCA -->
                  <div class="form-group formulario__grupo" id="grupo__fecha">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                      <abbr id="toltipx" title="Fecha de presupuesto">
                        <div class="formulario__grupo-input">
                          <?php
                          echo '
                            <input type="text" class="form-control input-lg " name="nuevoFecha" id="nuevoFecha" placeholder="Fecha de presupuesto" value="' . $IDSSS[1] . '">
                            '
                          ?>
                        </div>
                    </div>
                    <p id="msj" class="formulario__input-error">Fecha de presupuesto</p>
                  </div>
                </div>




                <div class="col-xs-6">


                  <!-- EDITAR FEHCA -->
                  <div class="form-group formulario__grupo" id="grupo__precio">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                      <abbr id="toltipx" title="Precio de presupuesto">
                        <div class="formulario__grupo-input">
                          <?php
                          echo '
                          <input type="text" class="form-control input-lg " name="nuevoPrecio" id="nuevoPrecio" placeholder="Precio de presupuesto" value="' . $IDSSS[3] . '">
                            '
                          ?>
                        </div>
                    </div>
                    <p id="msj" class="formulario__input-error">Precio de repsupuesto</p>
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
                  </tr>
                </thead>
                <tbody>
                  <?php

                  if ($IDSSS[2] != null) {
                    $ite = $IDSSS[2];
                  }else{
                    $ite = 1;
                  }
                  /* CAMBIAR PARA QUE CARGUE un ID de presupuesto espedificoo */
                  $serv = ControladorServicios::ctrMostrarServicioPre($ite);

                  foreach ($serv as $key => $value) {
                    echo '<tr>
                  <td>' . $value["codigo"] . '</td>
                  <td>' . $value["Id_v"] . '</td>
                  <td>' . $value["concepto"] . '</td>
                  <td>' . $value["costo"] . '</td>
                  <td>' . $value["tipo"] . '</td>



                </tr>';
                  }
                  ?>
                </tbody>
              </table>


            </form>
            <!-- END PHP -->

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            Footer
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->
      </div>
      <!-- Right column -->
      <div class="col-md-6">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>






          <div class="box-body">

            <!--Ingresar num inter-->
            <div class="form-group formulario__grupo" id="grupo__inter">
              <h3>Total</h3>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                <abbr id="toltipx" title="Ingrese numero interior del domicilio">
                  <div class="formulario__grupo-input">

                    <?php
                    echo '
                      <input type="text" class="form-control input-lg " name="nuevoTotal" id="nuevoTotal" placeholder="Numero interior" value="' . $IDSSS[3] . '">
                      '
                    ?>
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el numero interior de la calle y menor a 5 dígitos</p>
            </div>
            <!--Ingresar num inter-->
            <div class="form-group formulario__grupo" id="grupo__inter">
              <h3>Cantidad a pagar</h3>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                <abbr id="toltipx" title="Ingrese numero interior del domicilio">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="nuevoCantidad" id="nuevoCantidad" placeholder="Numero interior" onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el numero interior de la calle y menor a 5 dígitos</p>
            </div>
            <!--Ingresar num inter-->
            <div class="form-group formulario__grupo" id="grupo__inter">
              <h3>Cambio</h3>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                <abbr id="toltipx" title="Ingrese numero interior del domicilio">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="nuevoCambio" id="nuevoCambio" placeholder="Numero interior" onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el numero interior de la calle y menor a 5 dígitos</p>
            </div>


          </div>
          <!-- /.box-body -->








          <div class="box-footer">
            <!-- Agregar presupuesto TOTAL -->
            <div class="row justify-content-center">
              <div class="col-md-2 col-md-offset-3">
                <div class="form-group">
                  <abbr id="toltipx" title="Cancelar presupuesto">
                    <button type="button" class="btn btn-block btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
                  </abbr>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-2 col-md-offset-1">
                <div class="form-group">
                  <abbr id="toltipx" title="Guardar presupuesto">
                    <button type="submit" name="btn1" class="btn btn-block btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cobrar</button>
                  </abbr>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-footer -->


        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->