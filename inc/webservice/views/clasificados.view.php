<?php
require_once "./controllers/clasificados.controller.php";

function consultarClasificados($estado)
{
    $consultarClasificados_obj = new clasificados_controller();
    return $consultarClasificados_obj->consultarClasificados_ctrl($estado);
}

function crearClasificado(
    $conjunto,
    $propietario,
    $tipo,
    $categoria,
    $titulo,
    $descripcion,
    $valor,
    $telefono,
    $imagenes
) {
    $clasificados_obj = new clasificados_controller();
    return $clasificados_obj->crearClasificado_ctrl(
        $conjunto,
        $propietario,
        $tipo,
        $categoria,
        $titulo,
        $descripcion,
        $valor,
        $telefono,
        $imagenes
    );
}
