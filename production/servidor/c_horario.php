<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

//Cadastro de horário
    
    try {
        
    //Dados dos horários
    $horarioInicial = filter_input(INPUT_POST, 'timeInicial', FILTER_SANITIZE_STRING);
    $horarioFinal = filter_input(INPUT_POST, 'timeFinal', FILTER_SANITIZE_STRING);
   
    
    $horario = new Horarios();
    
    //cadastra os registros
    $horario->setInicio($horarioInicial);
    $horario->setFinal($horarioFinal);
    $horario->insertIntoDatabase(con());
    returnAjax($r, '0');
   
    } catch (Exception $exc) {
        //returnAjax($r, '0');
    }   
    exit();