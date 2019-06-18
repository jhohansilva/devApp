<?php
$_MAIN = 'http://localhost/devApp/';


// Métodos globales
function getJson($id, $titulo, $detalle)
{
    return json_encode(['codigo' => $id, 'titulo' => $titulo, 'detalle' => $detalle]);
}

function getArray($id, $titulo, $detalle)
{
    return ['codigo' => $id, 'titulo' => $titulo, 'detalle' => $detalle];
}

function getError($detalle)
{
    return ['codigo' => '-1', 'titulo' => 'error', 'detalle' => $detalle];
}