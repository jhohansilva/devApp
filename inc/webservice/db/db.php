<?php
error_reporting(E_ERROR | E_PARSE);

class conectar
{
    public static function conexion()
    {
        // Datos conexión
        // $_SERVIDOR_DB = 'localhost';
        // $_USUARIO_DB = 'root';
        // $_PASS_DB = '';
        // $_DB = 'titans_app';

        $_SERVIDOR_DB = '190.8.176.175:3306';
        $_USUARIO_DB = 'titans_externo';
        $_PASS_DB = 'X901287171g';
        $_DB = 'titans_app';

        try {
            $conexion = new mysqli($_SERVIDOR_DB, $_USUARIO_DB, $_PASS_DB, $_DB);
            $conexion->query("SET NAMES 'utf8'");
            if ($conexion->connect_error) {
                return ["info" => ['codigo' => '-2', 'titulo' => 'error', 'detalle' => "Error en la conexión: " . $conexion->connect_error]];
            }

            return ['codigo' => '0', 'obj' => $conexion];
        } catch (Exception $e) {
            return ["info" => ['codigo' => '-2', 'titulo' => 'error', 'detalle' => "Error en la conexión: " . $conexion->connect_error]];
        }

    }
}
