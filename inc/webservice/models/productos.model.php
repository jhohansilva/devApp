<?php

class productos_model
{

    public function get_info_producto_mdl($item)
    {
        $url = 'http://45.58.34.159/ecomerce/pedidos/dlls/M1001.DLL';

        $data = array('importarhtml' => '800223811|1|0G10092S37077');

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ),
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === false) {$result = 'error';}

        // var_dump($result);
        // $result = "0G10092S37077  |BATERIA NS40ZL DER 40B19L-BHD                               |0G10092S37077  |               |00000018000000|40B19L         |00000100|UNIDA";
        $result = explode('|', $result);
        // $stack = array();
        // for ($i = 0; $i < count($result); $i++) {
        //     array_push($stack,$i);
        // }

        return preg_replace('/\s+/', '', $result[5]);
        // return 'JH';
    }
}
