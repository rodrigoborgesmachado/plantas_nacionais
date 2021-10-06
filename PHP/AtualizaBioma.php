<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$url = "http://teste.sunsalesystem.com.br/api/plantasNacionais/biomas/inserir";
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
	"Id": $request->id,
	"Nome": "$request->nome",
	"Distribuicao": "$request->distribuicao",
	"Caracteristicas": "$request->caracteristicas",
	"Fitofisionomia": "$request->fitofisionomia",
	"Observacao" : "$request->observacao",
	"Idusuario" : $request->usuario
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
echo $resp;

curl_close($curl);
/*	
*/
?>