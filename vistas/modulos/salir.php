<?php

/*Destruimos la secciones*/
session_destroy();


/*Redireccionamos a login*/
echo '<script>

	window.location = "ingreso";

</script>';