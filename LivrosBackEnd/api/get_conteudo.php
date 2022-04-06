<?php
include __DIR__.'/../control/ConteudoControl.php';
$conteudoControl = new ConteudoControl();

header('Content-Type: application/json');

if (!isset($args[1])) {
	$result = $conteudoControl->findAll();
	if ($result) {
		http_response_code(200);
		echo json_encode($result);
	}
	else {
		http_response_code(400);
		echo json_encode(array("mensagem" => "Não encontrado"));
	}
}
else {

	if($args[1] == "novos") 
		$result = $conteudoControl->findAllNovos();
	else {
	   if ($args[1] == "usados") 
		$result = $conteudoControl->findAllUsados();
	}

	if ($result) {
		http_response_code(200);
		echo json_encode($result);
	}
	else {
		http_response_code(400);
		echo json_encode(array("mensagem" => "Não encontrado"));
	}	
}



?>
