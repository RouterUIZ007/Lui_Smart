/*Editar Presupuestos*/

$(document).on("click",".btnEditarPre",function(){

  /*Capturando el id*/
  var idPre = $(this).attr("idPre");

  var datos = new FormData();
  datos.append("idPre",idPre);

  /*Ajax para traer los datos*/
  $.ajax({

      url:"ajax/ver-presupuesto.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){

          $("#editarFecha").val(respuesta["fecha"]);
          $("#editarPrecio").val(respuesta["precio"]);

          $("#fechaActual").val(respuesta["fecha"]);
          $("#precioActual").val(respuesta["precio"]);       

      }

  });

})

/*Eliminar Presupuestos*/

$(document).on("click",".btnEliminarPresupuesto",function(){

    foliopresupuesto=$(this).attr("foliopresupuesto");

    

    swal({

        title: "¿Está seguro de borrar el Presupuesto?",
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText:'Cancelar',
        confirmButtonText:'¡Si, borrar presupuesto!'
    
      }).then((result)=>{
    
        if(result.value){
    
          window.location = "index.php?ruta=ver-presupuestos&foliopresupuesto="+ foliopresupuesto;
    
        }
    
      })

})