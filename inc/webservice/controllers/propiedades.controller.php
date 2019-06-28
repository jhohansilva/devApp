<?php
require_once "./models/propiedades.model.php";

class propiedades_controller
{
    private $propiedades_obj;

    public function __construct()
    {
        $this->propiedades_obj = new propiedades_model();
    }

    public function consultarPropiedades_ctrl($idPropietario)
    {
        $filtro = filter_var($idPropietario, FILTER_SANITIZE_STRING);
        $out = $this->propiedades_obj->consultarPropiedades_mdl($filtro);
        return $out;
    }
}
