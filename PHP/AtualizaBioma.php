<?php
include 'bd.php';
include 'ValidaJWT.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$validacao = json_decode(RetornaValidacao($request->Chave));

if($validacao->Result == '200'){
	echo atualizaBioma($request->id,
		$request->nome, 
		$request->distribuicao,
		$request->caracteristicas,
		$request->fitofisionomia,
		$request->observacao,
		$validacao->Chave
	);
}
else{
	echo RetornaValidacao($request->Chave);
}


function atualizaBioma($id, $nome, $distribuicao, $caracteristicas, $fitofisionomia, $observacao, $chave)
{
	$pdo = Conectar();
	$result = 'True';

	if($pdo == null)
	{
		$result = 'Não conectou no banco';
	}
	else
	{
		$sql = 'UPDATE BIOMAS SET NOME = ?, DISTRIBUICAO = ?, CARACTERISTICAS = ?, FITOFISIONOMIA = ?, OBSERVACAO = ? 
			    WHERE ID = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $nome);
		$stm->bindValue(2, $distribuicao);
		$stm->bindValue(3, $caracteristicas);
		$stm->bindValue(4, $fitofisionomia);
		$stm->bindValue(5, $observacao);
		$stm->bindValue(6, $id);
		
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
	$r['nome'] = $nome;
	$r['distribuicao'] = $distribuicao;
	$r['caracteristicas'] = $caracteristicas;
	$r['fitofisionomia'] = $fitofisionomia;
	$r['observacao'] = $observacao;
	$r['Chave'] = $chave;

	return json_encode($r);
}

?>