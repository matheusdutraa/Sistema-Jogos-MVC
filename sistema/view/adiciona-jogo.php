<?php

session_start();

include_once("../util/conexao.php");
include_once("../model/jogomodel.php");
include_once("../dao/jogodao.php");
include_once("../controller/jogocontroller.php");

$conexao = conectar_db();
$jogoDAO = new JogoDAO($conexao);

if (isset($_POST['nome'])) {
  $jogo = new JogoModel($id, $nome, $genero, $diretor, $plataforma, $ano, $id_premio);
  $jogo->setNome($_POST['nome']);
  $jogo->setGenero($_POST['genero']);
  $jogo->setDiretor($_POST['diretor']);
  $jogo->setPlataforma($_POST['plataforma']);
  $jogo->setAno($_POST['ano']);
  $jogo->setId_Premio($_POST['id_premio']);

  if ($jogoDAO->insereJogo($jogo)) {
    if (isset($_POST['categoria'])) {
      $nome_jogo = $_POST['nome'];
      $categoria = $_POST['categoria'];

      $sql = "INSERT INTO premios (nome, categoria) VALUES ('$nome_jogo', '$categoria')";
      $conexao->exec($sql);
    }

    header("Location: jogoview.php");
    die();
  }
}

?>

<html>

<head>
  <a href="../index.php">VOLTAR</a>
  <title>ADICIONAR JOGO</title>
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
  <h1>Adicionar Jogo</h1>
  <form action="" method="post">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome">
    </div>
    <div>
      <label for="genero">Gênero:</label>
      <input type="text" id="genero" name="genero">
    </div>
    <div>
      <label for="diretor">Diretor:</label>
      <input type="text" id="diretor" name="diretor">
    </div>
    <div>
      <label for="plataforma">Plataforma:</label>
      <input type="text" id="plataforma" name="plataforma">
    </div>
    <div>
      <label for="ano">Ano:</label>
      <input type="number" id="ano" name="ano">
    </div>
    <div>
      <label for="id_premio">ID:</label>
      <input type="number" id="id_premio" name="id_premio">
    </div>
    <div>
      <label for="categoria">Categoria:</label>
      <select id="categoria" name="categoria">
        <?php foreach ($_SESSION['premios'] as $premio) : ?>
          <option value="<?php echo $premio; ?>"><?php echo $premio; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <button type="submit">Adicionar</button>
    </div>
  </form>
  </div>
</body>

</html>