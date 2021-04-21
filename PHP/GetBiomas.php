<?php
include 'bd.php';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

echo getBiomas($request->nomeBioma);

function getBiomas($nomeBioma)
{
	$pdo = Conectar();
	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$pdo->exec("SET NAMES 'utf8';");
		$sql = 'SELECT S.ID AS ID, U.ID AS IDUSUARIO, U.NOME AS NOMEUSUARIO, S.NOME AS NOME, S.DISTRIBUICAO AS DISTRIBUICAO, S.CARACTERISTICAS AS CARACTERISTICAS, S.FITOFISIONOMIA AS FITOFISIONOMIA, S.OBSERVACAO AS OBSERVACAO FROM BIOMAS S, USUARIOS U WHERE S.IDUSUARIO = U.ID';
		
		if($nomeBioma){
			$sql .= ' WHERE UPPER(S.NOME) LIKE UPPER("%' . $nomeBioma . '%")';
		}

		$stm = $pdo->prepare($sql);
		$stm->execute();
		$pdo = null;	
		return utf8_encode(json_encode($stm->fetchAll(PDO::FETCH_ASSOC)));
	}
}

?>