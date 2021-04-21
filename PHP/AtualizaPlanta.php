<?php
include 'bd.php';
include 'ValidaJWT.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$validacao = json_decode(RetornaValidacao($request->Chave));

if($validacao->Result == '200'){
	echo atualizaPlanta($request->codigoPlanta,
		$request->bioma, 
		$request->nomeCientifico,
		$request->nomePopular,
		$request->habitate,
		$request->folha,
		$request->flor,
		$request->fruto,
		$request->familia,
		$request->tribo,
		$validacao->Chave
	);
}
else{
	echo RetornaValidacao($request->Chave);
}


function atualizaPlanta($id, $bioma, $nomecientifico, $nomepopular, $habitate, $folha, $flor, $fruto, $familia, $tribo, $chave)
{
	$pdo = Conectar();
	$result = 'True';

	if($pdo == null)
	{
		$result = 'Não conectou no banco';
	}
	else
	{
		$sql = 'UPDATE PLANTAS SET IDBIOMA = ?, NOMECIENTIFICO = ?, NOMEPOPULAR = ?, HABITATE = ?, FOLHA = ?, FLOR = ?, FRUTO = ?, FAMILIA = ?, TRIBO = ? 
			    WHERE ID = ?';
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
		$stm->bindValue(10, $id);
		
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
	$r['id'] = $id;
	$r['bioma']=$bioma;
	$r['nomecientifico']=$nomecientifico;
	$r['nomepopular']=$nomepopular;
	$r['habitate']=$habitate;
	$r['folha']=$folha;
	$r['flor']=$flor;
	$r['fruto']=$fruto;
	$r['familia']=$familia;
	$r['tribo']=$tribo;
	$r['Chave'] = $chave;

	return json_encode($r);
}

?>