<?php
require_once "./models/propietarios.model.php";

class propietarios_controller
{
    private $propietarios_obj;

    public function __construct()
    {
        $this->propietarios_obj = new propietarios_model();
    }

    public function logeo_ctrl($correo, $clave)
    {
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
        $correo = preg_replace('/\s+/', '', $correo);

        if (!isset($correo)) {
            $out = getError('Ingresa un correo electrónico');
        } else if (!preg_match($email_exp, $correo)) {
            $out = getError('Ingresa un correo electrónico válido');
        } else if (!isset($clave)) {
            $out = getError('Ingresa una contraseña');
        } else if (strlen($clave) < 6) {
            $out = getError('La contraseña debe contener más de 6 carácteres');
        } else {
            $clave = preg_replace('/\s+/', '', $clave);
            $out = $this->propietarios_obj->logeo_mdl(strtolower($correo), $clave);
        }
        
        return $out;
    }
}
