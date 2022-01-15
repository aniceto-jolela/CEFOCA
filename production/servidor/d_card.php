<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $ID=$_GET['cod'];
    
    //Deletar Card 
    //Edita os dados
    $card_edit = con()->prepare("DELETE FROM card WHERE id=:id_card");
    $card_edit->bindParam(":id_card",$ID);
    $card_edit->execute();
    
   