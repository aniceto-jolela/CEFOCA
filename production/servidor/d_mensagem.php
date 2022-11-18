<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $ID=$_GET['cod'];
    
    //Deletar horário
    //Edita os dados

    $mensagem_edit = con()->prepare("UPDATE mensagem SET estado=1 WHERE id=:id_mensagem");
    $mensagem_edit->bindParam(":id_mensagem",$ID);
    $mensagem_edit->execute();
 
   /* $mensagem_delet = new Mensagem();
    $mensagem_delet->setId($ID);
    $mensagem_delet->deleteFromDatabase(con());
*/

    
