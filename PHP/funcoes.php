<?php
include 'bdPrincipal.php';

function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

function BuscaChave($chave){
	$pdo = ConectarPrincipal();
	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'SELECT 1 AS EXISTE FROM CHAVESJWT WHERE CHAVE = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $chave);
		$stm->execute();
		$pdo = null;	
		return utf8_encode(json_encode($stm->fetchAll(PDO::FETCH_ASSOC)));
	}
}

function DeletaChave($chave){
	$pdo = ConectarPrincipal();
	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'DELETE FROM CHAVESJWT WHERE CHAVE = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $chave);
		$stm->execute();
		$pdo = null;	
		return utf8_encode(json_encode($stm->fetchAll(PDO::FETCH_ASSOC)));
	}
}

function InsereChave(){
	$pdo = ConectarPrincipal();
	if($pdo == null)
	{
		echo '<br>deu ruim';
        return null;
	}
	else
	{
        $guid = GUID();
		$sql = 'INSERT INTO CHAVESJWT (CHAVE) VALUES (?)';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $guid);
		$result = $stm->execute();

		$pdo = null;	
	    $r['CHAVE'] = $guid;	
		return json_encode($r);
	}
}

function AtualizaChave($chave){
    DeletaChave($chave);
    $r['CHAVE'] = json_decode(InsereChave())->CHAVE;	
    return json_encode($r);
}



?>