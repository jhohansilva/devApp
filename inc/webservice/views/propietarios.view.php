<?php
require_once "./controllers/propietarios.controller.php";

function logeo($correo, $clave)
{
    // return getArray('0', $correo, 'prueba');
    $login_obj = new propietarios_controller();
    return $login_obj->logeo_ctrl($correo, $clave);

}
