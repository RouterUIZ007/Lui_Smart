<?php

if($_SESSION["perfil"] == "Cajero"){

  echo '<script>

    window.location = "inicio";
  
  </script>';

  return;
  
}
?>


<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Reportes
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Generar Reportes</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Generar Reportes</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>



      <div class="box-body">
        <form role="form" method="post" class="formulario" id="formulario" enctype="multipart/form-darta">
          <h5 class="box-title text-center">Seleccione el rango de fechas para el reporte</h5>


          <br>
          <!-- DATA 1 -->

          <div class="row">
            <div class="col-xs-12 col-md-6">
              <label>Desde:</label>
              <div class="input-group-addon">
                <div class="form-group grupodefechas">
                  <input type="text" class="form-control input-lg" name="fecha1" id="fecha1">
                  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span> -->
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6">
              <label>Hasta:</label>
              <div class="input-group-addon">
                <div class="form-group  grupodefechas">
                  <input type="text" class="form-control input-lg" name="fecha2" id="fecha2">
                  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span> -->
                </div>
              </div>
            </div>
          </div>

          <br>

          <!--folio-->


          <br>

          <!--footer-->
          <div class="text-center">
            <abbr id="toltipx" title="Generar reporte en PDF">
              <button id="botonpdf" type="submit" class="btn btn-primary btn-lg">Generar PDF </button>
            </abbr>
          </div>



          <?php

          $crearReporte = new ControladorReporte();
          $crearReporte->generarPdf();

          ?>




        </form>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->






  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Buscar Reportes</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>



      <div class="box-body">

        <h5 class="box-title text-center">Tabla de Reportes (Búsqueda del FOLIO de venta)</h5>

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width: 10px"># Folio</th>
              <th>Fecha</th>
              <th>Presupuesto</th>
              <th>Nombre del Empleado</th>
              <th>Total</th>
              <th>Subtotal</th>
              <th>Pago</th>
              <th>Cambio</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php
            $item = null;
            $valor = null;
            $reports = ControladorVenta::ctrMostrarVentas($item, $valor);

            foreach ($reports as $key => $value) {
              echo '
              <tr>
                <td>' . $value["folio_v"] . '</td>
                <td>' . $value["fecha"] . '</td>
                <td>' . $value["folio_p"] . '</td>
                <td>' . $value["nombre"] . '</td>
                <td>' . $value["total"] . '</td>
                <td>' . $value["subtotal"] . '</td>
                <td>' . $value["cantidad"] . '</td>
                <td>' . $value["cambio"] . '</td>
                <td class="text-center" style="width: 200 px">
                  <div class="btn-group">
                    
                  
                  </div>
                </td>
              </tr>';
            }


            ?>

          </tbody>

        </table>
      </div>





    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->

















</div>
<!-- /.content-wrapper -->