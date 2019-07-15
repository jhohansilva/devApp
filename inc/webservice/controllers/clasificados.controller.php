<?php
require_once "./models/clasificados.model.php";

class clasificados_controller
{
    private $clasificados_obj;

    public function __construct()
    {
        $this->clasificados_obj = new clasificados_model();
    }

    public function consultarClasificados_ctrl($estado)
    {
        $filtro = filter_var($estado, FILTER_SANITIZE_STRING);
        $out = $this->clasificados_obj->consultarClasificados_mdl($estado);
        return $out;
    }
}
