/*Editar Vehiculos*/
$(document).on("click",".btnEditarVehiculo",function(){

    /*Capturando el id*/
    var idVehiculo = $(this).attr("idVehiculo");

    var datos = new FormData();
    datos.append("idVehiculo",idVehiculo);

    /*Ajax para traer los datos*/
    $.ajax({

        url:"ajax/vehiculos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            

            $("#editarMatricula").val(respuesta["Matricula"]);
            $("#editarMarca").val(respuesta["marca"]);
            $("#editarColor").val(respuesta["color"]);
            $("#editarObservaciones").val(respuesta["observaciones"]);
            $("#editarModelo").val(respuesta["modelo"]);

            $("#matriculaActual").val(respuesta["Matricula"]);
            $("#marcaActual").val(respuesta["marca"]);
            $("#colorActual").val(respuesta["color"]);
            $("#observacionesActual").val(respuesta["observaciones"]);
            $("#modeloActual").val(respuesta["modelo"]);

        }

    });

})

/*Eliminar Vehiculo*/
$(document).on("click",".btnEliminarVehiculo",function(){

    idVehiculo=$(this).attr("idVehiculo");

    swal({

        title: "¿Está seguro de eliminar el vehículo?",
        text: "¡Si no lo está, puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText:'Cancelar',
        confirmButtonText:'¡Si, eliminar el vehículo!'
    
      }).then((result)=>{
    
        if(result.value){
    
          window.location = "index.php?ruta=vehiculos&idVehiculo="+ idVehiculo;
    
        }
    
      })

})
