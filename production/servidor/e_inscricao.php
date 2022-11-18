<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
        
        //id - contador
        $id = 0;$vaga=0;
        $estado = "";
        $COD = $_GET['COD'];
        
        $CURSO = $_GET['CURSO'];
        $query = "SELECT * FROM inscricoes WHERE id_curso ='$CURSO' && estado=1 ORDER BY id ASC";
        $ver = Inscricoes::findBySql(con(), $query);
        foreach ($ver as $i):
            $vcurso = Cursos::findById(con(), $i->getIdCurso());
            ++$id;
            //Pega o total do curso
        endforeach;
        
        
        $query2 = "SELECT * FROM cursos WHERE id ='$CURSO'";
        $ver2 = Cursos::findBySql(con(), $query2);
        foreach ($ver2 as $i2):
            //Pega o total do curso
            $vaga=$i2->getVagas();
        endforeach;
        
        //Verifica se as vagas é menor que a quantidade de inscritos.
        //vaga- total de vagas
        //id- total de inscriitos de aceite (a um determinado curso)
        //COD- codigo do estado (1,2)
        //3 - Passou do limite de vagas disponível
        if($id>=$vaga && $COD!=2){
            returnAjax($r, '3');
        }
    
        //Só passa se tiver mas vagas, ao curso correspondente
    
    
    //$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    //Verifica o estado
    if($COD==1){$estado=1;}
    if($COD==2){ $estado=2;}
    
    //ID da inscrição (URL)
    $ID = $_GET['ID'];
    

    //Edita os dados
    $inscricao_edit = con()->prepare("UPDATE inscricoes SET estado='$estado' WHERE id=:id_inscricao");
    $inscricao_edit->bindParam(":id_inscricao",$ID);
    $inscricao_edit->execute();
    //Sucesso ao editar
    //Estado:
    //1- O inscrito está apurado
    //2- O inscrito não está apurado
    if($estado==1){
        returnAjax($r, '1');
    }else{
        returnAjax($r, '2');
    }
    
  