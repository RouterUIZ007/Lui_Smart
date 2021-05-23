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

            <!--r-->
            <div class="form-group">
              <div class="input-group">
                <p style="color: orange">* Campos obligatorios</p>
              </div>
            </div>





            <!--   pueba   AQUI XD-->
            <div class="form-group" id="grupo__nuevoNombre">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese el nombre completo del cliente">
                  <input id="nuevoNombre" type="text" class="form-control input-lg formulario__input" name="nuevoNombre" placeholder="Ingresar nombre" required onkeyup="mayus(this);">
                </abbr>
              </div>
            </div>

            <!--Ingresar nombre-->
            <div class="form-group" id="grupo__nuevoNombre">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <abbr id="toltipx" title="Ingrese el nombre completo del cliente">
                  <input id="nuevoNombre" type="text" class="form-control input-lg formulario__input" name="nuevoNombre" placeholder="Ingresar nombre" required onkeyup="mayus(this);">
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