<?php
include_once("../util/conexao.php");
include_once("../dao/premiodao.php");
include_once("../dao/jogodao.php");
include_once("../model/premiomodel.php");
include_once("../controller/premiocontroller.php");
$id = 0;
$conexao = new PDO('mysql:host=localhost;dbname=jogos', 'root', 'bancodedados');
$premioDAO = new PremioDAO($conexao);
$premios = $premioDAO->listaPremios();

?>
<html>
  <head>
  <a href="../index.php">VOLTAR</a>
    <title>Premios</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
  
  h1 {
    color: #fff;
    font-size: 2.5em;
    margin-bottom: 20px;
  }

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
  
  table {
      margin-left: auto;
      margin-right: auto;
      border-collapse: collapse;
      width: 750px;
  }
  
  th {
    text-align: center;
    padding: 8px;
    font-size: 18px;
    color: #fff;
    font-weight: 300;
  }

  td {
      text-align: left;
      padding: 8px;
      font-size: 18px;
      color: #fff;
      font-weight: 300;
  }
  
  th {
      background-color: rgba(255, 255, 255, 0.1);
  }
  
  tr:nth-child(even) {
      background-color: rgba(0, 0, 0, 0.1);
  }
</style>
  </head>
  <body>
    <div class="container">
    <h1>Premios</h1>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Jogos</th>
          <th>Categoria</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $contador = 0;
      foreach ($premios as $premio) {
        if (!$premio->getNome()) {
          continue;
        }
      ?>
        <tr>
          <td><?php echo $premio->getId(); ?></td>
          <td><?php echo $premio->getNome(); ?></td>
          <td><?php echo $premio->getCategoria(); ?></td>
          <td>
            <?php
              $jogoDAO = new JogoDAO($conexao);
              $jogos = $jogoDAO->listaJogosPorPremio($premio->getId());
              foreach ($jogos as $jogo) {
                echo $jogo->getNome() . ', ';
              }
            ?>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    </div>
  </body>
</html>