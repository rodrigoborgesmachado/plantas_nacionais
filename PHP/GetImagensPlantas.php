<?php
$idPlanta = '';

if (isset($_GET['idPlanta'])) {
    $idPlanta = $_GET['idPlanta'];
} 

$url = "http://teste.sunsalesystem.com.br/api/plantasNacionais/plantas/getImagens?idPlanta=" . $idPlanta;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);
curl_close($curl);
echo $resp;

?>