
function mayus(e) {
    e.value = e.value.toUpperCase();
    
}


const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	/* CLIENTE */
	numero: /^\d{0,5}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s ]{1,50}$/, // Letras y espacios, pueden llevar acentos.
	calle: /^[a-zA-Z0-9À-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
	telefono: /^\d{10}$/, // 7 a 14 numeros.
	/* VEHICULO */
	matricula: /^[A-Z]{2}[0-9]{4}$/,
	marca: /^[a-zA-ZÀ-ÿ\s]{1,20}$/,
	modelo: /^[a-zA-Z0-9\s]{1,20}$/,
	color: /^[a-zA-ZÀ-ÿ\s]{1,20}$/,
	observaciones: /^[a-zA-Z0-9À-ÿ\s]{1,50}$/
	/* SERVICIO */
}

const campos = {
	/* CLIENTE */
	nombre: false,
	telefono: false,
	calle: false,
	inter: false,
	exter: false,
	colonia: false,
	/* VEHICULO */
	matricula: false,
	marca: false,
	modelo: false,
	color: false,
	observaciones: false
	/* SERVICIO */
}

const validarFormulario = (e) => {
	/* cliente */
	switch (e.target.name) {
		case "nuevoNombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "nuevoTelefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		case "nuevoCalle":
			validarCampo(expresiones.calle, e.target, 'calle');
		break;
		case "nuevoInter":
			validarCampo(expresiones.numero, e.target, 'inter');
		break;
		case "nuevoExter":
			validarCampo(expresiones.numero, e.target, 'exter');
		break;
		case "nuevoColonia":
			validarCampo(expresiones.calle, e.target, 'colonia');
		break;
	/* VEHICULO */
		case "nuevoMatricula":
			validarCampo(expresiones.matricula, e.target, 'matricula');
		break
		case "nuevoMarca":
			validarCampo(expresiones.marca, e.target, 'marca');
		break
		case "nuevoModelo":
			validarCampo(expresiones.modelo, e.target, 'modelo');
		break
		case "nuevoColor":
			validarCampo(expresiones.color, e.target, 'color');
		break
		case "nuevoObservaciones":
			validarCampo(expresiones.observaciones, e.target, 'observaciones');
		break
		/* SERVICIOS */


	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

