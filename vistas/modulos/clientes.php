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

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarC">Agregar Cliente</button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Calle</th>
              <th>Numero de Interior</th>
              <th>Numero de Exterior</th>
              <th>Colonia</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item = null;
            $valor = null;
            $clientes = ControladorCliente::ctrMostrarClientes($item, $valor);
            foreach ($clientes as $key => $value) {
              echo '<tr>
                  <td>' . $value["id_c"] . '</td>
                  <td>' . $value["nombre"] . '</td>
                  <td>' . $value["telefono"] . '</td>
                  <td>' . $value["calle"] . '</td>
                  <td>' . $value["inter"] . '</td>
                  <td>' . $value["exter"] . '</td>
                  <td>' . $value["colonia"] . '</td>
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
                    <input type="text" class="form-control input-lg " name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar el Nombre" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el nombre completo, sin caracteres especiales ni numeros</p>
            </div>
            <!--Ingresar telefono-->
            <div class="form-group formulario__grupo" id="grupo__telefono">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese el telefono">
                  <div class="formulario__grupo-input">
                    <input type="number" class="form-control input-lg " name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingresar el Telefono" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el numero de 10 digitos</p>
            </div>
            <!--Ingresar Calle-->
            <div class="form-group formulario__grupo" id="grupo__calle">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese la calle">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="nuevoCalle" id="nuevoCalle" placeholder="Ingresar la Calle" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese la calle, sin caracteres especiales</p>
            </div>

            <!--Ingresar num inter-->
            <div class="form-group formulario__grupo" id="grupo__inter">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese numero interior del domicilio">
                  <div class="formulario__grupo-input">
                    <input type="number" class="form-control input-lg " name="nuevoInter" id="nuevoInter" placeholder="Ingresar el Numero interior" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el numero interior de la calle y menor a 5 dígitos</p>
            </div>
            <!--Ingresar num exter-->
            <div class="form-group formulario__grupo" id="grupo__exter">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese numero exterior del domicilio">
                  <div class="formulario__grupo-input">
                    <input type="number" class="form-control input-lg " name="nuevoExter" id="nuevoExter" placeholder="Ingresar el Numero exterior" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese el numero exterior de la calle y menor a 5 dígitos</p>
            </div>
            <!--Ingresar col-->
            <div class="form-group formulario__grupo" id="grupo__colonia">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Agregue la colonia">
                  <div class="formulario__grupo-input">
                    <input type="text" class="form-control input-lg " name="nuevoColonia" id="nuevoColonia" placeholder="Ingresar la Colonia" required required onkeyup="mayus(this);">
                  </div>
              </div>
              <p id="msj" class="formulario__input-error">Ingrese la calle, sin caracteres especiales</p>
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