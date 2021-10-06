<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$url = "http://teste.sunsalesystem.com.br/api/plantasNacionais/plantas/inserirImagem";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
    "Idplanta":$request->idplanta,
    "Caminho":"$request->caminho",
    "Idusuario":$request->usuario
}
DATA;
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);
echo $resp;

?>