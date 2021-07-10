/*Editar Clientes*/

$(document).on("click",".btnEditarCliente",function(){

    /*Capturando el id*/
    var idCliente = $(this).attr("idCliente");

    var datos = new FormData();
    datos.append("idCliente",idCliente);

    console.log(datos);
    /*Ajax para traer los datos*/
    $.ajax({

        url:"ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarCalle").val(respuesta["calle"]);
            $("#editarInter").val(respuesta["inter"]);
            $("#editarExter").val(respuesta["exter"]);
            $("#editarColonia").val(respuesta["colonia"]);

            $("#nombreActual").val(respuesta["nombre"]);
            $("#telefonoActual").val(respuesta["telefono"]);
            $("#calleActual").val(respuesta["calle"]);
            $("#interActual").val(respuesta["inter"]);
            $("#exterActual").val(respuesta["exter"]);
            $("#coloniaActual").val(respuesta["coloniaActual"]);

            

        }

    });

})

/*Eliminar Clientes*/
$(document).on("click",".btnEliminarCliente",function(){

    idCliente=$(this).attr("idCliente");

    swal({

        title: "¿Está seguro de eliminar el cliente?",
        text: "¡Si no lo está, puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText:'Cancelar',
        confirmButtonText:'¡Si, eliminar el cliente!'
    
      }).then((result)=>{
    
        if(result.value){
    
          window.location = "index.php?ruta=clientes&idCliente="+idCliente;
    
        }
    
      })

})



