<?php
require_once 'db/db.php';
require_once 'core/global.php';
require_once 'core/lib/nusoap.php';

require_once 'views/propietarios.view.php';

$server = new nusoap_server();

$namespace = $_MAIN . 'inc/webservice/server.php';
$urn = 'urn:app';

$server->configureWSDL('titanApp', $urn);
$server->wsdl->schemaTargetNamespace = $namespace;

$server->wsdl->addComplexType(
    'ArrayOfString',
    'complexType',
    'array',
    'sequence',
    '',
    array(
        'itemName' => array(
            'name' => 'itemName',
            'type' => 'xsd:string',
            'minOccurs' => '0',
            'maxOccurs' => 'unbounded',
        ),
    )
);

// $server->wsdl->addComplexType(
//     'infoReturn',
//     'complextType',
//     'struct',
//     'sequence',
//     '',
//     array(
//         'codigo' => array('name' => 'code', 'type' => 'xsd:string'),
//         'titulo' => array('name' => 'titulo', 'type' => 'xsd:string'),
//         'detalle' => array('name' => 'detalle', 'type' => 'xsd:string'),
//     )
// );

$server->register('logeo',
    ['correo' => 'xsd:string', 'clave' => 'xsd:string'],
    // ['data' => 'tns:infoReturn'],
    // ['data' => 'tns:ArrayOfString'],
    ['data' => 'xsd:string'],
    $urn,
    $urn . '#logeo'
);

$server->service(file_get_contents("php://input"));
