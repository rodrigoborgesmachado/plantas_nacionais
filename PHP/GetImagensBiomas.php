<?php
include 'bd.php';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

echo getImagensBiomas($request->idBioma);

function getImagensBiomas($idBioma)
{
	$pdo = Conectar();
	if($pdo == null)
	{
		echo 'Não foi possível conectar';
	}
	else
	{
		$pdo->exec("SET NAMES 'utf8';");
		$sql = 'SELECT IDBIOMA, CAMINHO FROM IMAGENSBIOMA';
		$sql .= ' WHERE IDBIOMA = ' . $idBioma . '';

		$stm = $pdo->prepare($sql);
		$stm->execute();
		$pdo = null;	
		return utf8_encode(json_encode($stm->fetchAll(PDO::FETCH_ASSOC)));
	}
}

?>