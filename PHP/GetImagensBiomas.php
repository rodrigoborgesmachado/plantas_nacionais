<?php
$idBioma = '';

if (isset($_GET['idBioma'])) {
    $idBioma = $_GET['idBioma'];
} 

$url = "http://teste.sunsalesystem.com.br/api/plantasNacionais/biomas/getImagens?idBioma=" . $idBioma;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);
curl_close($curl);
echo $resp;

?>