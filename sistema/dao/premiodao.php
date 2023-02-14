<?php
include_once("../util/conexao.php");

$conexao = conectar_db();
$premioDAO = new PremioDAO($conexao);

include_once("../model/premiomodel.php");
class PremioDAO {
    private $conexao;
    
    public function __construct(PDO $conexao) {
      $this->conexao = $conexao;
    }
    
     public function listaPremios() {
      $premios = array();
      $query = "SELECT * FROM premios";
      $stmt = $this->conexao->prepare($query);
      $stmt->execute();
      while ($premio_array = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $nome = $premio_array['nome'];
        $categoria = $premio_array['categoria'];
        $premio = new PremioModel($premio_array['id_premio'], $nome, $categoria);
        array_push($premios, $premio);
      }
      return $premios;
    }
    
    public function inserePremio(PremioModel $premio) {
      $query = "INSERT INTO premios (nome, categoria) VALUES (:nome, :categoria)";
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(':nome', $premio->getNome());
      $stmt->bindValue(':categoria', $premio->getcategoria());
      return $stmt->execute();
    }

    public function atualizaCategoria($id, $categoria) {
      $query = "UPDATE premios SET categoria = :categoria WHERE id_premio = :id";
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(':categoria', $categoria);
      $stmt->bindValue(':id', $id);
      return $stmt->execute();
    }
    
    
    public function excluiPremio($id) {
      $query = "DELETE FROM premios WHERE id_premio = :id";
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(':id', $id);
      return $stmt->execute();
    }
    
}      