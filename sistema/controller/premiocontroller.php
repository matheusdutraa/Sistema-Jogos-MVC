<?php
include_once("../util/conexao.php");
include_once("../model/premiomodel.php");
include_once("../dao/premiodao.php");
$conexao = conectar_db();
if (!$conexao) {
  die("Erro ao estabelecer conexão com o banco de dados");
}
$premioController = new PremioController($conexao);

class PremioController {
    private $premioDAO;

    public function __construct(PDO $conexao) {
      $this->premioDAO = new PremioDAO($conexao);
    }
    
    public function inserePremio( $categoria) {
      $premio = new PremioModel(0, 0, $categoria);
      return $this->premioDAO->inserePremio($premio);
    }
    
    public function listaPremios($id = 0) {
      return $this->premioDAO->listaPremios($id);
    }

    public function atualizaCategoria($id, $categoria) {
      return $this->premioDAO->atualizaCategoria($id, $categoria);
    }
    
    
    public function excluiPremio($id) {
      return $this->premioDAO->excluiPremio($id);
    }
    
}

