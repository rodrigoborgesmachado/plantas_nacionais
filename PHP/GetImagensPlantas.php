<?php
include 'bd.php';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

echo getImagensPlantas($request->idPlanta);

function getImagensPlantas($idplanta)
{
	$pdo = Conectar();
	if($pdo == null)
	{
		echo 'Não foi possível conectar';
	}
	else
	{
		$pdo->exec("SET NAMES 'utf8';");
		$sql = 'SELECT IDPLANTA, CAMINHO FROM IMAGENSPLANTA';
		$sql .= ' WHERE IDPLANTA = ' . $idplanta . '';

		$stm = $pdo->prepare($sql);
		$stm->execute();
		$pdo = null;	
		return utf8_encode(json_encode($stm->fetchAll(PDO::FETCH_ASSOC)));
	}
}

?>