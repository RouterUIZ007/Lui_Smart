/*Editar Presupuestos*/


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