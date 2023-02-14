<?php
#Página para verificar se o usuário está logado no sistema

//Habilitar o recurso de sessão no PHP nesta página
session_start();

if(! isset($_SESSION['usuarioLogadoId'])) {
    header("location: ./view/login.php");
    exit;
}

//echo $_SESSION['usuarioLogadoId'];
//echo $_SESSION['usuarioLogadoNome'];

?>