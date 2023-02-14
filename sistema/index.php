<?php
include_once("/var/www/html/sistema/view/login_verifica.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Awards</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        .container {
            max-width: 800px;
            text-align: center;
            padding: 50px;
        }
        
        img {
            margin-top: -120px;
            margin-bottom: 90px;
            max-width: 90%;            
        }
        
        a {
            text-decoration: none;
            font-size: 24px;
            color: #fff;
            margin-bottom: 50px;
            
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
    </style>
</head>
<body>
    <div class="container">
        <img src="The-Game-Awards.png" alt="">
        <a href="view\jogoview.php">Lista de Jogos</a>
        <br>
        <a href="view\lista-premios.php">Lista de Premios</a>
        <br>
        <a href="view\premioview.php">Lista de Premios com Jogos</a>
    </div>
</body>
</html>
