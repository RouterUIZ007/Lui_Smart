/*SUBIENDO LA FOTO DE USUARIO*/
$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
    EDITAR USUARIO
=============================================*/

$(document).on("click",".btnEditarUsuario",function(){

  /*Capturando en una variable el id de usuario cuando le damos clic*/

  var idUsuario = $(this).attr("idUsuario");
  
  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  /*ajax para traer los datos de la base de datos*/

  $.ajax({

    url:"ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

      //console.log("respuesta",respuesta);

      //mostrando los datos en los campos 

      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarUsuario").val(respuesta["usuario"]);
      $("#editarperfil").html(respuesta["rol"]);


      //por si no vamos a editar 
      $("#editarperfil").val(respuesta["rol"]);
      $("#fotoActual").html(respuesta["foto"]);
      $("#passwordActual").val(respuesta["password"]);


      if(respuesta["foto"] != ""){

        $(".previsualizar").attr("src",respuesta["foto"]);

      }

    }

  });

})

/*=============================================
    ACTIVAR USUARIO
=============================================*/
$(document).on("click",".btnActivar",function(){

  /*Capturando el id del usuario*/
  var idUsuario = $(this).attr("idUsuario");

  /*Capturando el estado del usuario*/
  var estadoUsuario = $(this).attr("estadoUsuario");

  /*Actualizacion de la base de datos con ajax*/

  var datos= new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({

    url:"ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta){

      if(window.matchMedia("(max-width:767px)").matches){

        swal({
          type: "success",
          title: "El usuario ha sido actualizado",
          confirmButtonText: "Cerrar",
          }).then(function(result){
              if (result.value) {

              window.location = "usuarios";

              }
            });

      }

    }


  })

  if(estadoUsuario == 0){

    $(this).removeClass('btn-success');
    $(this).addClass('btn-danger');
    $(this).html('Desactivado');
    $(this).attr('estadoUsuario',1);

  }else{

    $(this).addClass('btn-success');
    $(this).removeClass('btn-danger');
    $(this).html('Activado');
    $(this).attr('estadoUsuario',0);

  }


})

/*=============================================
    Revisar Usuario Repetido
=============================================*/

$('#nuevoUsuario').change(function(){

  $(".alert").remove();

  var usuario = $(this).val();
  var datos = new FormData();
  datos.append("validarUsuario", usuario);

  $.ajax({

    url:"ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

      if(respuesta){

        $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');
        $("#nuevoUsuario").val("");


      }

    }


  })

})

/*=============================================
    Eliminar Usuario
=============================================*/

$(document).on("click",".btnEliminarUsuario",function(){

  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({

    title: "¿Está seguro de borrar el usuario?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor:'#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText:'Cancelar',
    confirmButtonText:'¡Si, borrar usuario!'

  }).then((result)=>{

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })


})