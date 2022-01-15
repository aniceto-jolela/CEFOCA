<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

//Cadastro de horário
    
    try {
        
    //Dados dos horários
    $nome = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
    $duracao = filter_input(INPUT_POST, 'duracao', FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
    $vagas = filter_input(INPUT_POST, 'vagas', FILTER_SANITIZE_STRING);
   
    
    $curso = new Cursos();
    
    //cadastra os registros
    $curso->setNome($nome);
    $curso->setDuracao($duracao);
    $curso->setPreco($preco);
    $curso->setVagas($vagas);
    $curso->insertIntoDatabase(con());
    returnAjax($r, '0');
   
    } catch (Exception $exc) {
        //returnAjax($r, '0');
    }   
    exit();