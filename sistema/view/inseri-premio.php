<?php
  session_start();
  
  include_once("../util/conexao.php");
  include_once("../controller/premiocontroller.php");
  include_once("../dao/premiodao.php");
  
  $conexao = conectar_db();
  $premioDAO = new PremioDAO($conexao);
  $premioController = new PremioController($conexao);
  
  if ($_POST) {
    $categoria = $_POST['categoria'];
   if ($premioController->inserePremio($categoria)) {
     $_SESSION['premios'][] = $categoria;
     header("Location: lista-premios.php");
    }

    header("Location: lista-premios.php");
    die();
  }
?>

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
        margin-bottom: 50px;
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
    
    input[type="text"] {
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
  <form action="" method="post">
    <div>
      <label for="categoria">Categoria:</label>
      <input type="text" id="categoria" name="categoria">
    </div>
    <button type="submit">Salvar</button>
  </form>
  </div>
  </body>