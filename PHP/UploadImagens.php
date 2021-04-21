<?php
include 'bd.php';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$validacao = json_decode(RetornaValidacao($request->Chave));

if($validacao->Result == '200'){
	echo updaloadImagens(
    $_FILES,
    $validacao->Chave,
	);
}
else{
	echo RetornaValidacao($request->Chave);
}

function reArrayFiles(&$file_post){
  $isMulti    = is_array($file_post['name']);
  $file_count    = $isMulti?count($file_post['name']):1;
  $file_keys    = array_keys($file_post);

  $file_ary    = [];    //Итоговый массив
  for($i=0; $i<$file_count; $i++)
      foreach($file_keys as $key)
          if($isMulti)
              $file_ary[$i][$key] = $file_post[$key][$i];
          else
              $file_ary[$i][$key]    = $file_post[$key];

  return $file_ary;
}

function UploadFile($files){
  var $retorno = '';

  foreach ($files as $file){
    echo $file['name'];
  }

  return $retorno;
}

function updaloadImagens($files, $chave)
{
  $caminho = UploadFile($files);
  $result = 'True';

  if($caminho == ''){
    $result = 'False';
    $r['UploadImage'] = 'False';
  }
  else{
    $r['UploadImage'] = 'True';
  }  
  
	$r['Result'] = $result;	
  $r['caminho'] = $caminho;
	$r['Chave'] = $chave;

	return json_encode($r);
}

?>