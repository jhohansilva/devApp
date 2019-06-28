<?php
$_MAIN = 'http://localhost/devApp/';
// $_MAIN = 'http://localhost/titanApp/';

// Métodos globales
function getJson($id, $titulo, $detalle)
{
    // return json_encode(['codigo' => $id, 'titulo' => $titulo, 'detalle' => $detalle]);
    return json_encode([
        "info" => [
            'codigo' => $id,
            'titulo' => $titulo,
            'detalle' => $detalle,
        ],
    ]);
}

function getArray($id, $titulo, $detalle)
{
    // return ['codigo' => $id, 'titulo' => $titulo, 'detalle' => $detalle];
    return [
        "info" => [
            'codigo' => $id,
            'titulo' => $titulo,
            'detalle' => $detalle,
        ],
    ];

}

function getError($detalle)
{
    // return ['codigo' => '-1', 'titulo' => 'error', 'detalle' => $detalle];
    return [
        "info" => [
            'codigo' => '-1',
            'titulo' =>
            'error', 'detalle' => $detalle,
        ],
    ];
}
