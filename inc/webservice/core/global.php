<?php
$_MAIN = 'http://localhost/titanApp/';

function getError($id, $value)
{
    return json_encode(array('codigo' => $id, 'mensaje' => $value));
}
