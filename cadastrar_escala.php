<?php
session_start();
require 'conexao.php';
$diferenca = $_POST['diferenca'];
$id_equipes = $_POST['id_equipes'];
$data_hora1 = date_create($_POST['data_hora1']);
$data_hora2 = date_format($data_hora1, 'Y-m-d H:i:s');
$data_hora3 = date_create($_POST['data_hora2']);
$data_hora4 = date_format($data_hora3, 'Y-m-d H:i:s');
if ($id_equipes) {
  if ($diferenca >= 36) {
    $sql = $pdo->prepare("SELECT * FROM escalas WHERE data_hora > '$data_hora2' AND data_hora <'$data_hora4'");
    $sql->execute();
    if ($sql->rowCount() == 0) {
      $sql = $pdo->prepare("INSERT INTO escalas (id_equipes, data_hora) 
          VALUES (:id_equipes, :data_hora1)");
      $sql->bindValue(':id_equipes', $id_equipes);
      $sql->bindValue(':data_hora1', $data_hora2);
      $sql->execute();
      $sql = $pdo->prepare("INSERT INTO escalas (id_equipes, data_hora) 
          VALUES (:id_equipes, :data_hora3)");
      $sql->bindValue(':id_equipes', $id_equipes);
      $sql->bindValue(':data_hora3', $data_hora4);
      $sql->execute();
      header('Location: index.php');
      exit;
    } else {
      $_SESSION['msg'] = "<div class='alert alert-danger'>Já existe uma Equipe escalada nesse horário
              Tente novamente!</div>";
      header("Location: index.php");
      exit;
    }
  } else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Essa equipe não pode trabalhar antes de folgar 36 horas </div>";
    header("Location: index.php");
    exit;
  }
} else {
  $_SESSION['msg'] = "<div class='alert alert-danger'>Campos obrigatórios não foram preenchidos!
          Tente novamente!</div>";
  header("Location: index.php");
  exit;
}
