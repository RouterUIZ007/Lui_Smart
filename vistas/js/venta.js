/*Editar Vehiculos*/
$(document).on("click", ".btnEditarPresupuesto", function () {

    /*Capturando el id*/
    var idPresupuesto = $(this).attr("idPres");

    var datos = new FormData();
    datos.append("idPres", idPresupuesto);

    /*Ajax para traer los datos*/
    $.ajax({

        url: "ajax/venta.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#editarFolio").val(respuesta["folio_p"]);
            $("#editarFecha").val(respuesta["fecha"]);
            $("#editarTotal").val(respuesta["total"]);
            $("#editarVeh").val(respuesta["Matricula"]);

            $("#folioActual").val(respuesta["folio_p"]);
            $("#fechaActual").val(respuesta["fecha"]);
            $("#totalActual").val(respuesta["total"]);
            $("#vehActual").val(respuesta["Matricula"]);

        }

    });

})
/* boton mostrar  */
function mostrar() {
    div = document.getElementById('efectivo');
    div.style.display = '';
    iva();
    total();
}

function cerrar() {
    div = document.getElementById('efectivo');
    div.style.display = 'none';
}
/* datos para pagar */
function iva() {
    var precio = document.getElementById("editarTotal").value;
    var IVA = precio * 0.16;
    var s = document.getElementById("editarIva");
    console.log(IVA.toFixed(2));
    s.value = IVA.toFixed(2);

}
function total() {
    var dinero = document.getElementById("editarTotal").value;
    var iva = document.getElementById("editarIva").value;
    var total = parseFloat(dinero) + parseFloat(iva);
    console.log(total.toFixed(2));
    var s = document.getElementById("editarTotal2");
    s.value = total.toFixed(2);
}
function cambio(e) {
    var total = document.getElementById("editarTotal2").value;
    var dinero = e.value;
    var cambio = dinero - total;
    /* 	console.log(total); */
    if (cambio > 0) {
        var s = document.getElementById("editarCambio");
        console.log(cambio.toFixed(2));
        s.value = cambio.toFixed(2);
    }
}


/*Imprimir Presupuesto*/
$(".tablas").on("click",".btnImprimirPresupuesto",function(){

    var idPre = $(this).attr("idPre");
    
    window.open("extensiones/tcpdf/presupuesto.php?folio_p2="+idPre,"_blank");
  
  })