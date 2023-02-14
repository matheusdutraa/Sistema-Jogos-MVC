<?php
  include_once("../util/conexao.php");
  include_once("../dao/premiodao.php");
  include_once("../model/premiomodel.php");
  include_once("../controller/premiocontroller.php");

  $conexao = new PDO('mysql:host=localhost;dbname=jogos', 'root', 'bancodedados');
  $premioDAO = new PremioDAO($conexao);
  $premioController = new PremioController($conexao);


  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($premioController->excluiPremio($id)) {
      header('Location: lista-premios.php');
    } else {
      echo "Ocorreu um erro ao excluir o premio";
    }
  } else {
    echo "ID do premio não informado";
  }
?>
