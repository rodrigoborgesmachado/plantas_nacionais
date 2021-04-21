<?php
include 'bd.php';
include 'ValidaJWT.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$validacao = json_decode(RetornaValidacao($request->Chave));

if($validacao->Result == '200'){
	echo insereImagemPlanta($request->idbioma, 
		$request->caminho,
		$validacao->Chave
	);
}
else{
	echo RetornaValidacao($request->Chave);
}


function insereImagemPlanta($planta, $caminho, $chave)
{
	$pdo = Conectar();
	$result = 'True';

	if($pdo == null)
	{
		$result = 'Não conectou no banco';
	}
	else
	{
		$sql = 'INSERT INTO IMAGENSPLANTA (IDPLANTA, CAMINHO) 
			    VALUES (?, ?)';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $planta);
		$stm->bindValue(2, $caminho);
		
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
	$r['bioma'] = $bioma;
	$r['caminho'] = $caminho;
	$r['Chave'] = $chave;

	return json_encode($r);
}

?>