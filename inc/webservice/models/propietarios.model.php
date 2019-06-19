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
                $objDb = $this->db['obj'];
                $stmt = $objDb->prepare("SELECT clave FROM propietarios WHERE correo= ?");
                $stmt->bind_param("s", $correo);
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        // print_r($row);
                        // echo "->" . $row['clave'] . PHP_EOL;
                        // echo "-->" . $clave;
                        if (password_verify($clave, $row['clave'])) {
                            $out = getArray('0', 'correcto', 'Ingresando');
                        } else {
                            $out = getError("Contraseña incorrecta");
                        }
                    }
                } else {
                    $out = getError("Correo electrónico no existe");
                }

                // --> Consulta general
                // $consulta = $objDb->query("SELECT * FROM propietarios");
                // if ($consulta) {
                //     $i = 0;
                //     while ($filas = $consulta->fetch_assoc()) {
                //         $this->$propietarios[] = $filas;
                //         $i++;
                //     }

                //     if ($i == 0) {
                //         $out = getError('No hay registros');
                //     } else {
                //         $out = $this->$propietarios;
                //     }
                // } else {
                //     $out = getError('Ha ocurrido un error en la consulta');
                // }
                $stmt->close();
                $objDb->close();
            } catch (Exception $e) {
                $out = getError('Ha ocurrido un error en la consulta: ' . $e);
            }
        } else {
            $out = $this->db;
        }

        return $out;
    }
}
