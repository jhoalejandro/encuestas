<?php
    require_once "../lib/nusoap.php";
    require_once "GestionarCreacionEncuesta.php";
   
    
    function crearEncuesta($nombreEncuesta, $descripcionPregunta, $respuesta1, $respuesta2, $respuesta3, $respuesta4) {
            $gestionCreacionEncuesta=new GestionarCreacionEncuesta;
            $respuestaCreacion = $gestionCreacionEncuesta.procesarCreacionEncuesta( $nombreEncuesta, $descripcionPregunta, 
                                                                                $respuesta1, $respuesta2, $respuesta3, 
                                                                                $respuesta4);
            return join(",", array($respuestaCreacion));       
    }
      
   
    $server = new soap_server();
    $server->configureWSDL("encuesta", "urn:encuesta");
      
    $server->register("crearEncuesta",
        array("nombreEncuesta" => "xsd:string", "descripcionPregunta" => "xsd:string", 
            "respuesta1" => "xsd:string", "respuesta2" => "xsd:string", "respuesta3" => "xsd:string",
            "respuesta4" => "xsd:string"),
        array("respuestaEncuesta" => "xsd:string"),
        "urn:encuesta",
        "urn:encuesta#crearEncuesta",
        "rpc",
        "encoded",
        "Crea una encuesta");
   if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );

    $server->service($HTTP_RAW_POST_DATA);
?>