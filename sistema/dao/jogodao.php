<?php
include_once("../util/conexao.php");
include_once("../model/jogomodel.php");

class JogoDAO {
  private $conexao;

  public function __construct(PDO $conexao) {
    $this->conexao = $conexao;
  }
 

    public function listaJogos($id) {
      $jogos = array();
      $query = "SELECT * FROM jogos";
      $stmt = $this->conexao->prepare($query);
      $stmt->execute();
      while ($jogo_array = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $nome = $jogo_array['nome'];
        $genero = $jogo_array['genero'];
        $diretor = $jogo_array['diretor'];
        $plataforma = $jogo_array['plataforma'];
        $ano = $jogo_array['ano'];
        $id_premio = $jogo_array['id_premio'];
        $jogo = new JogoModel($id, $nome, $genero, $diretor, $plataforma, $ano, $id_premio);
        $jogo->setId($jogo_array['id_jogo']);
        array_push($jogos, $jogo);
      }
      return $jogos;
    }
    
    public function insereJogo(JogoModel $jogo) {
      $query = "INSERT INTO jogos (nome, genero, diretor, plataforma, ano, id_premio) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $this->conexao->prepare($query);
      return $stmt->execute([$jogo->getNome(), $jogo->getGenero(), $jogo->getDiretor(), $jogo->getPlataforma(), $jogo->getAno(), $jogo->getId_premio()]);
    }
    
    public function buscaJogo($id) {
      $query = "SELECT * FROM jogos WHERE id_jogo = ?";
      $stmt = $this->conexao->prepare($query);
      $stmt->bindParam(1, $id);
      $stmt->execute();
      $jogo_array = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($jogo_array) {
        $nome = $jogo_array['nome'];
        $genero = $jogo_array['genero'];
        $diretor = $jogo_array['diretor'];
        $plataforma = $jogo_array['plataforma'];
        $ano = $jogo_array['ano'];
        $id_premio = $jogo_array['id_premio'];
        $jogo = new JogoModel($nome, $genero, $diretor, $plataforma, $ano, $id_premio, $id);
        $stmt->execute([$id]);
        $jogo_array = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($jogo_array) {
        $jogo = new JogoModel($id, $jogo_array['nome'], $jogo_array['genero'], $jogo_array['diretor'], $jogo_array['plataforma'], $jogo_array['ano'], $jogo_array['id_premio']);
        $jogo->setId($jogo_array['id_jogo']);
        return $jogo;
        } else {
        return null;
        }
        }
       }
        public function atualizaJogo(JogoModel $jogo)  {
          $query = "UPDATE jogos SET nome = ?, genero = ?, diretor = ?, plataforma = ?, ano = ?, id_premio = ? WHERE id_jogo = ?";
          $stmt = $this->conexao->prepare($query);
          return $stmt->execute([$jogo->getNome(), $jogo->getGenero(), $jogo->getDiretor(), $jogo->getPlataforma(), $jogo->getAno(), $jogo->getid_premio(), $jogo->getId()]);
        }
        
        public function removeJogo($id) {
          $query = "DELETE FROM jogos WHERE id_jogo = ?";
          $stmt = $this->conexao->prepare($query);
          return $stmt->execute([$id]);
        }

        public function listaJogosPorPremio($id_premio) {
          $jogos = array();
          $query = "SELECT * FROM jogos WHERE id_premio = ?";
          $stmt = $this->conexao->prepare($query);
          $stmt->bindParam(1, $id_premio);
          $stmt->execute();
          while ($jogo_array = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nome = $jogo_array['nome'];
            $genero = $jogo_array['genero'];
            $diretor = $jogo_array['diretor'];
            $plataforma = $jogo_array['plataforma'];
            $ano = $jogo_array['ano'];
            $id_premio = $jogo_array['id_premio'];
            $jogo = new JogoModel($nome, $genero, $diretor, $plataforma, $ano, $id_premio);
            $jogo->setId($jogo_array['id_jogo']);
            array_push($jogos, $jogo);
          }
          return $jogos;
        }
      
  
}
?>