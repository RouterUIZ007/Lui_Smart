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
          $("#editarPrecio").val(respuesta["total"]);
          $("#editarId").val(respuesta["folio_p"]);
          $("#editarVehi").val(respuesta["id_v"]);

          $("#fechaActual").val(respuesta["fecha"]);
          $("#precioActual").val(respuesta["total"]);    
          $("#idActual").val(respuesta["folio_p"]);       
          $("#vehiActual").val(respuesta["id_v"]);       

      }

  });

})

/*Eliminar Presupuestos*/

$(document).on("click",".btnEliminarPresupuesto",function(){

  idPre=$(this).attr("idPre");

    

    swal({

        title: "¿Está seguro de eliminar el presupuesto?",
        text: "¡Si no lo está, puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText:'Cancelar',
        confirmButtonText:'¡Si, eliminar el presupuesto!'
    
      }).then((result)=>{
    
        if(result.value){
    
          window.location = "index.php?ruta=ver-presupuestos&idPre="+ idPre;
    
        }
    
      })

})

/*Imprimir Presupuesto*/
$(".tablas").on("click",".btnImprimirPresupuesto",function(){

  var idPre = $(this).attr("idPre");
  
  window.open("extensiones/tcpdf/presupuesto.php?folio_p2="+idPre,"_blank");

})

