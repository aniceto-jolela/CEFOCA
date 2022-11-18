<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    //Dados de União de curso
    $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
    $semana = filter_input(INPUT_POST, 'semana', FILTER_SANITIZE_STRING);
    $horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
    $ID = $_POST['ID'];
    
    //Edita os dados
    $uniao_curso_edit = con()->prepare("UPDATE uniao_curso SET dia_semana='$semana',id_curso='$curso',id_horario='$horario' WHERE id=:id_uniao_curso");
    $uniao_curso_edit->bindParam(":id_uniao_curso",$ID);
    $uniao_curso_edit->execute();
    //Sucesso ao editar
    returnAjax($r, '0');
  