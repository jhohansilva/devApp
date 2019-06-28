<?php
// require_once '../db/db.php';
// require_once '../core/global.php';
// $obj = new propiedades_model();
// print_r($obj->consultarPropiedades_mdl('1'));

class propiedades_model
{
    private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }

    public function consultarPropiedades_mdl($idPropietario)
    {
        if ($this->db['codigo'] == '0') {
            try {
                $con = $this->db['obj'];

                $stmt = $con->query("CALL consultarPropiedades('$idPropietario')", MYSQLI_STORE_RESULT);
                $propiedades = [];
                if ($stmt) {
                    while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                        $propiedades[] = $row;
                    }

                    $stmt->free();

                    if (sizeof($propiedades) > 0) {
                        $out = getArray('0', 'Correcto', $propiedades);
                    } else {
                        $out = getArray('-3', 'Error', 'No se encontraron propiedades registradas');
                    }
                } else {
                    $out = getError('Ha ocurrido un error en la consulta: consultarPropiedades()');
                }
            } catch (Exception $e) {
                $out = getError('Ha ocurrido un error en la consulta: ' . $e);
            }
        } else {
            $out = $this->db;
        }

        return $out;
    }
}
