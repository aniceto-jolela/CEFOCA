<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

//Cadastro união de curso
    
    try {
        
         // 2087939 bytes -> 1,99 MB
        $foto="";
        /**********************************  VALIDAÇÃO DO FICHEIRO    ********************************/
        
        if(!empty($_FILES['foto']['name'])){
            if(isset($_FILES['foto']['size'])){
                $arqcard = $_FILES['foto']['size'];
                //Copia o nome do e o caminho da imagem
                $foto = '../root/images/inscricoes/'.$_FILES['foto']['name'];
                //Verifica se já existe ste ficheiro
                if(file_exists($foto)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '2');}
            }else{$arqcard = ($_FILES['foto']['size'] = 0);}
            // 2087939 bytes -> 1,99 MB , Verifica se o tamaho do ficheiro é igual ou maior que 1,99 MB e se o ficheiro
            // é diferente de zero (zero se for video)
            if($arqcard <= 2087939 && $arqcard != 0){
                //Formato de imagens
                $tipo=$_FILES['foto']['type'];
                if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){/*"Imagem inválida";*/returnAjax($r, '3');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '4');}
        }
        /**********************************  END VALIDAÇÃO DO FICHEIRO    ********************************/
        
    //Dados união de curso
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $bi = filter_input(INPUT_POST, 'bi', FILTER_SANITIZE_STRING);
    $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
  
    if(empty($_FILES['foto']['name'])){
        $foto = '../root/images/inscricoes/aluno.png';
    }else{
        $foto = '../root/images/inscricoes/'.$_FILES['foto']['name'];
    }
    
     $inscricoes = new Inscricoes();
    
    //cadastra os registros
    $inscricoes->setNome($nome);
    $inscricoes->setTelefone($tel);
    $inscricoes->setBi($bi);
    $inscricoes->setFotografia($foto);
    $inscricoes->setIdCurso($curso);
    
    //cadastra os registros
    if(!$inscricoes->insertIntoDatabase(con())){
        //RETORNA ERRO NA BASE DE DADO
        returnAjax($r, '1');
    }else{
        //move a imagem para um local específico
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
        
        //_________________ÁREA DA NOTIFICAÇÃO
        $query = "SELECT * FROM inscricoes ORDER BY id ASC";
        $ver = Inscricoes::findBySql(con(), $query);
        $valor=0;
        foreach ($ver as $i){$valor=$i->getId();}
    
        $notificacao = new Notificacoes();
        $notificacao->setIdInscrito($valor);
        $notificacao->insertIntoDatabase(con());
        //RETORNA SUCESSO
        returnAjax($r, '0');
    }
    
    } catch (Exception $exc) {
        //returnAjax($r, '0');
    }   
    exit();