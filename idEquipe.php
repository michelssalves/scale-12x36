<?php
require 'conexao.php';

    $id_equipes = intval($_POST['id']);
	$sql = $pdo->prepare('SELECT * FROM equipes WHERE id_equipes = :id');
	$sql->execute(array(':id' => $id_equipes));
	
	while($linha = $sql->fetch(PDO::FETCH_ASSOC))
	{
		$retorno['id_equipes'] = $linha['id_equipes'];
	}
	echo json_encode($retorno)
?>