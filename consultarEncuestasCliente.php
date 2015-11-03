<?php
    require_once "lib/nusoap.php";
    $cliente = new nusoap_client("http://localhost/encuestas/consultarEncuestas.php?wsdl", true);
    // $cliente = new soapclient("http://localhost/producto.php", true); 
    $error = $cliente->getError();
    if ($error) {
        echo "<h2>Constructor error aqui 0</h2><pre>" . $error . "</pre>";
    }
      
    $result = $cliente->call("getProd", array("categoria" => "encuestas"));
      
    if ($cliente->fault) {
        echo "<h2>Fault</h2><pre>aqui 1 ";
        print_r($result);
        echo "</pre>";
    }
    else {
        $error = $cliente->getError();
        if ($error) {
            echo "<h2>Error</h2><pre> aqui 2 " . $error . "</pre>";
        }
        else {
            echo "<h2>Libros</h2><pre>";
            echo $result;
            echo "</pre>";
        }
    }
?>