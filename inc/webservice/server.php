<?php
require_once 'db/db.php';
require_once 'core/global.php';
require_once 'core/lib/nusoap.php';

require_once 'views/propietarios.view.php';
require_once 'views/propiedades.view.php';
require_once 'views/clasificados.view.php';

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

$server->register('consultarClasificados',
    ['estado' => 'xsd:string'],
    ['data' => 'tns:ArrayOfString'],
    $urn,
    $urn . '#consultarClasificados'
);

$server->register('crearClasificado',
    [
        'conjuntoClasificado' => 'xsd:string',
        'nitPropietario' => 'xsd:string',
        'tipoClasificado' => 'xsd:string',
        'categoriaClasificado' => 'xsd:string',
        'tituloClasificado' => 'xsd:string',
        'descripcionClasificado' => 'xsd:string',
        'valorClasificado' => 'xsd:float',
        'telefonoClasificado' => 'xsd:string',
        'imagenes' => 'xsd:string',
    ],
    ['data' => 'tns:ArrayOfString'],
    $urn,
    $urn . '#crearClasificado'
);

$server->service(file_get_contents("php://input"));
