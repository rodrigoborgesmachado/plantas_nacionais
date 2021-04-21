<?php

function ConectarPrincipal()
{
	$servidor = "mysql:dbname=sunsale;host=50.62.209.185:3306";
	$usuario = "system";
	$senha = "Masterkey1";

	try
	{
		$con = new PDO($servidor, $usuario, $senha);
		return $con;
	} 
	catch (Exception $e)
	{
		echo 'Erro: '.$e->getMessage();
		return null;
	}
}
?>