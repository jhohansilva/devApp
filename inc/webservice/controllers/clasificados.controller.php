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

    public function crearClasificado_ctrl(
        $conjunto,
        $propietario,
        $tipo,
        $categoria,
        $titulo,
        $descripcion,
        $valor,
        $telefono,
        $imagenes
    )
    {
        $filtro = filter_var($estado, FILTER_SANITIZE_STRING);
        $out = $this->clasificados_obj->crearClasificado_mdl(
            filter_var($conjunto, FILTER_SANITIZE_NUMBER_INT),
            filter_var($propietario, FILTER_SANITIZE_NUMBER_INT),
            filter_var($tipo, FILTER_SANITIZE_NUMBER_INT),
            filter_var($categoria, FILTER_SANITIZE_NUMBER_INT),
            filter_var($titulo, FILTER_SANITIZE_STRING),
            filter_var($descripcion, FILTER_SANITIZE_STRING),
            filter_var($valor, FILTER_SANITIZE_STRING),
            filter_var($telefono, FILTER_SANITIZE_NUMBER_INT),
            filter_var($imagenes, FILTER_SANITIZE_URL)
        );
        return $out;
    }
}
