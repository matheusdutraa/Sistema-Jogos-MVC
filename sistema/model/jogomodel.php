<?php

class JogoModel {
    private $id;
    private $nome;
    private $genero;
    private $diretor;
    private $plataforma;
    private $ano;
    private $id_premio;
  
    public function __construct($id = null, $nome = null, $genero = null, $diretor = null, $plataforma = null, $ano = null, $id_premio = null) {
      $this->id = $id;
      $this->nome = $nome;
      $this->genero = $genero;
      $this->diretor = $diretor;
      $this->plataforma = $plataforma;
      $this->ano = $ano;
      $this->id_premio = $id_premio;
  }
  public function getId() {
    return $this->id;
}


public function getNome() {
    return $this->nome;
}

public function getGenero() {
    return $this->genero;
}

public function getDiretor() {
    return $this->diretor;
}

public function getPlataforma() {
    return $this->plataforma;
}

public function getAno() {
    return $this->ano;
}

public function getid_premio() {
    return $this->id_premio;
}
public function setId($id) {
  $this->id = $id;
}

public function setNome($nome) {
  $this->nome = $nome;
}

public function setGenero($genero) {
  $this->genero = $genero;
}

public function setDiretor($diretor) {
  $this->diretor = $diretor;
}

public function setPlataforma($plataforma) {
  $this->plataforma = $plataforma;
}

public function setAno($ano) {
  $this->ano = $ano;
}

public function setid_premio($id_premio) {
  $this->id_premio = $id_premio;
}

}