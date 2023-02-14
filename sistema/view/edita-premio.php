<?php
include_once("../util/conexao.php");
include_once("../dao/premiodao.php");
include_once("../model/premiomodel.php");
include_once("../controller/premiocontroller.php");

$conexao = new PDO('mysql:host=localhost;dbname=jogos', 'root', 'bancodedados');
$premioDAO = new PremioDAO($conexao);
$premioController = new PremioController($conexao);

if (!isset($_GET['id'])) {
  die("O ID do premio não foi especificado");
}

$id_premio = $_GET['id'];
$premios = $premioController->listaPremios($id_premio);

if (count($premios) == 0) {
  die("Premio não encontrado");
}

$premio = $premios[0];

if (isset($_POST['categoria'])) {
  $categoria = $_POST['categoria'];
  $premioController->atualizaCategoria($id_premio, $categoria);
  header("Location: lista-premios.php");
  die();
}
?>
<html>
  <head>
    <a href="lista-premios.php">VOLTAR</a>
    <title>EDITAR PREMIO</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
  }
  
  h1 {
    color: #fff;
    font-size: 2.5em;
    margin-bottom: 20px;
  }

  body {
      font-family: 'Roboto', sans-serif;
      background-color: #1C1C1C;
      
      align-items: center;
      justify-content: center;
      height: 100vh;
  }
    
  .container {
      text-align: center;
      padding: 50px;
  }
    
    a {
        text-decoration: none;
        font-size: 24px;
        color: #fff;
        margin-top: 20px;
        margin-bottom: 10px;
        margin-left: 20px;
        display: inline-block;
        font-size: 1.2em;
        padding: 10px 20px;
        background-color: rgba(255, 255, 255, 0.1);
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }
    
    a:hover {
        transform: translateY(-5px);
        background-color: #e8341d;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    }
    
    form {
        background-color: #1C1C1C;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        color: #fff;
        max-width: 25%; 
        margin-left:auto;
        margin-right:auto;
    }
    
    label {
        font-size: 16px;
        display: block;
        margin-bottom: 10px;
    }
    
    input, select {
        width: 75%;
        padding: 10px;
        margin-bottom: 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
    
    button[type="submit"] {
        width: 30%;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: #e8341d;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        margin-top: 20px;
    }
    
    button[type="submit"]:hover {
        background-color: rgba(232, 52, 29, 0.8);
    }
</style>
  </head>
  <body>
    <div class="container">
    <h1>Editar Premio</h1>
    <form action="" method="post">
      Categoria: <input type="text" name="categoria" value="<?= $premio->getCategoria() ?>"><br><br>
      <input type="submit" value="Salvar">
    </form>
    </div>
  </body>
</html>
