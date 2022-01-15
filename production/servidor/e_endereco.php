<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    //filter_input - filtra o dados
    //INPUT_POST - metodo
    //nome - dado do campo
    //FILTER_SANITIZE_STRING - Receber como string
    //trim - retira os espaços em branco no inicio e final da da frase 
    $telefone = trim(filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $fb = trim(filter_input(INPUT_POST, 'fb', FILTER_SANITIZE_STRING));
    $descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));

    //Edita os dados
    $endereco_edit = con()->prepare("UPDATE endereco SET telefone='$telefone',email='$email',facebook='$fb',descricao='$descricao'");
    $endereco_edit->execute();
    //Sucesso ao editar
    returnAjax($r, '0');
    
    
    
    
    