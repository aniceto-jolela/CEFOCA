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
                $foto = '../root/images/usuario/'.$_FILES['file']['name'];
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
        
        
        //filter_input - filtra o dados
        //INPUT_POST - metodo
        //nome - dado do campo
        //FILTER_SANITIZE_STRING - Receber como string
        //trim - retira os espaços em branco no inicio e final da da frase 
        $usuario = trim(filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING));
        $senha = trim(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

        if(!empty($usuario) && !empty($senha)){
            
            if(empty($_FILES['file']['name'])){
                $foto = '../root/images/usuario/user.png';
            }else{
                $foto = '../root/images/usuario/'.$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $foto);
            }
            //Edita os dados
            $usuario_edit = con()->prepare("UPDATE usuario SET nome='$usuario',senha='$senha',imagem='$foto'");
            $usuario_edit->execute();
            //Sucesso ao editar
            $_SESSION['user']=$usuario;
            $_SESSION['foto']=$foto;
            returnAjax($r, '0');
        }else{
            returnAjax($r, '1');
        }


    } catch (Exception $ex){
        
    }
    
    
    
    
    