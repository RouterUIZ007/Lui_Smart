<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Inicio
      <small>Panel de Control</small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Tablero</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <br>
    <br>
    <?php


    if ($_SESSION["perfil"] == "Secretaria") {
      echo '<!-- Small boxes (Stat box) -->
  <div class="row">
    ';
      echo '
    <div class="col-lg-4 col-xs-12 col-md-6">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner text-center">
          <br><br><br><br>
          <h3>Clientes</h3>
          <p><br><br><br></p>
        </div>
        <div class="icon">
          <i class="fa fa-users" aria-hidden="true"></i>
        </div>
        <a href="clientes" class="small-box-footer">
          Clic aquí <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>';
      echo '
    <div class="col-lg-4 col-xs-12 col-md-6">
      <!-- small box -->
      <div class="small-box bg-teal">
        <div class="inner text-center">
          <br><br><br><br>
          <h3>Vehículos</h3>
          <p><br><br><br></p>
        </div>
        <div class="icon">
          <i class="fa fa-car" aria-hidden="true"></i>
        </div>
        <a href="vehiculos" class="small-box-footer">
          Clic aquí <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-12 col-md-6">
    <!-- small box -->
    <div class="small-box bg-blue">
      <div class="inner text-center">
        <br><br><br><br>
        <h3>Reportes</h3>
        <p><br><br><br></p>
      </div>
      <div class="icon">
        <i class="fa fa-bar-chart" aria-hidden="true"></i>
      </div>
      <a href="reportes" class="small-box-footer">
        Clic aquí <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  </div>
  <!-- /.row -->';
    }




    if ($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller") {

      echo '<!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-xs-12 col-md-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
          <div class="inner text-center">
            <br><br><br><br>
            <h3>Presupuestos</h3>
            <p><br><br><br></p>
          </div>

          <div class="icon">
            <i class="fa fa-file-text" aria-hidden="true"></i>
          </div>
          <a href="presupuesto" class="small-box-footer">
            Clic aquí <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>';
    }

    if ($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller") {

      echo '
      <div class="col-lg-4 col-xs-12 col-md-6">
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner text-center">
            <br><br><br><br>
            <h3>Clientes</h3>
            <p><br><br><br></p>
          </div>
          <div class="icon">
            <i class="fa fa-users" aria-hidden="true"></i>
          </div>
          <a href="clientes" class="small-box-footer">
            Clic aquí <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>';
    }

    if ($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller") {
      echo '
      <div class="col-lg-4 col-xs-12 col-md-6">
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner text-center">
            <br><br><br><br>
            <h3>Vehículos</h3>
            <p><br><br><br></p>
          </div>
          <div class="icon">
            <i class="fa fa-car" aria-hidden="true"></i>
          </div>
          <a href="vehiculos" class="small-box-footer">
            Clic aquí <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->';
    }





    if ($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Cajero") {

      echo '<br>
    <br>
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-xs-12 col-md-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner text-center">
            <br><br><br><br>
            <h3>Ventas</h3>
            <p><br><br><br></p>
          </div>
          <div class="icon">
            <i class="fa fa-usd" aria-hidden="true"></i>
          </div>
          <a href="venta" class="small-box-footer">
            Clic aquí <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>';
    }

    if ($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller") {
      echo '<!-- ./col -->
      <div class="col-lg-4 col-xs-12 col-md-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner text-center">
            <br><br><br><br>
            <h3>Reportes</h3>
            <p><br><br><br></p>
          </div>
          <div class="icon">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
          </div>
          <a href="reportes" class="small-box-footer">
            Clic aquí <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>';
    }

    if ($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "Jefetaller") {
      echo '<!-- ./col -->
      <div class="col-lg-4 col-xs-12 col-md-6">
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner text-center">
            <br><br><br><br>
            <h3>Usuarios</h3>
            <p><br><br><br></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="usuarios" class="small-box-footer">
            Clic aquí <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->';
    }
    ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->