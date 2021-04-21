<?php
include 'bd.php';
include 'ValidaJWT.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$validacao = json_decode(RetornaValidacao($request->Chave));

if($validacao->Result == '200'){
	echo inserePlanta($request->bioma, 
		$request->nomeCientifico,
		$request->nomePopular,
		$request->habitate,
		$request->folha,
		$request->flor,
		$request->fruto,
		$request->familia,
		$request->tribo,
		$request->usuario,
		$validacao->Chave
	);
}
else{
	echo RetornaValidacao($request->Chave);
}


function inserePlanta($bioma, $nomecientifico, $nomepopular, $habitate, $folha, $flor, $fruto, $familia, $tribo, $usuario, $chave)
{
	$pdo = Conectar();
	$result = 'True';

	if($pdo == null)
	{
		$result = 'Não conectou no banco';
	}
	else
	{
		$sql = 'INSERT INTO PLANTAS (IDBIOMA, NOMECIENTIFICO, NOMEPOPULAR, HABITATE, FOLHA, FLOR, FRUTO, FAMILIA, TRIBO, IDUSUARIO) 
			    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, (int)$bioma);
		$stm->bindValue(2, $nomecientifico);
		$stm->bindValue(3, $nomepopular);
		$stm->bindValue(4, $habitate);
		$stm->bindValue(5, $folha);
		$stm->bindValue(6, $flor);
		$stm->bindValue(7, $fruto);
		$stm->bindValue(8, $familia);
		$stm->bindValue(9, $tribo);
		$stm->bindValue(10, $usuario);
		
		if($stm->execute() == false)
		{
			$result = 'False';
		}
		else{
			$result = 'True';
		}

		$pdo = null;	
	}
	
	$r['Result'] = $result;
	$r['bioma']=$bioma;
	$r['nomecientifico']=$nomecientifico;
	$r['nomepopular']=$nomepopular;
	$r['habitate']=$habitate;
	$r['folha']=$folha;
	$r['flor']=$flor;
	$r['fruto']=$fruto;
	$r['familia']=$familia;
	$r['tribo']=$tribo;
	$r['usuario']=$usuario;
	$r['Chave'] = $chave;

	return json_encode($r);
}

?>