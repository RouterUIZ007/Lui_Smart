<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Presupuestos
    </h1>

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
            <h4>Vehiculo</h4>
            <button class="btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregarV"><i class="fa fa-car" aria-hidden="true"></i>  Agregar</button>

          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <h4>Usuario</h4>
            <button class="btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregarC"><i class="fa fa-user-plus" aria-hidden="true"></i>  Agregar</button>

          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->




    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Agregar Presupuesto</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <!--  -->
        <form role="form" method="post" enctype="multipart/form-darta">
          <!--Cabecera-->

         <!--  <div class="modal-header" style="background:#3c8dbc;color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Agregar</h5>
          </div> -->
          <!--Cuerpo-->

          <!--Ingresar concepto-->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoConcepto" placeholder="Ingresar Concepto" required>
            </div>
          </div>

          <!--Ingresar el costo-->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="number" class="form-control input-lg" name="nuevoCosto" placeholder="Ingresar Costo" required>
            </div>
          </div>

          <!--Ingresar el Servicio -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" name="nuevoServicio">

                <option value="">Seleccionar Servicio</option>
                <option value="Hojalatería">Hojalatería</option>
                <option value="Pintura">Pintura</option>

              </select>
            </div>
          </div>

          <div class="row justify-content-center">

            <div class="col-md-2 col-md-offset-3">
              <div class="form-group">
                <button type="button" class="btn btn-block btn-danger">Salir</button>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-2 col-md-offset-1">
              <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">Guardar</button>
              </div>
            </div>
          </div>
      </div>
      <?php
      $crearUsuarios = new ControladorUsuarios();
      $crearUsuarios->ctrCrearUsuario();
      ?>

      </form>
      <!--  -->
    </div>
    <!-- /.box-body -->


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

            <!--Ingresar Matricula-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaMatricula" placeholder="Ingresar Matricula" required>
              </div>
            </div>

            <!--Ingresar el Marca-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoMarca" placeholder="Ingresar Marca" required>
              </div>
            </div>

            <!--Ingresar la Modelo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoModelo" placeholder="Ingresar Modelo" required>
              </div>
            </div>

            <!--Ingresar la Color-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoColor" placeholder="Ingresar Color" required>
              </div>
            </div>

            <!--Ingresar la Observaciones-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoObservaciones" placeholder="Ingresar Observaciones" required>
              </div>
            </div>

            <!--Ingresar el Cliente -->
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
            </div>
          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Vehiculo</button>
        </div>

        <?php

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();

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

            <!--Ingresar nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <!--Ingresar Telefono-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Telefono" required>
              </div>
            </div>

            <!--Ingresar Calle-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoCalle" placeholder="Ingresar Calle" required>
              </div>
            </div>
            <!--Ingresar Ncalle-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoNcalle" placeholder="Ingresar Ncalle" required>
              </div>
            </div>
            <!--Ingresar Colonia-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoColonia" placeholder="Ingresar Colonia" required>
              </div>
            </div>

            


          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </div>

        <?php

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>
