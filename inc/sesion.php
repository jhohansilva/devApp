<?php
header("Access-Control-Allow-Origin: *");

$return = [
    "cod" => "00",
    "sesion" => $_POST['sesion']
];

echo json_encode($return);
