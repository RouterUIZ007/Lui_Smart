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
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Geberar Presupuesto</h3>

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

          <div class="modal-header" style="background:#3c8dbc;color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar</h4>
          </div>
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

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      <?php
      $crearUsuarios = new ControladorUsuarios();
      $crearUsuarios->ctrCrearUsuario();
      ?>

      </form>
      <!--  -->
    </div>
    <!-- /.box-body -->




    <div class="box-footer">
      Footer
    </div>

  <!-- Default box -->
  <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Geberar Presupuesto</h3>

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

          <div class="modal-header" style="background:#3c8dbc;color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar</h4>
          </div>
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

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
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