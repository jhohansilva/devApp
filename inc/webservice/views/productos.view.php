<?php
require_once "./controllers/productos.controller.php";

function consultarProducto_ind($item)
{
    $productos_obj = new productos_controller();
    return $productos_obj->get_info_producto_ctrl($item);
}
