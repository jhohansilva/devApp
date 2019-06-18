<?php
error_reporting(E_ERROR | E_PARSE);

class conectar
{
    public static function conexion()
    {
        // Datos conexión
        $_SERVIDOR_DB = 'localhost';
        $_USUARIO_DB = 'rot';
        $_PASS_DB = '';
        $_DB = 'titans_app';

        try {
            $conexion = new mysqli($_SERVIDOR_DB, $_USUARIO_DB, $_PASS_DB, $_DB);
            $conexion->query("SET NAMES 'utf8'");
            if ($conexion->connect_error) {
                // die("Error en la conexion 16" . $conexion->connect_error);
                return ['codigo' => '-2', 'titulo' => 'error', 'detalle' => "Error en la conexión: " . $conexion->connect_error];
            }
            return $conexion;
        } catch (Exception $e) {
            return ['codigo' => '-2', 'titulo' => 'error', 'detalle' => "Error en la conexión: " . $conexion->connect_error];
        }

    }
}
