<?php
require_once "./controllers/propiedades.controller.php";

function consultarPropiedades($idPropietario)
{
    $consultarPropiedades_obj = new propiedades_controller();
    return $consultarPropiedades_obj->consultarPropiedades_ctrl($idPropietario);
}
