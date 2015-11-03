<HTML>
<head>
	Medimos SA - Creacion de Encuestas
</head>
<BODY>

<FORM METHOD="post" ACTION="crearEncuesta.php">


<p>Nombre Encuesta: <input type="text" name="nombreEncuesta" size="30" ></p>

<p>Preguntas a Crear
<p>Nombre Pregunta 1: <input type="text" name="nombrePregunta" size="30" ></p>
<p>Respuesta 1: <input type="text" name="valorRespuesta1" size="30" ></p>
<p>Respuesta 2: <input type="text" name="valorRespuesta2" size="30" ></p>
<p>Respuesta 3: <input type="text" name="valorRespuesta3" size="30" ></p>
<p>Respuesta 4: <input type="text" name="valorRespuesta4" size="30" ></p>

<p><input type="submit" value="Crear Encuesta" name="CrearEncuesta"> 
</p>
</FORM>
</BODY>
<HTML>
<?php

include_once "../GestionarEncuesta/ControladorEncuesta.php";
if (isset($_POST['CrearEncuesta'])) {
	$nombreEncuesta=$_POST["nombreEncuesta"];
	$descripcionPregunta= $_POST['nombrePregunta'];
	$respuestas = array( 
		'respuesta1' =>$_POST['valorRespuesta1'] ,
		'respuesta2' =>$_POST['valorRespuesta2'] ,
		'respuesta3' =>$_POST['valorRespuesta3'] ,
		'respuesta4' =>$_POST['valorRespuesta4'] 
		);
	$controladorEncuesta = new ContorladorEncuesta;
	$respuesta= $controladorEncuesta->gestionarCreacionEncuesta($nombreEncuesta, $descripcionPregunta, $respuestas);
	
	if($respuesta="EXITO")
	{

		echo "Se creo exitosamente la encuesta ".$nombreEncuesta;
	}
	else
	{
		echo "No se creo la encuesta";

	}
	}
?>