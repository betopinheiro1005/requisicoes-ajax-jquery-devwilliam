<?php 
header("Content-type: text/html; charset=utf-8");

$acao = (isset($_GET['acao'])) ? $_GET['acao'] : '' ;
$id_uf = (isset($_GET['id_uf'])) ? $_GET['id_uf'] : '' ;
$pdo = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", 'root', '');


if($acao == 'carregar_uf'):
	$sql = 'SELECT id, descricao FROM tab_uf';
	$stm = $pdo->prepare($sql);
	$stm->execute();
	$dados = $stm->FetchAll(PDO::FETCH_OBJ);

	$retorno = "<option>Selecione o Estado</option>";
	foreach($dados as $reg):
		$retorno .= "<option value='{$reg->id}'>{$reg->descricao}</option>";
	endforeach;

	sleep(2);
	echo $retorno;
endif;

if($acao == 'carregar_cidade'):
	$sql = "SELECT id, descricao FROM tab_cidade WHERE id_uf = {$id_uf}";
	$stm = $pdo->prepare($sql);
	$stm->execute();
	$dados = $stm->FetchAll(PDO::FETCH_OBJ);

	$retorno = "<option>Selecione o Cidade</option>";
	foreach($dados as $reg):
		$retorno .= "<option value='{$reg->id}'>{$reg->descricao}</option>";
	endforeach;

	sleep(5);
	echo $retorno;
endif;

if($acao == 'carregar_lista'):
	$sql = 'SELECT descricao FROM tab_uf';
	$stm = $pdo->prepare($sql);
	$stm->execute();
	$dados = $stm->FetchAll(PDO::FETCH_OBJ);

	$retorno = "<ul>";
	foreach($dados as $reg):
		$retorno .= "<li>* {$reg->descricao}</li>";
	endforeach;
	$retorno .= "</ul>";

	sleep(2);
	echo $retorno;
endif;
?>