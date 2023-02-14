<?php 
include_once("../util/conexao.php");
include_once("../dao/jogodao.php");
include_once("../controller/jogocontroller.php");
?>
<html>
    <head>
        <title>Jogos</title>
        <a href="../index.php">VOLTAR</a>
        <a href="adiciona-jogo.php">ADICIONAR JOGO</a>
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
        <h1>Lista de Jogos</h1>
        <table>
            <tr>
                <th>Nome</th>
                <th>Gênero</th>
                <th>Diretor</th>
                <th>Plataforma</th>
                <th>Ano</th>
                <th>Id</th>

            </tr>
            <?php
            $conexao = new PDO('mysql:host=localhost;dbname=jogos', 'root', 'bancodedados');
            $jogoDao = new JogoDAO($conexao);
            $id = 0;
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
    
            $jogos = $jogoDao->listaJogos($id);

            if (!is_null($jogos) && (is_array($jogos) || is_object($jogos))) {
            foreach ($jogos as $jogo):
            // ...
            endforeach;
            } else {
            echo "Não há jogos disponíveis.";
            }
            
            foreach ($jogos as $jogo): ?>
                <tr>
                    <td><?php echo $jogo->getNome(); ?></td>
                    <td><?php echo $jogo->getGenero(); ?></td>
                    <td><?php echo $jogo->getDiretor(); ?></td>
                    <td><?php echo $jogo->getPlataforma(); ?></td>
                    <td><?php echo $jogo->getAno(); ?></td>
                    <td><?php echo $jogo->getId_Premio(); ?></td>
                    <td>
                    <?php if (!is_null($jogos) && (is_array($jogos) || is_object($jogos))) { ?>
                    <td>
                        <a href="edita-jogo.php?id=<?php echo $jogo->getId(); ?>">Editar</a>
                        <a href="exclui-jogo.php?id=<?php echo $jogo->getId(); ?>">Excluir</a>
                    </td>
                    <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    </body>
</html>