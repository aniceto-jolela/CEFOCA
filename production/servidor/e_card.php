<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    try{
    
         // 2087939 bytes -> 1,99 MB
        $foto="";
        /**********************************  VALIDAÇÃO DO FICHEIRO    ********************************/
        
        if(!empty($_FILES['file']['name'])){
            if(isset($_FILES['file']['size'])){
                $arqcard = $_FILES['file']['size'];
                //Copia o nome do e o caminho da imagem
                $foto = '../root/images/card/'.$_FILES['file']['name'];
                //Verifica se já existe ste ficheiro
                if(file_exists($foto)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '1');}
            }else{$arqcard = ($_FILES['file']['size'] = 0);}
            // 2087939 bytes -> 1,99 MB , Verifica se o tamaho do ficheiro é igual ou maior que 1,99 MB e se o ficheiro
            // é diferente de zero (zero se for video)
            if($arqcard <= 2087939 && $arqcard != 0){
                //Formato de imagens
                $tipo=$_FILES['file']['type'];
                if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){/*"Imagem inválida";*/returnAjax($r, '2');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '3');}
        }
        /**********************************  END VALIDAÇÃO DO FICHEIRO    ********************************/
        
        
    //filter_input - filtra o dados
    //INPUT_POST - metodo
    //nome - dado do campo
    //FILTER_SANITIZE_STRING - Receber como string
    //trim - retira os espaços em branco no inicio e final da da frase 
    $titulo = trim(filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING));
    $sub = trim(filter_input(INPUT_POST, 'sub', FILTER_SANITIZE_STRING));
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
   

    if(empty($_FILES['file']['name'])){
        $foto = filter_input(INPUT_POST, 'file2', FILTER_SANITIZE_STRING);
    }else{
        $foto = '../root/images/card/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $foto);
    }
    //Edita os dados
    $ID = $_POST['ID'];
    $card_edit = con()->prepare("UPDATE card SET titulo='$titulo',subtitulo='$sub',imagem='$foto',descricao='$descricao' WHERE id=:id_card");
    $card_edit->bindParam(":id_card",$ID);
    $card_edit->execute();
    //Sucesso ao editar
    //header("Location:../admin/card.php");exit();
    returnAjax($r, '0');
    } catch (Exception $exc){
        
    }
    
    
    
    
    
    
    