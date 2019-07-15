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
                    $out = $client->call($method, $_POST);
                    break;
                case 'consultarPropiedades':
                    $out = $client->call($method, $_POST);
                    break;
                case 'consultarClasificados':
                    // print_r($method);
                    $out = $client->call($method, $_POST);
                    break;
                case 'crearClasificado':
                    $res = _imagenesClasificados($_FILES);
                    // print_r($res);
                    if ($res[0]['codigo'] == '0') {
                        $_POST['imagenes'] = $res[0]['detalle'];
                        print_r($_POST);
                        $out = $client->call('crearClasificado', $_POST);
                    } else {
                        $out = $res;
                    }
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
    // print_r(getJson('-1', 'error', $_SERVER['HTTP_ORIGIN']));
    // header('Location: http://google.com');
}

function _imagenesClasificados($images)
{
    $rutas = '';
    foreach ($images as $idx => $valor) {
        $retornar = getArray('0', 'Correcto', '0');
        $rutaSubida = "imagenesClasificados/";
        $rutaActual = $valor['tmp_name'];
        $nombreActual = 'IMG-' . $idx . _getDate() . '.png';
        if (!move_uploaded_file($rutaActual, $rutaSubida . $nombreActual)) {
            $retornar = getArray('-1', 'Error', 'Ha ocurrido un error subiendo el archivo: ' . $valor['name']);
            break;
        } else {
            $rutas .= $nombreActual . ',';
            $retornar = getArray('0', 'Correcto', $rutas);
        }
    }

    return $retornar;
}

function _getDate()
{
    return date('Y') . date('m') . date('d') . date('Y') . date('H') . date('i') . date('s');
}

function verificarTrans($server)
{
    if (@isset($_SERVER['HTTP_METHOD'])
        && @isset($_SERVER['HTTP_ORIGIN'])
        && ($server['HTTP_ORIGIN'] == "http://127.0.0.1:5500"
            || $server['HTTP_ORIGIN'] == "http://localhost"
            || $server['HTTP_ORIGIN'] == "file://")) {
        return true;
    } else {
        return false;
    }
}
