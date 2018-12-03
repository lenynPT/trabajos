<?php 

	session_start();

	require_once("../modelo/Usuario_modelo.php");
	$user = new Usuario_modelo("../modelo/Conectar.php");

	//Esto servirá para poder desplegar el historial
	$_SESSION['USUARIO_ACTUAL'] = $_POST['codigo'];

	if (isset($_POST['observacion'])) {
		# code...
		//guardamos la observación del docto
		$observacion = $_POST["observacion"];
		$codigoID = $_POST["codigo"];

		if ($codigoID != 111) {
			# code...
			$user->set_observacion($observacion, $codigoID);

			$respuesta="SE GUARDO CORRECTAMENTE";
			
		}else{
			$respuesta = "NO SE ELIGIÓ PACIENTE!!";
		}

		echo $respuesta;



	}else if (isset($_POST['cardiograma'])) {
		# code...
		$codigo = $_POST['codigo'];

		switch ($codigo) {
			case '70598957': // Usuario con cardiograma
				# code...
				$_SESSION['URL'] = "https://thingspeak.com/channels/636903/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15&fbclid=IwAR1R3LgloPHEWYKFr1Be_yj36wxQA7f6_1fZJL0QnIDjwm-COzCyWcgl3rE";
				
				echo $_SESSION['URL'];

				break;
			
			default:
				# code...
				$_SESSION['URL'] = "http://localhost/tesisL/sistema%20de%20cardio/vista/img/CORAZON.gif";
				echo $_SESSION['URL'];
				break;
		}
	
	}

 ?>