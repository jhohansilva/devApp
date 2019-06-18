<?php
require_once '../db/db.php';

$obj = new propietarios_model();
print_r($obj->logeo_mdl('test', '123'));

class propietarios_model
{
    private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }

    public function logeo_mdl($correo, $clave)
    {
        if ($this->db['codigo'] != '-2') {
            try {

                // $consulta = $this->db->query("SELECT * FROM propietarios WHERE correo = '$correo'");
                // if ($consulta) {
                //     $user = $consulta->fetch();
                //     $out = $user;
                // $i = 0;
                // while ($filas = $consulta->fetch_assoc()) {
                //     $this->empleados[] = $filas;
                //     $i++;
                // }

                // if ($i == 0) {
                //     $out = getError('No hay registros');
                // } else {
                //     // $out = getError('hay registros');
                //     $out = $this->empleados;
                // }
                // } else {
                //     $out = getError('Ha ocurrido un error en la consulta');
                // }
            } catch (Exception $e) {
                $out = getError('Ha ocurrido un error en la consulta');
            }
        } else {
            $out = $this->db;
        }

        $out = $this->db;
        return $out;
    }
}
