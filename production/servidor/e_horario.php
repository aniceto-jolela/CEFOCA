<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    //Dados dos horários
    $horarioInicial = filter_input(INPUT_POST, 'timeInicio', FILTER_SANITIZE_STRING);
    $horarioFinal = filter_input(INPUT_POST, 'timeFinal', FILTER_SANITIZE_STRING);
    $ID = $_POST['ID'];
    
    //Edita os dados
    $horario_edit = con()->prepare("UPDATE horarios SET inicio='$horarioInicial',final='$horarioFinal' WHERE id=:id_horario");
    $horario_edit->bindParam(":id_horario",$ID);
    $horario_edit->execute();
    //Sucesso ao editar
    returnAjax($r, '0');
  