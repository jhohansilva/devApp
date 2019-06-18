<?php
class conectar
{
    public static function conexion()
    {
        // Datos conexión
        $_SERVIDOR_DB = 'localhost';
        $_USUARIO_DB = 'root';
        $_PASS_DB = '';
        $_DB = 'titans_app';

        try {
            $conexion = new mysqli($_SERVIDOR_DB, $_USUARIO_DB, $_PASS_DB, $_DB);
            $conexion->query("SET NAMES 'utf8'");
            if ($conexion->connect_error) {
                die("Error en la conexion " . $conexion->connect_error);
            }
            return $conexion;
        } catch (Exception $e) {
            die("Error en la conexion " . $e->getMessage());
        }

    }
}
