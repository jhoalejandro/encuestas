<?php
include_once "../AccesoBaseDatos/AlmacenarEncuesta.php";
class GestionarCreacionEncuesta
{

    function procesarCreacionEncuesta($nombreEncuesta, $descripcionPregunta, $respuesta1, $respuesta2, $respuesta3, $respuesta4)
    {
        
        $respuestas = array ($respuesta1, $respuesta2, $respuesta3, $respuesta4);
        $respuestaCreacion = "ERROR";
        $Encuesta = new EncuestaBD;
        $respuestaCreacion =  $Encuesta->almacenarEncuesta($nombreEncuesta, $descripcionPregunta, $respuestas);
        return $respuestaCreacion;
    } 
     
  }

?>