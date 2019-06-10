<?php
header("Access-Control-Allow-Origin: *");

$return = [
    "cod" => "99",
    "sesion" => $_POST['sesion']
];

echo json_encode($return);
