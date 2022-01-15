<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    //Dados dos horários
    $nome = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
    $duracao = filter_input(INPUT_POST, 'duracao', FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
    $vagas = filter_input(INPUT_POST, 'vagas', FILTER_SANITIZE_STRING);
    $ID = $_POST['ID'];
    
    //Edita os dados
    $curso_edit = con()->prepare("UPDATE cursos SET nome='$nome',duracao='$duracao',preco='$preco',vagas='$vagas' WHERE id=:id_curso");
    $curso_edit->bindParam(":id_curso",$ID);
    $curso_edit->execute();
    //Sucesso ao editar
    returnAjax($r, '0');
  