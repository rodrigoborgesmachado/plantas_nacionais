<?php
include 'bd.php';
include 'IniciaJWT.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

echo validaUsuario($request->login, $request->password);

function validaUsuario($login, $password)
{
	$pdo = Conectar();
	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$pdo->exec("SET NAMES 'utf8';");
		$sql = 'SELECT ID, NOME FROM USUARIOS WHERE LOGIN = "' . $login .'" AND PASS = "' .$password . '"';
		
		$stm = $pdo->prepare($sql);
		$stm->execute();
		$pdo = null;	
		$validacao = json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$r['Chave'] = '';

		if(json_decode($validacao)[0]->NOME != ''){
			$r['Chave'] = IniciaJWT();
			$r['Usuario'] = json_decode($validacao)[0]->ID;
			$r['Result'] = 'True';
		}
		else{
			$r['Result'] = 'False';
		}

		return json_encode($r);
	}
}

?>