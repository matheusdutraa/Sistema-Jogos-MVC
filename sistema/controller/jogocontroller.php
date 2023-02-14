<?php
include_once("../model/jogomodel.php");
include_once("../dao/jogodao.php");
class JogoController {
    private $jogoDAO;

    public function __construct($conexao) {
      $this->jogoDAO = new JogoDAO($conexao);
    }

    public function listaJogos($id) {
      return $this->jogoDAO->listaJogos($id);
    }

    public function insereJogo(JogoModel $jogo) {
      return $this->jogoDAO->insereJogo($jogo);
    }

    public function atualizaJogo(JogoModel $jogo) {
      return $this->jogoDAO->atualizaJogo($jogo);
    }

    public function removeJogo($id) {
      return $this->jogoDAO->removeJogo($id);
    }
}