<?php
session_start();
require 'conexao.php';
$lista = [];
$sql = $pdo->query("SELECT id_equipes,
DATE_FORMAT(data_hora,'%d/%l/%Y %H:%i:%s') AS horario, 
DATE_FORMAT(data_hora,'%d') AS dia, 
DATE_FORMAT(data_hora,'%l') AS mes, 
DATE_FORMAT(data_hora,'%Y') AS ano, 
DAYNAME(data_hora) as dia_da_semana 
FROM escalas ORDER BY id_escala DESC");
if ($sql->rowCount() > 0) {
	$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="topo">
		Escala Equipe de Segurança
	</div>
	<div class="menu">
		<form method="POST" action="cadastrar_escala.php">
			<label>Equipe</label><br>
			<select class="input is-large" name="equipes" id="equipes">
				<option value="">Escolha a Equipe</option>
				<?php
				$sql = $pdo->prepare("SELECT * FROM equipes ORDER BY equipes");
				$sql->execute();
				$fetchAll = $sql->fetchAll();
				foreach ($fetchAll as $equipes) {
					echo '<option value="' . $equipes['id_equipes'] . '">' . $equipes['equipes'] . '</option>';
				}
				?>
			</select>
			<input hidden name="id_equipes" id="id_equipes">
			<br><label>Ultima escala da equipe</label><br>
			<input readonly name="data_hora_front" id="data_hora_front" type="text"><br>
			<label>Hora Inicio</label><br>
			<input onblur="somarDatas()" name="data_hora1" id="data_hora1" type="datetime-local"><br>
			<label>Hora Fim</label><br>
			<input name="data_hora2" id="data_hora2" type="datetime-local"><br>
			<input hidden name="data_hora3" id="data_hora3" type="text"><br>
			<input hidden name="diferenca" id="diferenca" type="text">
			<button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
		</form>
	</div>
	<div class="erro">

		<?php
		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
	</div>

	<div class="tabela">
		<table border="3" width="50%">
			<tr>
				<th>EQUIPE</th>
				<th>HORÁRIOS</th>
				<th>DIA</th>
				<th>MÊS</th>
				<th>ANO</th>
				<th>DIA DA SEMANA</th>
			</tr>

			<?php foreach ($lista as $usuario) : ?>
				<tr>
					<td><?= $usuario['id_equipes']; ?></td>
					<td><?= $usuario['horario']; ?></td>
					<td><?= $usuario['dia']; ?></td>
					<td><?= $usuario['mes']; ?></td>
					<td><?= $usuario['ano']; ?></td>
					<td><?= $usuario['dia_da_semana']; ?></td>

				</tr>
			<?php endforeach; ?>
	</div>
</body>

</html>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/verificarUltimaData.js"></script>
<script src="js/idEquipe.js"></script>
<script src="js/calcularData.js"></script>
<script src="js/bootstrap.min.js"></script>