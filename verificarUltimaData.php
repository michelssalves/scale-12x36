<?php
require 'conexao.php';

    $idEscala = intval($_POST['id']);
	$sql = $pdo->prepare('SELECT * FROM escalas WHERE id_equipes = :id ORDER BY data_hora DESC LIMIT 1');
	$sql->execute(array(':id' => $idEscala));
	
	while($linha = $sql->fetch(PDO::FETCH_ASSOC))
	{
		$retorno['data_hora_front'] = date('d/m/Y H:i:s',strtotime($linha['data_hora']));
		$retorno['data_hora_back'] = $linha['data_hora'];
	}
	echo json_encode($retorno)
?>