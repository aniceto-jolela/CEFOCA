<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $ID=$_GET['cod'];
    
    //Deletar Inscrição
    //Edita os dados
    $inscricao_edit = con()->prepare("UPDATE inscricoes SET estado=3 WHERE id=:id_inscricao");
    $inscricao_edit->bindParam(":id_inscricao",$ID);
    $inscricao_edit->execute();
    
   