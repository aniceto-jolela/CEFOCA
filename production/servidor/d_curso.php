<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $ID=$_GET['cod'];
    
    
    
    //UNIÃO Curso
    $query = "SELECT * FROM uniao_curso ORDER BY id ASC";
    $ver = UniaoCurso::findBySql(con(), $query);
    foreach ($ver as $i){
        if($i->getIdCurso()==$ID){
            $uniao_curso_edit = con()->prepare("UPDATE uniao_curso SET estado=1 WHERE id_curso=:id_uniao_curso");
            $uniao_curso_edit->bindParam(":id_uniao_curso",$ID);
            $uniao_curso_edit->execute();
        }
    }    
   
    
    //INSCRIÇÃO
    $query2 = "SELECT * FROM inscricoes ORDER BY id ASC";
    $ver2 = Inscricoes::findBySql(con(), $query2);
    foreach ($ver2 as $i2){
        if($i2->getIdCurso()==$ID){
           $inscricao_edit = con()->prepare("UPDATE inscricoes SET estado=3 WHERE id_curso=:id_inscricao");
           $inscricao_edit->bindParam(":id_inscricao",$ID);
           $inscricao_edit->execute();
        }
    }
    
    
    
    //Edita os dados
    $curso_edit = con()->prepare("UPDATE cursos SET estado=1 WHERE id=:id_cursos");
    $curso_edit->bindParam(":id_cursos",$ID);
    $curso_edit->execute();
    
    
    
    