<?php

class PremioModel {
  private $id;
  private $nome;
  private $categoria;

  public function __construct($id, $nome, $categoria) {
    $this->id = $id;
    $this->nome = $nome;
    $this->categoria = $categoria;
  }

  public function getId() {
    return $this->id;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setCategoria($categoria) {
    $this->categoria = $categoria;
  }

  public function getCategoria() {
    return $this->categoria;
  }

}
  