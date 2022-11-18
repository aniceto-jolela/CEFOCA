<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

//Cadastro de card
    
    try {
        
         // 2087939 bytes -> 1,99 MB
        $foto="";
        /**********************************  VALIDAÇÃO DO FICHEIRO    ********************************/
        
        if(!empty($_FILES['file']['name'])){
            if(isset($_FILES['file']['size'])){
                $arqcard = $_FILES['file']['size'];
                //Copia o nome do e o caminho da imagem
                $foto = '../root/images/card/'.$_FILES['file']['name'];
                //Verifica se já existe ste ficheiro
                if(file_exists($foto)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '2');}
            }else{$arqcard = ($_FILES['file']['size'] = 0);}
            // 2087939 bytes -> 1,99 MB , Verifica se o tamaho do ficheiro é igual ou maior que 1,99 MB e se o ficheiro
            // é diferente de zero (zero se for video)
            if($arqcard <= 2087939 && $arqcard != 0){
                //Formato de imagens
                $tipo=$_FILES['file']['type'];
                if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){/*"Imagem inválida";*/returnAjax($r, '3');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '4');}
        }
        /**********************************  END VALIDAÇÃO DO FICHEIRO    ********************************/
        
        
    //Dados dos usuários
    $titulo = trim(filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING));
    $sub = trim(filter_input(INPUT_POST, 'sub', FILTER_SANITIZE_STRING));
    $descrico = trim(filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_STRING));
    
    if(empty($_FILES['file']['name'])){
        $foto = '../root/images/card/card.png';
    }else{
        $foto = '../root/images/card/'.$_FILES['file']['name'];
    }
    

    //trim - remove os espaços do inicio e do final da frase.
    $card = new Card();
   
    $card->setTitulo(trim($titulo));
    $card->setSubtitulo(trim($sub));
    $card->setDescricao(trim($descrico));
    $card->setImagem($foto);
                               
    //cadastra os registros
    if(!$card->insertIntoDatabase(con())){
        //RETORNA ERRO NA BASE DE DADO
        returnAjax($r, '1');
    }else{
        //move a imagem para um local específico
        move_uploaded_file($_FILES['file']['tmp_name'], $foto);
        //RETORNA SUCESSO
        returnAjax($r, '0');
    }
    
    } catch (Exception $exc) {
        //returnAjax($r, '0');
    }   
    exit();