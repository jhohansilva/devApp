<?php
// require_once '../db/db.php';
// require_once '../core/global.php';
// $obj = new propietarios_model();
// print_r($obj->logeo_mdl('jhohnf.silva@gmail.com', '123456'));

class propietarios_model
{
    private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }

    public function logeo_mdl($correo, $clave)
    {
        if ($this->db['codigo'] == '0') {
            try {
                $con = $this->db['obj'];
                $stmt = $con->prepare("SELECT clave_prop,descrip_prop,correo_prop,nit_prop FROM propietarios WHERE correo_prop = ?");
                $stmt->bind_param("s", $correo);
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        if (password_verify($clave, $row['clave_prop'])) {
                            $mail = $row['correo_prop'];
                            $descrip = $row['descrip_prop'];
                            $nit = $row['nit_prop'];

                            $data = "{'correo' : '$mail','descripcion': '$descrip','nit' : '$nit' }";
                            $out = getArray('0', $data, 'Ingresando');
                        } else {
                            $out = getError("Contraseña incorrecta");
                        }
                    }
                } else {
                    $out = getError("Correo electrónico no existe");
                }
                $stmt->close();
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
