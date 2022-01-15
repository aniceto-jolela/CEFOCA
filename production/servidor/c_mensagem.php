<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

//Cadastro de horário
    
    try {
        
    //Dados dos horários
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
   
    //cadastra os registros
    $mensagem = new Mensagem();
    $mensagem->setDescricao($descricao);
    $mensagem->insertIntoDatabase(con());
    
    $query = "SELECT * FROM mensagem ORDER BY id ASC";
    $ver = Mensagem::findBySql(con(), $query);
    $valor=0;
    foreach ($ver as $i){$valor=$i->getId();}
    
    //_________________ÁREA DA NOTIFICAÇÃO
    $notificacao = new Notificacoes();
    $notificacao->setIdMensagem($valor);
    $notificacao->insertIntoDatabase(con());
    
    returnAjax($r, '0');
   
    } catch (Exception $exc) {
        //returnAjax($r, '0');
    }   
    exit();