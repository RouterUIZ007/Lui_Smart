/*Editar Clientes*/

$(document).on("click", ".btnEditarServicio", function () {

  /*Capturando el id*/
  var idServicio = $(this).attr("idServicio");

  var datos = new FormData();
  datos.append("idServicio", idServicio);

  /*Ajax para traer los datos*/
  $.ajax({

    url: "ajax/servicio.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {

      $("#editarConcepto").val(respuesta["concepto"]);
      $("#editarCosto").val(respuesta["costo"]);
      $("#editarServicio").html(respuesta["tipo"]);

      $("#conceptoActual").val(respuesta["concepto"]);
      $("#costoActual").val(respuesta["costo"]);
      $("#editarServicio").html(respuesta["tipo"]);



    }

  });

})

/*Eliminar Servicio*/
$(document).on("click", ".btnEliminarServicio", function () {

  idServicio = $(this).attr("idServicio");

  swal({

    title: "¿Está seguro de eliminar el servicio?",
    text: "¡Si no lo está, puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: '¡Si, eliminar el servicio!'

  }).then((result) => {

    if (result.value) {

      window.location = "index.php?ruta=presupuesto&idServicio=" + idServicio;

    }

  })

})



