/*Editar Vehiculos*/
$(document).on("click",".btnEditarPresupuesto",function(){

    /*Capturando el id*/
    var idPresupuesto = $(this).attr("idPres");

    var datos = new FormData();
    datos.append("idPres",idPresupuesto);

    /*Ajax para traer los datos*/
    $.ajax({

        url:"ajax/venta.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            $("#editarFolio").val(respuesta["folio_p"]);
            $("#editarFecha").val(respuesta["fecha"]);
            $("#editarTotal").val(respuesta["total"]);
            $("#editarVeh").val(respuesta["id_v"]);

            $("#folioActual").val(respuesta["folio_p"]);
            $("#fechaActual").val(respuesta["fecha"]);
            $("#totalActual").val(respuesta["total"]);
            $("#vehActual").val(respuesta["id_v"]);

        }

    });

})
