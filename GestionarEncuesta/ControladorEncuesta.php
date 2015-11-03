<?php
include_once "../LogicaNegocioEncuesta/GestionarCreacionEncuesta.php";
require_once "../lib/nusoap.php";
/*
Clase encargada de llamar el servicio web de CrearEncuestaWS que se encarga de crear la encuesta en el sistema
*/  

class ContorladorEncuesta
{
    function gestionarCreacionEncuesta($nombreEncuesta, $descripcionPregunta, $respuestas)
    {

        $cliente = new nusoap_client("http://crearencuesta.azurewebsites.net/consultarEncuestas.php?wsdl", true);
        $error = $cliente->getError();

        if ($error) 
        {
            return false;
            
        }

        $respuesta = $cliente->call("crearEncuesta", array("nombreEncuesta" => $nombreEncuesta, "descripcionPregunta" => $descripcionPregunta, 
                                    "respuesta1" => $respuestas['respuesta1'],
                                    "respuesta2" =>$respuestas['respuesta2'],  
                                    "respuesta3" => $respuestas['respuesta3'], 
                                    "respuesta4" => $respuestas['respuesta4']));

        if ($cliente->fault) {
            return false;
        
        }
        else {
            $error = $cliente->getError();
            if ($error) 
            {
                return false;
            }
            else 
            {   

                return $respuesta;

            }
        }



    }
}     
   
?>

