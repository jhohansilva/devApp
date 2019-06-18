<?php
// Access control
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

// Libs
require_once './webservice/core/global.php';
require_once './webservice/core/lib/nusoap.php';

if (verificarTrans($_SERVER)) {
    // Config client
    $_WSDL = $_MAIN . "inc/webservice/server.php?wsdl";
    $client = new nusoap_client($_WSDL, true);
    $err = $client->getError();
    $method = $_SERVER['HTTP_METHOD'];

    if ($err) {
        print_r($err);
        exit();
    } else {
        try {
            switch ($method) {
                case 'logeo':
                    $out = $client->call('logeo', $_POST);
                    break;
                default:
                    $out = getError('Método sin definir');
                    break;
            }

            print_r(json_encode($out)); // Respuesta de salida
            // print_r($out); // Respuesta de salida

        } catch (Exception $e) {
            print_r('Error');
        }
    }
} else {
    print_r(getJson('-1', 'error', 'Acceso denegado'));
    // header('Location: http://google.com');
}

function verificarTrans($server)
{
    if (@isset($_SERVER['HTTP_METHOD'])
        && @isset($_SERVER['HTTP_ORIGIN'])
        && $server['HTTP_ORIGIN'] == "http://127.0.0.1:5500") {
        return true;
    } else {
        return false;
    }
}
