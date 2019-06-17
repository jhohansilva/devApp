<?php
require_once "./models/productos.model.php";

class productos_controller
{
    private $productos_obj;

    public function __construct()
    {
        $this->productos_obj = new productos_model();
    }

    public function get_info_producto_ctrl($item)
    {
        return $this->productos_obj->get_info_producto_mdl(
            filter_var($item, FILTER_SANITIZE_STRING)
        );
    }
}
