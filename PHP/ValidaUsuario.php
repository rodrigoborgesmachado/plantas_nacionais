<?php
$login = '';

if (isset($_GET['login'])) {
    $login = $_GET['login'];
} 

if (isset($_GET['pass'])) {
    $pass = $_GET['pass'];
} 

$url = "http://teste.sunsalesystem.com.br/api/plantasNacionais/login?login=" . $login . "&senha=" .$pass ;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);
curl_close($curl);
echo $resp;

?>