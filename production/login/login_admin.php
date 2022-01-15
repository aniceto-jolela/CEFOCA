<?php 
    /* Conexão com o servidor */
    require_once '../servidor/conectar.php';
    /* Verifica se o utilizador está logado*/
    if(!isset($_SESSION['user'])){
        header("Location:../login/login.php");
        exit();
    }