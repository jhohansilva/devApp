<?php
require_once "./controllers/clasificados.controller.php";

function consultarClasificados($estado)
{
    $consultarClasificados_obj = new clasificados_controller();
    return $consultarClasificados_obj->consultarClasificados_ctrl($estado);
}

function crearClasificado($titulo)
{
    // $consultarPropiedades_obj = new propiedades_controller();
    // return $consultarPropiedades_obj->consultarPropiedades_ctrl($idPropietario);
    return ['prueba' => $titulo];
}
