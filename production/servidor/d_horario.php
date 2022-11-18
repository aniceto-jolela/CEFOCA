<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $ID=$_GET['cod'];
    
    
    //UNIÃO Curso
    $query = "SELECT * FROM uniao_curso ORDER BY id ASC";
    $ver = UniaoCurso::findBySql(con(), $query);
    foreach ($ver as $i){
        if($i->getIdHorario()==$ID){
            $uniao_curso_edit = con()->prepare("UPDATE uniao_curso SET estado=1 WHERE id_horario=:id_uniao_curso");
            $uniao_curso_edit->bindParam(":id_uniao_curso",$ID);
            $uniao_curso_edit->execute();
        }
    }    

    
    
    //Deletar horário
    //Edita os dados
    $card_edit = con()->prepare("UPDATE horarios SET estado=1 WHERE id=:id_horario");
    $card_edit->bindParam(":id_horario",$ID);
    $card_edit->execute();
    
   