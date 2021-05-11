
  <div class="content-wrapper">

    <section class="content-header">
      
      <h1>
        Usuarios
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Ver Usuarios</li>
      </ol>

    </section>

    <!-- Main content -->
  <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
       
        </div>

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>

              <tr>

                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Ultimo Acceso</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <tr>

                <td>1</td>
                <td>Usuario Administrador</td>
                <td>admin</td>
                <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td>Administrador</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>2021-05-08 12:05:32</td>
                <td>

                  <div class="btn-group">

                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                  </div>

                </td>

              </tr>

            </tbody>

          </table>

        </div>

        <!-- /.box-body -->
      </div>
      <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal agregar usuario -->
<!-- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-darta">
      <!--Cabecera-->

      <div class="modal-header" style="background:#3c8dbc;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Usuario</h4>
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

          <!--Ingresar el usuario-->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>              
            </div>
          </div>

          <!--Ingresar la contraseña-->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>              
            </div>
          </div>

          <!--Ingresar el perfil -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" name="nuevoperfil">

                <option value="">Seleccionar perfil</option>
                <option value="administrador">Administrador</option>
                <option value="Gerente">Gerente</option>
                <option value="Jefetaller">Jefe de taller</option>
                <option value="Secretaria">Secretaria</option>
                <option value="Cajero">Cajero</option>

              </select>            
            </div>
          </div>

          <!--Ingresar foto -->
          <div class="form-group">
            <div class="panel">SUBIR FOTO</div>
            <input type="file" class="nuevaFoto" name="nuevaFoto">

            <p class="help-block">Peso máximo de la foto 2MB</p>

            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          </div>


        </div>

      </div>

      <!--footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
      </div>

      <?php

      $crearUsuario = new ControladorUsuarios();
      $crearUsuario -> ctrCrearUsuario();

      ?>

    </form>

    </div>

  </div>

</div>
