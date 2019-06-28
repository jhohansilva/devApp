<?php
require_once 'db/db.php';
require_once 'core/global.php';
require_once 'core/lib/nusoap.php';

require_once 'views/propietarios.view.php';
require_once 'views/propiedades.view.php';

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

$server->register('logeo',
    ['correo' => 'xsd:string', 'clave' => 'xsd:string'],
    ['data' => 'tns:ArrayOfString'],
    $urn,
    $urn . '#logeo'
);

$server->register('consultarPropiedades',
    ['propietario' => 'xsd:string'],
    ['data' => 'tns:ArrayOfString'],
    $urn,
    $urn . '#consultarPropiedades'
);

$server->service(file_get_contents("php://input"));
