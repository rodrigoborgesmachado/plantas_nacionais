<?php
include 'bd.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

echo getPlantas($request->bioma, $request->codigoPlanta, $request->nomePlanta);

function getPlantas($bioma, $codigoPlanta, $nomePlanta)
{
	$pdo = Conectar();
	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'SELECT P.ID AS ID, B.ID AS BIOMA, B.NOME AS NOMEBIOMA, U.ID AS IDUSUARIO U.NOME AS NOMEUSUARIO, P.NOMECIENTIFICO AS NOME, P.NOMEPOPULAR AS NOMEPOPULAR, P.HABITATE AS HABITATE, P.FOLHA AS FOLHA, P.FLOR AS FLOR, P.FRUTO AS FRUTO, P.FAMILIA AS FAMILIA, P.TRIBO AS TRIBO FROM PLANTAS P, BIOMAS B, USUARIOS U WHERE P.IDBIOMA = B.ID AND P.IDUSUARIO = U.ID';
		
		if($bioma != null && $bioma != ''){
			$sql .= ' AND P.IDBIOMA = ' . $bioma . '';
		}
		if($codigoPlanta != null && $codigoPlanta != ''){
			$sql .= ' AND P.ID = "' . $codigoPlanta . '"';
		}
		if($nomePlanta != null && $nomePlanta != ''){
			$sql .= ' AND (UPPER(P.NOMECIENTIFICO) LIKE UPPER("%' . $nomePlanta . '%") OR UPPER(P.NOMEPOPULAR) LIKE UPPER("%' . $nomePlanta . '%"))';
		}
		$stm = $pdo->prepare($sql);
		$stm->execute();
		$pdo = null;	
		
		return utf8_encode(json_encode($stm->fetchAll(PDO::FETCH_ASSOC)));
	}
}

?>