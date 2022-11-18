<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

//Cadastro união de curso
    
    try {
        
    //Dados união de curso
    $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
    $semana = filter_input(INPUT_POST, 'semana', FILTER_SANITIZE_STRING);
    $horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
    
    
    
    $uniaoCurso = new UniaoCurso();
    
    //cadastra os registros
    $uniaoCurso->setIdCurso($curso);
    $uniaoCurso->setDiaSemana($semana);
    $uniaoCurso->setIdHorario($horario);
    $uniaoCurso->insertIntoDatabase(con());
    returnAjax($r, '0');
    
    } catch (Exception $exc) {
        //returnAjax($r, '0');
    }   
    exit();