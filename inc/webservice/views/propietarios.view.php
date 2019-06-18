<?php
require_once "./controllers/propietarios.controller.php";

function logeo($correo, $clave)
{
    // return array('codigo' => $correo,'detalle' => $clave);
    $login_obj = new propietarios_controller();
    return $login_obj->logeo_ctrl($correo, $clave);

}
