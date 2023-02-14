<?php
include_once("../util/conexao.php");
include_once("../model/jogomodel.php");
include_once("../dao/jogodao.php");
include_once("../controller/jogocontroller.php");

$conexao = conectar_db();
$jogoDAO = new JogoDAO($conexao);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($jogoDAO->removeJogo($id)) {
        header("Location: jogoview.php");
        die();
    }
}

?>
