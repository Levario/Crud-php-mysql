<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$telefono=$_POST['telefono'];
		$ciudad=$_POST['ciudad'];
		$correo=$_POST['correo'];

		if(!empty($nombre) && !empty($apellidos) && !empty($telefono) && !empty($ciudad) && !empty($correo) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO clientes(nombre,apellidos,telefono,ciudad,correo) VALUES(:nombre,:apellidos,:telefono,:ciudad,:correo)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellidos' =>$apellidos,
					':telefono' =>$telefono,
					':ciudad' =>$ciudad,
					':correo' =>$correo
				));
				header('Location: imprimir.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Turista</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="js/validaciones.js">
	
</head>
<body>
	<div class="contenedor">
		<h2>Agregar Nuevo Turista</h2>
		
	</div>

		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre(iniciando con mayuscula)" class="input__text"  id="nombre"
				onchange="validacionDeNombre()" required>
				<input type="text" name="apellidos" placeholder="Apellidos(iniciando con mayuscula)" class="input__text" id="apellido"
				 onchange="validacionDeApellido()" required>
			</div>
			<div class="form-group">
				<input type="text" name="telefono" placeholder="Teléfono" class="input__text" id='txtPhone' minlength="10", maxlength="10"><span id="spnPhoneStatus"></span>
				<input type="text" name="ciudad" placeholder="Ciudad(comenzando con mayuscula)" class="input__text" id="ciudad" 
				onchange="validacionDeCiudad()" required>
			</div>
		
			<div class="form-group">
					<input type="text" name="correo" id="correo" placeholder="Correo electrónico" class="input__text",
					required minlength="5" , maxlength="50" require>
			</div>
			<div class="btn__group">
				<a href="imprimir.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	
		<footer>
		<div class="footer-copyright text-center py-3">© 2020 Examen U3 y U4:
			<a href="#"> Luis Enrique Jaimes Levario</a>
		  </div>
		</footer>

		<script type="text/javascript">
			
var inputEmail = document.getElementById('correo');
var regExMail = /[a-z0-9.]+@[a-z]+.[a-z]{3}/;
     function validacionDeCorreo() {

if (!regExMail.test(inputEmail.value)) {
alert("CORREO INCORRECTO VALIDALO NUEVAMENTE")
  } 
   };


    var inputNombre = document.getElementById('nombre');
    function validacionDeNombre() {
            if (inputNombre.value.charCodeAt(0) > 64 && inputNombre.value.charCodeAt(0) < 90) {
                console.log('Es correcto');
            } else { 
                alert("Tu nombre debe comenzar con una letra mayúscula ");
              }
     }

    

    var inputApellido = document.getElementById('apellido');
    function validacionDeApellido() {
            if (inputApellido.value.charCodeAt(0) > 64 && inputApellido.value.charCodeAt(0) < 90) {
                console.log('Es correcto');
            } else { 
                alert("Tu Apellido debe comenzar con una letra mayúscula ");
              }
     }

  
     
    var inputCiudad = document.getElementById('ciudad');
    function validacionDeCiudad() {
            if (inputCiudad.value.charCodeAt(0) > 64 && inputCiudad.value.charCodeAt(0) < 90) {
                console.log('Es correcto');
            } else { 
                alert("Tu Ciudad origen debe comenzar con una letra mayúscula ");
              }
     }


		</script>

</body>
</html>
