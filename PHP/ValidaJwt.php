<?php
include 'funcoes.php';

function RetornaValidacao($chave){
	$buscaChave = json_decode(BuscaChave($chave));
	$r['resultado'] = json_encode($buscaChave);

	if($buscaChave != null){
		$r['Result'] = '200';
		$r['Description'] = 'Usuário válido';
		$r['Chave'] = json_decode(AtualizaChave($chave))->CHAVE;
	}
	else{
		$r['Result'] = '401';	
		$r['Description'] = 'Usuário não validado';
	}
	return json_encode($r);
}

?>