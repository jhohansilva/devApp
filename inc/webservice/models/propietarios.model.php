<?php

class propietarios_model
{
    private $db;
    private $empleados;

    public function __construct()
    {
        $this->db = conectar::conexion();
        $this->empleados = array();
    }

    public function logeo_mdl($correo, $clave)
    {
        try {
            $stmt =$this->db->prepare("SELECT * FROM propietarios WHERE correo=:correo");
            $stmt->execute(['correo' => $correo]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $out = $user;

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

        // $out = ['test' => '123'];
        return json_encode($out);
    }
}
