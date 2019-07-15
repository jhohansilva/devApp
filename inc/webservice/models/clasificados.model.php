<?php
// require_once '../db/db.php';
// require_once '../core/global.php';
// $obj = new propietarios_model();
// print_r($obj->logeo_mdl('jhohnf.silva@gmail.com', '123456'));

class clasificados_model
{
    private $db;
    private $clasificados;

    public function __construct()
    {
        $this->db = conectar::conexion();
        $this->clasificados = [];
    }

    public function consultarClasificados_mdl($estado)
    {
        if ($this->db['codigo'] == '0') {
            try {
                $con = $this->db['obj'];
                $stmt = $con->query("CALL consultarClasificados('$estado')", MYSQLI_STORE_RESULT);
                if ($stmt) {
                    while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                        $this->clasificados[] = $row;
                    }

                    $stmt->free();

                    if (sizeof($this->clasificados) > 0) {
                        $out = getArray('0', 'Correcto', $this->clasificados);
                    } else {
                        $out = getArray('-3', 'Error', 'No se encontraron clasificados');
                    }
                } else {
                    $out = getError('Ha ocurrido un error en la consulta: consultarClasificados()');
                }
                $con->close();
            } catch (Exception $e) {
                $out = getError('Ha ocurrido un error en la consulta: ' . $e);
            }
        } else {
            $out = $this->db;
        }

        return $out;
    }
}
