<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $ID=$_GET['cod'];
    
    //Deletar horário
    //Edita os dados
    $uniao_curso_edit = con()->prepare("DELETE FROM uniao_curso WHERE id=:id_uniao_curso");
    $uniao_curso_edit->bindParam(":id_uniao_curso",$ID);
    $uniao_curso_edit->execute();