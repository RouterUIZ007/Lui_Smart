<?php

if($_SESSION["perfil"] == "Secretaria" || $_SESSION["perfil"] == "Cajero"){

  echo '<script>

    window.location = "inicio";
  
  </script>';

  return;
  
}
?>

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

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <!-- <th>Foto</th> -->
              <th>Rol</th>
              <th>Estado</th>
              <th>Último acceso</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <!--Llenando la tabla con la base de datos-->

            <?php

            /*Se pasan estas variables por que reutilizamos el metodo mostrar usuarios*/
            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            foreach ($usuarios as $key => $value) {

              /*pasando los datos de la bd a las filas*/
              echo '<tr>

                      <td>' . $value["id"] . '</td>
                      <td>' . $value["nombre"] . '</td>
                      <td>' . $value["usuario"] . '</td>';

              /*   if($value["foto"]!= ""){

                        echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                      }else{

                        echo ' <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                      } */

              echo '<td>' . $value["rol"] . '</td>';

              if ($value["estado"] != 0) {

                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
              } else {

                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
              }

              echo '<td>' . $value["ultimo_login"] . '</td>
                      <td>

                        <div class="btn-group">

                          <abbr id="toltipx" title="Editar los datos del usuario"> 
                          <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                          </abbr>

                          <abbr id="toltipx" title="Eliminar los datos del usuario"> 
                          <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>
                          </abbr>

                        </div>
                      </td>
                    </tr>';
            }

            ?>



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
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
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
                  <option value="Jefetaller">Jefe de taller</option>
                  <option value="Secretaria">Secretaria</option>
                  <option value="Cajero">Cajero</option>

                </select>
              </div>
            </div>

            <!--Ingresar foto -->
            <!-- <div class="form-group">
        <div class="panel">SUBIR FOTO</div>
        <input type="file" class="nuevaFoto" name="nuevaFoto">

        <p class="help-block">Peso máximo de la foto 2MB</p>

        <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

      </div> -->


          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">

          <abbr id="toltipx" title="Cancelar registro de usuario"> 
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
          </abbr>

          <abbr id="toltipx" title="Guardar datos del usuario"> 
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>
          </abbr>
        </div>

        <?php

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>




<!-- modal editar usuario -->
<!-- Modal -->
<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-darta">
        <!--Cabecera-->

        <div class="modal-header" style="background:#3c8dbc;color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Usuario</h4>
        </div>

        <!--Cuerpo-->

        <div class="modal-body">

          <div class="box-body">

            <!--Ingresar nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
              </div>
            </div>

            <!--Ingresar el usuario-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
              </div>
            </div>

            <!--Ingresar la contraseña-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">
              </div>
            </div>

            <!--Ingresar el perfil -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="editarperfil">

                  <option value="" id="editarperfil"></option>
                  <option value="administrador">Administrador</option>
                  <option value="Gerente">Gerente</option>
                  <option value="Jefetaller">Jefe de taller</option>
                  <option value="Secretaria">Secretaria</option>
                  <option value="Cajero">Cajero</option>

                </select>
              </div>
            </div>

            <!--Ingresar foto -->
            <!-- <div class="form-group">
        <div class="panel">SUBIR FOTO</div>
        <input type="file" class="nuevaFoto" name="editarFoto">

        <p class="help-block">Peso máximo de la foto 2MB</p>

        <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

        <input type="hidden" name="fotoActual" id="fotoActual">

      </div> -->


          </div>

        </div>

        <!--footer-->
        <div class="modal-footer">
          <abbr id="toltipx" title="Salir"> 
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
          </abbr>

          <abbr id="toltipx" title="Guardar modificaciones de los datos"> 
          <button type="submit" class="btn btn-primary">Modificar Usuario</button>
          </abbr>

        </div>



        <?php

        $editarUsuario = new ControladorUsuarios();
        $editarUsuario->ctrEditarUsuario();

        ?>



      </form>

    </div>

  </div>

</div>

<?php

$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();

?>